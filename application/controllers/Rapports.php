<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapports extends CI_Controller
{
    public function index()
    {
        $data = array(
            'content' => 'rapports.php'
        );

        $this->load->view('layout', $data);
    }

    public function rapportpdf($id_evaluation)
    {
        $query = $this->db->query("SELECT *
        FROM evaluation join activite on evaluation.id_activite = activite.id_activite
        join paf on paf.matricule_paf = evaluation.matricule_paf
        join user on email_responsable = email_user
        WHERE id_evaluation = '$id_evaluation'");
        $assessment = $query->row();

        $query = $this->db->query(
            "SELECT * 
            FROM participation join user on email_participant = email_user
            WHERE id_evaluation = '$id_evaluation'"
        );
        $participations = $query->result();
        $notes = $this->db->get_where('note', array('id_evaluation' => $id_evaluation))->result();
        
        $data = array(
            'assessment' => $assessment,
            'participations' => $participations,
            'notes' => $notes
        );

        $this->load->view('rapport_dal', $data);
    }

    public function rapportdcp($id_evaluation)
    {
        $query = $this->db->query("SELECT *
        FROM evaluation join activite on evaluation.id_activite = activite.id_activite
        join paf on paf.matricule_paf = evaluation.matricule_paf
        join user on email_responsable = email_user
        WHERE id_evaluation = '$id_evaluation'");
        $assessment = $query->row();

        $query = $this->db->query(
            "SELECT * 
            FROM participation join user on email_participant = email_user
            WHERE id_evaluation = '$id_evaluation'"
        );
        $participations = $query->result();
        $notes = $this->db->get_where('note', array('id_evaluation' => $id_evaluation))->result();
        
        $data = array(
            'assessment' => $assessment,
            'participations' => $participations,
            'notes' => $notes
        );

        $this->load->view('rapport_dcp', $data);
    }
}