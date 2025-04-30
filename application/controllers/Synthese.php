<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Synthese extends CI_Controller
{

    public function index($id)
    {
        $query = $this->db->query(
            "SELECT * 
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf
            WHERE id_evaluation = '$id'"
        );
        $assessment = $query->row();

        $assessors = $this->db->get_where('participation', array('id_evaluation' => $id))->result();
        $notes = $this->db->get_where('note', array('id_evaluation' => $id))->result();

        $data = array(
            'content' => 'synthese.php',
            'assessment' => $assessment,
            'assessors' => $assessors,
            'notes' => $notes
        );

        $this->load->view('layout', $data);
    }

    function getAssessments()
    {
        $email = $_SESSION['mail'];
        if ($_SESSION['role'] == 'ASSESSOR') {
            $query = $this->db->query("SELECT *, 
            (SELECT count(*) from note WHERE note.id_evaluation = evaluation.id_evaluation AND email_participant = '$email' ) as notes
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf
            WHERE evaluation.id_evaluation IN (select participation.id_evaluation FROM participation WHERE email_participant = '$email')
            ");
            return  $query->result();
        } else {
            $query = $this->db->query("SELECT *, 
            (SELECT count(*) from note WHERE note.id_evaluation = evaluation.id_evaluation AND email_participant = '$email' ) as notes
            FROM evaluation join activite on evaluation.id_activite = activite.id_activite
            join paf on paf.matricule_paf = evaluation.matricule_paf");
            return  $query->result();
        }
    }

    function getNote($email, $question, $notes)
    {
        foreach ($notes as $note) {
            if ($note->email_participant === $email && $note->id_question === $question) {
                return $note->note;
            }
        }

        return 'pas de note';
    }
}