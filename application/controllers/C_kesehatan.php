<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kesehatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sapi');
		$this->load->model('m_kesehatan');
	}

	public function index($id = null)
	{
		$data = 
			[
				"tampil" => $this->m_kesehatan->daftarCekKesehatanModel(),
				"idSapi" => $id
			];
		$this->load->view('view_bbpp/v_kesehatan', $data);
	}

	public function detailKesehatan($id)
	{
		$detail = $this->m_kesehatan->daftarCekKesehatanModel($id);
		
		$data = array(
			'tampil' => $detail,
			'title' => "Detail Kesehatan"
		);
		$this->load->view('view_bbpp/v_detailKesehatan', $data);
	}

	public function verifKesehatan($id)
	{
		
		$verif = $this->input->post('statusPetugasKesehatan');

		$data=[
			'statusPetugasKesehatan' => $verif
		];
		$update = $this->m_kesehatan->verifKesehatanModel($id, $data);
		if($update){
			redirect('C_kesehatan, refresh');
		}
		else{
			echo "gagal";
		}
	}
}

/* End of file C_kesehatan.php */
/* Location: ./application/controllers/C_kesehatan.php */