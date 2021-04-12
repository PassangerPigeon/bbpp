<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_sapi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sapi');
		$this->load->model('m_inseminasi');
		$this->load->model('m_log');
		
		
	}

	public function index()
	{
		$data = array(
			'title' => "Sapi",
			"tampil" => $this->m_sapi->daftarSapiModel()
		);
		$this->load->view('view_bbpp/v_sapi', $data);
	}

	public function formTambahSapi()
	{
		$this->load->view('view_bbpp/v_tambah_sapi');
	}

	public function detail_sapi($id = null)
	{
		$detail = $this->m_sapi->daftarSapiModel($id);
		$statBunting = $this->m_sapi->statBunting($id);
		$jenisKelamin = $this->m_sapi->jenisKelamin($id);
		$firstIB = $this->m_sapi->firstIB($id);
		$lastIB = $this->m_sapi->lastIB($id);
		$tglBeranak = $this->m_sapi->tglBeranak($id);
		$totalIB = $this->m_sapi->totalIB($id);
		
		$data = array(
			'idSapi' => $id,
			'statBunting' => $statBunting,
			'jenisKelamin' => $jenisKelamin,
			'firstIB' => $firstIB,
			'lastIB' => $lastIB,
			'tglBeranakTerakhir' => $tglBeranak,
			'jumlahIB' => $totalIB,
			'tampil' => $detail,
			'title' => "Detail Sapi"
		);
		$this->load->view('view_bbpp/v_detail_sapi', $data);
	}
	public function tambahSapi()
	{
		$gambar = $this->upload();

		if ($gambar == false) {
			redirect('c_sapi/formTambahSapi', 'refresh');
		} else {

			$namaSapi = $this->input->post('nama_sapi');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$usia = $this->input->post('usia');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$berat = $this->input->post('berat');
			$statLact = $this->input->post('statLact');
			$jumlahLaktasi = $this->input->post('jumlahLaktasi');
			$foto_sapi = $gambar;

			$data =
				[
					'namaSapi' => $namaSapi,
					'tglLahir' => $tanggal_lahir,
					'usia' => $usia,
					'sex' => $jenis_kelamin,
					'berat' => $berat,
					'statLact' => $statLact,
					'jumlahLaktasi' => $jumlahLaktasi,
					'fotoSapi' => $foto_sapi
				];
			date_default_timezone_set("Asia/Bangkok");
			$pesanLog = "Menambah data sapi baru";
			$dataLog = [
				'idUser' => $this->session->userdata('idUser'),
				'tglLog' => date("Y-m-d"),
				'jamLog' => date("h:i:s"),
				'isiLog' => $pesanLog
			];
			$insert = $this->m_sapi->tambahSapiModel($data);
			if ($insert) {
				$log = $this->m_log->tambahLogModel($dataLog);
				if ($log) {
					redirect('C_sapi', 'refresh');
				}else{
					echo "data log gagal";
				}	
			} else {
				echo 'gagal';
			}
		}
	}

	public function formEditSapi($id)
	{
		$edit = $this->m_sapi->daftarSapiModel($id);
		$data = array(
			'tampil' => $edit
		);
		$this->load->view('view_bbpp/v_edit_sapi', $data);
	}

	public function editSapi($id)
	{
		$gambar = $this->cekGambarEdit();

		if ($gambar == false) {
			redirect('c_sapi/formEditSapi', 'refresh');
		} else {

			$namaSapi = $this->input->post('nama_sapi');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$usia = $this->input->post('usia');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$berat = $this->input->post('berat');
			$statLact = $this->input->post('statLact');
			$jumlahLaktasi = $this->input->post('jumlahLaktasi');
			$foto_sapi = $gambar;

			$data =
				[
					'namaSapi' => $namaSapi,
					'tglLahir' => $tanggal_lahir,
					'usia' => $usia,
					'sex' => $jenis_kelamin,
					'berat' => $berat,
					'statLact' => $statLact,
					'jumlahLaktasi' => $jumlahLaktasi,
					'fotoSapi' => $foto_sapi
				];
			$update = $this->m_sapi->editSapiModel($id, $data);
			if ($update) {
				redirect('C_sapi', 'refresh');
			} else {
				echo 'gagal';
			}
		}
	}

	public function cekGambarEdit()
	{

		if ($_FILES['foto_sapi']['error'] === 4) {
			return $fotoSapi = $this->input->post('fotoSapiLama');
		} else {
			$fotoSapi = $this->upload();
			if ($fotoSapi == false) {
				return false;
			} else {
				$replace = $this->input->post('fotoSapiLama');
				$target_file = './././upload/' . $replace;
				unlink($target_file);
				return $fotoSapi;
			}
		}
	}



	public function hapusSapi($id)
	{
		$delete = $this->m_sapi->hapusSapiModel($id);
		if ($delete) {
			redirect('C_sapi', 'refresh');
		} else {
			echo 'gagal';
		}
	}

	public function upload()
	{
		$nama_file = $_FILES['foto_sapi']['name'];
		$error = $_FILES['foto_sapi']['error'];
		$tmp_name = $_FILES['foto_sapi']['tmp_name']; //tempat asal foto
		$type = $_FILES['foto_sapi']['type'];
		$size = $_FILES['foto_sapi']['size'];
		$extensigambar = pathinfo($nama_file, PATHINFO_EXTENSION);
		$nama_file_baru = uniqid() . '.' . $extensigambar;

		if ($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg') {

			if ($error === 0) {
				if ($size <= 2000000) {

					move_uploaded_file($tmp_name, './././upload/' . $nama_file_baru); //dipindah ke folder upload lalu diubah namanya
					return $nama_file_baru;
				} else {
					$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
						   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						   <h4><i class="icon fa fa-close"></i> Failed!</h4>
						   File Gambar Ukuran Melebihi Batas, Max File 2 MB. 
						 </div>');
				}
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
						   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						   <h4><i class="icon fa fa-close"></i> Failed!</h4>
						  File Gambar Error Bro.
						 </div>');
			}
		} else {
			$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
						   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						   <h4><i class="icon fa fa-close"></i> Failed!</h4>
						   File Gambar Extensi Tidak Sesuai Format.
						 </div>');
			return false;
		}
	}
}

/* End of file C_sapi.php */
/* Location: ./application/controllers/C_sapi.php */