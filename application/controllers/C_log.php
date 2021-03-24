<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_log extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_log');
    }
    

    public function index()
    {
        $data = array(
			"tampil" => $this->m_log->tampilLogModel()
		);
        $this->load->view('view_bbpp/v_log', $data);
    }

}

/* End of file Controllername.php */

?>