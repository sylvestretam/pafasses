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

    public function assessment()
    {
        $data = array(
            'content' => 'assess.php'
        );

        $this->load->view('layout', $data);
    }

    public function rapportpdf($id_evaluation)
    {
        $data = array(
            'content' => 'rapportpdf.php'
        );

        $this->load->view('rapportpdf', $data);
    }

    public function rapportdcp($id_evaluation)
    {
        $data = array(
            'activite' => "Forage et construction château d'eau sà la centrale de Centrale de Bamenjin"
        );

        $this->load->view('rapport_dcp', $data);
    }
}
