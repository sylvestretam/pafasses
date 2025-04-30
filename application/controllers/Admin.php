<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data = array(
            'content' => 'dashboard_admin.php',
            'activites' => $this->db->get('activite')->result(),
            'pafs' => $this->db->get('paf')->result(),
            'assessors' => $this->db->get('user')->result(),
            'assessments' => $this->db->get('evaluation')->result(),
        );

        $this->load->view('layout_admin', $data);
    }

    public function assessors()
    {
        $query = $this->db->query('SELECT email_user,name_user,job_user,id_role_role,pan_user, (SELECT COUNT(*) FROM participation WHERE email_participant = email_user) as participation FROM user');
        $assessors =  $query->result();
        $data = array(
            'content' => 'assessor_admin.php',
            'assessors' => $assessors
        );

        $this->load->view('layout_admin', $data);
    }

    public function add_assessor()
    {
        $data = array(
            'content' => 'add_assessor_admin.php'
        );

        $this->load->view('layout_admin', $data);
    }

    public function save_assessor()
    {
        $email = trim($_REQUEST['email']);
        $emailtab = explode("@", $email);
        $data = array(
            'email_user' => $email,
            'name_user' => $_REQUEST['name'],
            'job_user' => $_REQUEST['job'],
            'id_role_role' => 'ASSESSOR',
            'pan_user' => $emailtab[0]
        );
        $this->db->insert('user', $data);

        $this->assessors();
    }

    public function delete_assessor($pan_user)
    {
        $this->db->where('pan_user', $pan_user);
        $this->db->delete('user');

        $this->assessors();
    }


    public function activities()
    {
        $query = $this->db->query('SELECT id_activite,designation,description,lieu,id_domaine, 
        (SELECT COUNT(*) FROM evaluation WHERE id_activite = id_activite) as evaluation FROM activite');
        $activities = $query->result();
        $data = array(
            'content' => 'activities_admin.php',
            'activities' => $activities
        );
        $this->load->view('layout_admin', $data);
    }

    public function add_activity()
    {
        $domaines =  $this->db->get("domaine")->result();
        $data = array(
            'content' => 'add_activity_admin.php',
            'domaines' => $domaines
        );

        $this->load->view('layout_admin', $data);
    }

    public function save_activity()
    {
        $uid = uniqid();
        $id_activite = strtoupper($uid);
        $data = array(
            'designation' => $_REQUEST['designation'],
            'description' => $_REQUEST['description'],
            'lieu' => $_REQUEST['lieu'],
            'id_domaine' => $_REQUEST['domaine'],
            'id_activite' => $id_activite
        );
        $this->db->insert('activite', $data);

        $this->activities();
    }

    public function delete_activity($id_activity)
    {
        $this->db->where('id_activite', $id_activity);
        $this->db->delete('activite');

        $this->activities();
    }


    public function assessments()
    {
        $query = $this->db->query('SELECT *, 
        (SELECT COUNT(*) FROM participation WHERE id_evaluation = evaluation.id_evaluation) as evaluateurs 
        FROM evaluation join activite on evaluation.id_activite = activite.id_activite
        join paf on paf.matricule_paf = evaluation.matricule_paf');
        $assessments = $query->result();
        $data = array(
            'content' => 'assessments_admin.php',
            'assessments' => $assessments
        );

        $this->load->view('layout_admin', $data);
    }

    public function add_assessment()
    {
        $pafs =  $this->db->get("paf")->result();
        $activities =  $this->db->get("activite")->result();
        $responsables =  $this->db->get("user")->result();

        $data = array(
            'content' => 'add_assessment_admin.php',
            'pafs' => $pafs,
            'activites' => $activities,
            'responsables' => $responsables
        );

        $this->load->view('layout_admin', $data);
    }

    public function save_assessment()
    {
        $uid = uniqid();
        $id_evaluation = strtoupper($uid);
        $data = array(
            'periode' => $_REQUEST['periode'],
            'email_responsable' => $_REQUEST['email_responsable'],
            'matricule_paf' => $_REQUEST['matricule_paf'],
            'id_activite' => $_REQUEST['id_activite'],
            'id_evaluation' => $id_evaluation
        );
        $this->db->insert('evaluation', $data);

        $evaluateurs = explode(',', $_REQUEST['evaluateurs']);

        foreach ($evaluateurs as $email) {
            $datas = array(
                'id_evaluation' => $id_evaluation,
                'email_participant' => $email
            );
            $this->db->insert('participation', $datas);
        }

        $this->assessments();
    }

    public function update_assessment($id)
    {
        $pafs =  $this->db->get("paf")->result();
        $activities =  $this->db->get("activite")->result();
        $responsables =  $this->db->get("user")->result();

        $assessment = $this->db->get_where("evaluation", array('id_evaluation' => $id))->row();
        $assessors = $this->db->get_where("participation", array('id_evaluation' => $id))->result();

        $data = array(
            'content' => 'update_assessment_admin.php',
            'pafs' => $pafs,
            'activites' => $activities,
            'responsables' => $responsables,
            'assessment' => $assessment,
            'assessors' => $assessors
        );

        $this->load->view('layout_admin', $data);
    }

    public function delete_assessment($id)
    {
        $this->db->where('id_evaluation', $id);
        $this->db->delete('evaluation');

        $this->assessments();
    }

    public function save_update_assessment()
    {

        $evaluateurs = explode(',', $_REQUEST['evaluateurs']);
        $this->db->where('id_evaluation', $_REQUEST['id_evaluation']);
        $this->db->delete('participation');
        foreach ($evaluateurs as $email) {
            $datas = array(
                'id_evaluation' => $_REQUEST['id_evaluation'],
                'email_participant' => $email
            );
            $this->db->insert('participation', $datas);
        }

        $this->assessments();
    }
}