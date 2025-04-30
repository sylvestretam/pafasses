<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessments extends CI_Controller
{

    public function index()
    {
        $data = array(
            'content' => 'assessments.php',
            'assessments' => $this->getAssessments()
        );

        $this->load->view('layout', $data);
    }

    public function assessment($id)
    {
        $query = $this->db->query("SELECT *
        FROM evaluation join activite on evaluation.id_activite = activite.id_activite
        join paf on paf.matricule_paf = evaluation.matricule_paf
        WHERE id_evaluation = '$id'");
        $assessment = $query->row();

        $data = array(
            'content' => 'assess.php',
            'assessment' => $assessment
        );

        $this->load->view('layout', $data);
    }

    public function assess()
    {
        $where = array(
            'email_participant' => $_SESSION['mail'],
            'id_evaluation' => $_REQUEST['id_evaluation']
        );

        $data = array(
            'performance' => $_REQUEST['performance'],
            'swot' => $_REQUEST['swot'],
            'amelioration' => $_REQUEST['amelioration']
        );
        $this->db->where($where);
        $this->db->update('participation', $data);

        for ($i = 1; $i <= 14; $i++) {
            $lb = 'note' . $i;
            $data = array(
                'note' => $_REQUEST[$lb],
                'id_question' => $i,
                'id_evaluation' => $_REQUEST['id_evaluation'],
                'email_participant' => $_SESSION['mail']
            );
            $this->db->insert('note', $data);
        }

        $this->index();
    }

    function getAssessments()
    {
        $email = $_SESSION['mail'];
        if ($_SESSION['role'] == 'ASSESSOR') {
            $query = $this->db->query("SELECT *, 
            (SELECT count(*) from note WHERE note.id_evaluation = evaluation.id_evaluation AND  note.email_participant = '$email' ) as notes
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf
            WHERE evaluation.id_evaluation IN (select participation.id_evaluation FROM participation WHERE email_participant = '$email')
            ");
            return  $query->result();
        } else {
            $query = $this->db->query("SELECT *, 
            (SELECT count(*) from note WHERE note.id_evaluation = evaluation.id_evaluation AND note.email_participant = '$email' ) as notes
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf");
            return  $query->result();
        }
    }
}