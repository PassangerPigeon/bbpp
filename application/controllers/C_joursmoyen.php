<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_joursmoyen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sapi');
        $this->load->model('m_inseminasi');
        $this->load->model('m_joursmoyen');
    }

    public function index()
    {
        $data = array(
            'title' => "Sapi",
            "tampil" => $this->m_joursmoyen->indexModel()
        );
        $this->load->view('view_bbpp/v_JoursMoyen', $data);
    }
}

/* End of file Controllername.php */
