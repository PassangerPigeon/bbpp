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

    public function index($id = null)
    {
        $vpoint =  $this->m_joursmoyen->voluntaryPeriod($id);
        $data = array(
            'vpoint' => $vpoint,
			'title' => "Sapi",
			"tampil" => $this->m_sapi->daftarSapiModel()
		);
		$this->load->view('view_bbpp/v_JoursMoyen', $data);
    }
}

/* End of file Controllername.php */
