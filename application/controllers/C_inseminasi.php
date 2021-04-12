<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_inseminasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_inseminasi');
		$this->load->model('m_sapi');
	}

	public function lihatInseminasi($id = null)
	{
		$data =
			[
				'tampil' => $this->m_inseminasi->daftarInseminasiModel($id),
				'idSapi' => $id
			];
		$this->load->view('view_bbpp/v_inseminasi', $data);
	}

	public function formTambahInseminasi()
	{
		$idSapi = $this->input->post('idSapi');
		$data = [
			'tampil' => $this->m_sapi->daftarSapiModel($idSapi),
			'idSapi' => $idSapi
		];
		$this->load->view('view_bbpp/v_tambahInseminasi', $data);
	}
	public function tambahInseminasi()
	{
		$idSapi = $this->input->post('idSapi');
		$asalSperma = $this->input->post('asalSperma');
		$tglInseminasi = $this->input->post('tglInseminasi');
		$statInseminasi = $this->input->post('statInseminasi');
		$tglPositif = $this->input->post('tglPositif');
		$tglBeranak = $this->input->post('tglBeranak');


		$data =
			[
				'idSapi' => $idSapi,
				'asalSperma' => $asalSperma,
				'tglInseminasi' => $tglInseminasi,
				'statInseminasi' => $statInseminasi,
				'tglPositif' => $tglPositif,
				'tglBeranak' => $tglBeranak
			];

		$data2 =
			[
				'idSapi' => $idSapi,
				'statPositif' => $statInseminasi,
				'tglBeranakTerakhir' => $tglBeranak,
				'firstIB' => $this->m_sapi->firstIB($idSapi),
				'lastIB' => $this->m_sapi->lastIB($idSapi),
				'jumlahIB' => $this->m_sapi->totalIB($idSapi)
			];
		$insert = $this->m_inseminasi->tambahInseminasiModel($data);
		$insert2 = $this->m_sapi->editSapiModel($idSapi, $data2);
		if ($insert && $insert2) {
			redirect('C_inseminasi/lihatInseminasi/' . $idSapi, 'refresh');
		} else {
			echo 'gagal';
		}
	}

	public function formEditInseminasi($id)
	{
		$edit = $this->m_inseminasi->formEditInseminasiModel($id);
		$data = array(
			'tampil' => $edit
		);
		$this->load->view('view_bbpp/v_editInseminasi', $data);
	}

	public function editInseminasi($id)
	{

		$idSapi = $this->input->post('idSapi');
		$asalSperma = $this->input->post('asalSperma');
		$tglInseminasi = $this->input->post('tglInseminasi');
		$statInseminasi = $this->input->post('statInseminasi');
		$tglPositif = $this->input->post('tglPositif');
		$tglBeranak = $this->input->post('tglBeranak');


		$data =
			[
				'idSapi' => $idSapi,
				'asalSperma' => $asalSperma,
				'tglInseminasi' => $tglInseminasi,
				'statInseminasi' => $statInseminasi,
				'tglPositif' => $tglPositif,
				'tglBeranak' => $tglBeranak
			];

		$data2 =
			[
				'idSapi' => $idSapi,
				'statPositif' => $statInseminasi,
				'tglBeranakTerakhir' => $tglBeranak,
				'firstIB' => $this->m_sapi->firstIB($idSapi),
				'lastIB' => $this->m_sapi->lastIB($idSapi),
				'jumlahIB' => $this->m_sapi->totalIB($idSapi)
			];
		$update = $this->m_inseminasi->editInseminasiModel($id, $data);
		$update2 = $this->m_sapi->editSapiModel($idSapi, $data2);
		if ($update && $update2) {
			redirect('C_inseminasi/lihatInseminasi/' . $idSapi, 'refresh');
		} else {
			echo 'gagal';
		}
	}
	public function hapusInseminasi($id, $idSapi)
	{

		$delete = $this->m_inseminasi->hapusInseminasiModel($id);
		if ($delete) {
			redirect('C_inseminasi/lihatInseminasi/' . $idSapi, 'refresh');
		} else {
			echo 'gagal';
		}
	}
}

/* End of file C_inseminasi.php */
/* Location: ./application/controllers/C_inseminasi.php */