<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data = array(
            'content' => 'dashboard.php',
            'activites' => $this->db->get('activite')->result(),
            'pafs' => $this->db->get('paf')->result(),
            'assessors' => $this->db->get('user')->result(),
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