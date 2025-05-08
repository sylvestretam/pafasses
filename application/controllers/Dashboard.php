<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $queryu = $this->db->query("
            SELECT 
            *, 
            (SELECT COUNT(*) FROM participation  AS p WHERE p.email_participant = u.email_user) AS participation,
            (SELECT COUNT(*) FROM participation  AS p WHERE p.email_participant = u.email_user AND swot IS NOT NULL AND performance IS NOT NULL) AS effectue,
            (SELECT COUNT(*) FROM activite  WHERE id_activite IN (SELECT id_activite FROM evaluation WHERE id_evaluation IN (SELECT id_evaluation FROM  participation  WHERE email_participant = u.email_user)) ) AS activite, 
            (SELECT COUNT(*) FROM paf  WHERE matricule_paf IN (SELECT matricule_paf FROM evaluation WHERE id_evaluation IN (SELECT id_evaluation FROM  participation  WHERE email_participant = u.email_user)) ) AS paf
            FROM user AS u
        ");

        $queryp = $this->db->query("
            SELECT 
            *, 
            (SELECT COUNT(*) FROM participation WHERE id_evaluation IN (SELECT id_evaluation FROM  evaluation WHERE evaluation.matricule_paf = p.matricule_paf ) )AS evaluation, 
            (SELECT COUNT(*) FROM participation WHERE  swot IS NOT NULL AND performance IS NOT NULL AND id_evaluation IN (SELECT id_evaluation FROM  evaluation WHERE evaluation.matricule_paf = p.matricule_paf ) )AS effectue,
            (SELECT COUNT(*) FROM evaluation WHERE evaluation.matricule_paf = p.matricule_paf) AS activite 
            FROM paf AS p;
        ");

        $data = array(
            'content' => 'dashboard.php',
            'activites' => $this->db->get('activite')->result(),
            'pafs' => $queryp->result(),
            'assessors' => $queryu->result(),
            'assessments' => $this->getAssessments()
        );

        $this->load->view('layout', $data);
    }

    function getAssessments()
    {
        $email = $_SESSION['mail'];
        if ($_SESSION['role'] == 'ASSESSOR') {
            $query = $this->db->query("SELECT * 
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf
            WHERE evaluation.id_evaluation IN (select participation.id_evaluation FROM participation WHERE email_participant = '$email')
            ");
            return  $query->result();
        } else {
            $query = $this->db->query("SELECT * 
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf");
            return  $query->result();
        }
    }
}