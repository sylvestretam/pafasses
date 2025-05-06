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

        $notes = [];
        for ($i = 1; $i <= 14; $i++) {
            $lb = 'note' . $i;
            $data = array(
                'note' => $_REQUEST[$lb],
                'id_question' => $i,
                'id_evaluation' => $_REQUEST['id_evaluation'],
                'email_participant' => $_SESSION['mail']
            );
            $this->db->insert('note', $data);

            $note = (0 <= $_REQUEST[$lb] && $_REQUEST[$lb] <= 20) ? $_REQUEST[$lb] : 0;
            $notes[$i] = $note;
            // array_push($notes, ['id_question' => $i, 'note' => $note]);
        }

        $data = array(
            'performance' => $this->getPerformance($notes),
            'swot' => $_REQUEST['swot'],
            'amelioration' => $_REQUEST['amelioration']
        );
        $this->db->where($where);
        $this->db->update('participation', $data);

        // var_dump($notes);
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

    function getPerformance($notes)
    {
        $criteres = $this->db->get('critere')->result();
        $qestions = $this->db->get('question')->result();

        $nc = 0;
        foreach ($notes as $key => $value) {
            $question = $this->getQuestion($qestions, $key);
            $critere = $this->getCritere($criteres, $question->id_critere);

            // $nc = $nc + ($critere->coefficient);
            $nc = $nc + 1 * ($value * $critere->coefficient);
            // $nc = $nc + ($value * $critere->coefficient);
        }

        return round($nc / 14);
    }

    function getCritere($criteres, $id_critere)
    {
        foreach ($criteres as $element) {
            if ($element->id_critere = $id_critere)
                return $element;
        }

        return ['id_critere' => 0, 'coefficient' => 0];
    }

    function getQuestion($questions, $id_question)
    {
        foreach ($questions as $element) {
            if ($element->id_question = $id_question)
                return $element;
        }

        return ['id_question' => 0, 'id_critere' => 0];
    }
}