<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_hasilperah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_hasilperah');
		$this->load->model('m_sapi');
		$this->load->model('m_log');
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

		date_default_timezone_set("Asia/Bangkok");
		$pesanLog = "Menambah hasil perah baru";
		$dataLog = [
			'idUser' => $this->session->userdata('idUser'),
			'tglLog' => date("Y-m-d"),
			'jamLog' => date("h:i:s"),
			'isiLog' => $pesanLog
		];
		$insert = $this->m_hasilperah->tambahHasilPerahModel($data, $idSapi);
		if ($insert) {
			$log = $this->m_log->tambahLogModel($dataLog);
			if ($log) {
				redirect('C_hasilperah/tampilHasilPerah/'.$idSapi, 'refresh');
			} else {
				echo "data log gagal";
			}
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

		date_default_timezone_set("Asia/Bangkok");
		$pesanLog = "Mengubah data hasil perah";
		$dataLog = [
			'idUser' => $this->session->userdata('idUser'),
			'tglLog' => date("Y-m-d"),
			'jamLog' => date("h:i:s"),
			'isiLog' => $pesanLog
		];
		$update = $this->m_hasilperah->editPerahModel($id, $data);
		if ($update) {
			$log = $this->m_log->tambahLogModel($dataLog);
			if ($log) {
				redirect('C_hasilperah/tampilHasilPerah/'.$idSapi, 'refresh');
			} else {
				echo "data log gagal";
			}
		} else {
			echo 'gagal';
		}
	}

	//Delete one item
	public function hapusHasilPerah($id, $idSapi)
	{
		$delete = $this->m_hasilperah->hapusPerahModel($id);
		date_default_timezone_set("Asia/Bangkok");
		$pesanLog = "Menghapus data hasil perah";
		$dataLog = [
			'idUser' => $this->session->userdata('idUser'),
			'tglLog' => date("Y-m-d"),
			'jamLog' => date("h:i:s"),
			'isiLog' => $pesanLog
		];
		if ($delete) {
			$log = $this->m_log->tambahLogModel($dataLog);
			if ($log) {
				redirect('C_hasilperah/tampilHasilPerah/'.$idSapi, 'refresh');
			} else {
				echo "data log gagal";
			}
		} else {
			echo 'gagal';
		}
	}
}


/* End of file C_hasilperah.php */
/* Location: ./application/controllers/C_hasilperah.php */