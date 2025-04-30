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

    public function rapportpdf()
    {
        $data = array(
            'content' => 'rapportpdf.php'
        );

        $this->load->view('rapportpdf', $data);
    }
}