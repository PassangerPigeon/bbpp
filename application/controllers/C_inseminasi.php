<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_inseminasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_inseminasi');
		$this->load->model('m_sapi');
		$this->load->model('m_log');
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
		$this->form_validation->set_rules('tglInseminasi', 'Tanggal Inseminasi', 'required|is_unique[tb_inseminasi.tglInseminasi]');
		$this->form_validation->set_rules('asalSperma', 'Asal Sperma', 'required');
		$this->form_validation->set_message('is_unique', 'Sapi telah melakukan inseminasi buatan');
		$this->form_validation->set_message('required', 'Tolong isi %s');

		if ($this->form_validation->run() == FALSE) {
			$this->formTambahInseminasi();
		} else {
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
			date_default_timezone_set("Asia/Bangkok");
			$pesanLog = "Menambah inseminasi baru";
			$dataLog = [
				'idUser' => $this->session->userdata('idUser'),
				'tglLog' => date("Y-m-d"),
				'jamLog' => date("h:i:s"),
				'isiLog' => $pesanLog
			];
			$insert = $this->m_inseminasi->tambahInseminasiModel($data);
			$insert2 = $this->m_sapi->editSapiModel($idSapi, $data2);
			if ($insert && $insert2) {
				$log = $this->m_log->tambahLogModel($dataLog);
				if ($log) {
					redirect('C_inseminasi/lihatInseminasi/' . $idSapi, 'refresh');
				} else {
					echo "data log gagal";
				}
			} else {
				echo 'gagal';
			}
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
		$this->form_validation->set_rules('tglInseminasi', 'Tanggal Inseminasi', 'is_unique[tb_inseminasi.tglInseminasi]');

		$this->form_validation->set_message('is_unique', '%s Sapi telah melakukan inseminasi buatan');

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
		$pesanLog = "Mengubah data inseminasi";
		$dataLog = [
			'idUser' => $this->session->userdata('idUser'),
			'tglLog' => date("Y-m-d"),
			'jamLog' => date("h:i:s"),
			'isiLog' => $pesanLog
		];
		$update = $this->m_inseminasi->editInseminasiModel($id, $data);
		$update2 = $this->m_sapi->editSapiModel($idSapi, $data2);
		if ($update && $update2) {
			$log = $this->m_log->tambahLogModel($dataLog);
			if ($log) {
				redirect('C_inseminasi/lihatInseminasi/' . $idSapi, 'refresh');
			} else {
				echo "data log gagal";
			}
		} else {
			echo 'gagal';
		}
	}
	public function hapusInseminasi($id, $idSapi)
	{
		$pesanLog = "Menghapus data inseminasi";
		$dataLog = [
			'idUser' => $this->session->userdata('idUser'),
			'tglLog' => date("Y-m-d"),
			'jamLog' => date("h:i:s"),
			'isiLog' => $pesanLog
		];
		$delete = $this->m_inseminasi->hapusInseminasiModel($id);
		if ($delete) {
			$log = $this->m_log->tambahLogModel($dataLog);
			if ($log) {
				redirect('C_inseminasi/lihatInseminasi/' . $idSapi, 'refresh');
			} else {
				echo "data log gagal";
			}
		} else {
			echo 'gagal';
		}
	}
}

/* End of file C_inseminasi.php */
/* Location: ./application/controllers/C_inseminasi.php */