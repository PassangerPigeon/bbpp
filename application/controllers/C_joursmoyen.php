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
        // $tglBeranak = $this->m_sapi->tglBeranak($id);
        // $IBAwal = $this->m_sapi->tglIBAwal($id);
        // $IBAkhir = $this->m_sapi->tglIBAkhir($id);
        // $jumlahIB = $this->m_sapi->jumlahIB($id);
        $data = array(
            // 'title' => "Sapi",
            // 'IBAwal' => $IBAwal,
            // 'IBAkhir' => $IBAkhir,
            // 'tglBeranak' => $tglBeranak,
            // 'jumlahIB' => $jumlahIB,
            "tglBeranak" => $this->m_joursmoyen->tglBeranakTerakhir($id), //bug gaming
            "tampil" => $this->m_joursmoyen->indexModel()
        );
        $this->load->view('view_bbpp/v_JoursMoyen', $data);
    }
}

/* End of file Controllername.php */
