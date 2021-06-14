<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sapi');
        $this->load->model('m_hasilperah');
        $this->load->model('m_user');       
    }
    
    public function index()
    {
        $data = array(
            "tampilSapi" => $this->m_sapi->daftarSapiModel(),
            "tampilJumlahSapi" => $this->m_sapi->jumlahSapi(),
            "tampilJumlahPerah" => $this->m_hasilperah->perahSapiTotal(),
            "tampilUser" => $this->m_user->totalUser()
        );
		$this->load->view('view_bbpp/V_dashboard', $data);
    }

}

/* End of file Controllername.php */
