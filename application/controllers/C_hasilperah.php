<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_hasilperah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_hasilperah');
		$this->load->model('m_sapi');
	}

	public function tampilHasilPerah($id = null)
	{
		$data =
			[
				'idSapi' => $id,
				'tampil' => $this->m_hasilperah->daftarHasilPerahModel($id)

			];
		$this->load->view('view_bbpp/v_hasilperah', $data);
	}


	public function formTambahHasilPerah()
	{
		$idSapi = $this->input->post('idSapi');
		$data = [
			'tampil' => $this->m_sapi->daftarSapiModel($idSapi),
			'idSapi' => $idSapi
		];
		$this->load->view('view_bbpp/v_tambahhasilperah', $data);
	}
	public function tambahHasilPerah()
	{
		$idSapi = $this->input->post('idSapi');
		$tglPerah = $this->input->post('tglPerah');
		$hasilPerahPagi = $this->input->post('hasilPerahPagi');
		$hasilPerahSore = $this->input->post('hasilPerahSore');
		$jumlahPerah = $this->m_hasilperah->jumlahPerahSapi($idSapi);

		$data =
			[
				'idSapi' => $idSapi,
				'tglPerah' => $tglPerah,
				'hasilPerahPagi' => $hasilPerahPagi,
				'hasilPerahSore' => $hasilPerahSore,
				'jumlahPerah' => $jumlahPerah
			];

		$insert = $this->m_hasilperah->tambahHasilPerahModel($data, $idSapi);
		if ($insert) {
			redirect('C_hasilperah/tampilHasilPerah/' . $idSapi, 'refresh');
		} else {
			echo 'gagal';
		}
	}

	public function formEditPerah($id)
	{

		$edit = $this->m_hasilperah->formEditHasilPerahModel($id);
		$data = array(
			'tampil' => $edit
		);
		$this->load->view('view_bbpp/v_editHasilPerah', $data);
	}

	public function editHasilPerah($id)
	{

		$idSapi = $this->input->post('idSapi');
		$tglPerah = $this->input->post('tglPerah');
		$hasilPerahPagi = $this->input->post('hasilPerahPagi');
		$hasilPerahSore = $this->input->post('hasilPerahSore');
		$jumlahPerah = $this->m_hasilperah->jumlahPerahSapi($idSapi);
		$data =
			[
				'idSapi' => $idSapi,
				'tglPerah' => $tglPerah,
				'hasilPerahPagi' => $hasilPerahPagi,
				'hasilPerahSore' => $hasilPerahSore,
				'jumlahPerah' => $jumlahPerah
			];
		$update = $this->m_hasilperah->editPerahModel($id, $data);
		if ($update) {
			redirect('C_hasilperah/tampilHasilPerah/' . $idSapi, 'refresh');
		} else {
			echo 'gagal';
		}
	}

	//Delete one item
	public function hapusHasilPerah($id, $idSapi)
	{

		$delete = $this->m_hasilperah->hapusPerahModel($id);
		if ($delete) {
			redirect('C_hasilperah/tampilHasilPerah/' . $idSapi, 'refresh');
		} else {
			echo 'gagal';
		}
	}
}

/* End of file C_hasilperah.php */
/* Location: ./application/controllers/C_hasilperah.php */