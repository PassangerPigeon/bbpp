<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		check_session_not_login();
		$data = array(
			'title' => "User",
			"tampil" => $this->m_user->daftarUserModel()
		);
		$this->load->view('view_bbpp/v_user', $data);
	}

	public function formTambahUser()
	{
		$data = array(
			'title' => "User"
		);
		$this->load->view('view_bbpp/v_tambah_user', $data);
	}
	public function tambahUser()
	{

		$this->form_validation->set_rules('username', 'Username', 'is_unique[tb_user.username]');
		$this->form_validation->set_rules('nomorTelp', 'Nomor Telepon', 'max_length[15]|is_unique[tb_user.nomorTelp]');

		$this->form_validation->set_rules('pass', 'Password', 'min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'matches[pass]');

		//set pesan error
		$this->form_validation->set_message('is_unique', '%s sudah dipakai');
		$this->form_validation->set_message('required', '%s harap dipilih terlebih dahulu');
		$this->form_validation->set_message('max_length', '%s maximal 15 karakter');
		$this->form_validation->set_message('min_length', '%s minimal 8 karakter');
		$this->form_validation->set_message('matches', '%s yang diisi tidak sama dengan password');


		if ($this->form_validation->run() == FALSE) {
			$this->formTambahUser();
		} else {
			$namaUser = $this->input->post('namaUser');
			$username = $this->input->post('username');
			$password = $this->input->post('pass');
			$jabatan = $this->input->post('jabatan');
			$nomorTelp = $this->input->post('nomorTelp');
			$alamat = $this->input->post('alamat');

			$data =
				[
					'namaUser' => $namaUser,
					'username' => $username,
					'pass' => sha1($password),
					'jabatan' => $jabatan,
					'nomorTelp' => $nomorTelp,
					'alamat' => $alamat,
				];
			$insert = $this->m_user->tambahUserModel($data);
			if ($insert) {
				redirect('C_User', 'refresh');
			} else {
				echo 'gagal';
			}
		}
	}

	public function hapusUser($id)
	{
		$delete = $this->m_user->hapusUserModel($id);
		if ($delete) {
			redirect('C_user', 'refresh');
		} else {
			echo 'gagal';
		}
	}

	public function formEditUser($id)
	{
		$edit = $this->m_user->daftarUserModel($id);
		$data = array(
			'tampil' => $edit
		);
		$this->load->view('view_bbpp/v_edit_user', $data);
	}

	public function editUser($id)
	{
		$this->form_validation->set_rules('pass', 'Password', 'min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'matches[pass]');
		//set pesan error
		$this->form_validation->set_message('required', '%s harap dipilih terlebih dahulu');
		$this->form_validation->set_message('min_length', '%s minimal 8 karakter');
		$this->form_validation->set_message('matches', '%s yang diisi tidak sama dengan password');


		if ($this->form_validation->run() == FALSE) {
			$this->formEditUser($id);
		} else {
			$namaUser = $this->input->post('namaUser');
			$username = $this->input->post('username');
			$password = $this->input->post('pass');
			$jabatan = $this->input->post('jabatan');
			$nomorTelp = $this->input->post('nomorTelp');
			$alamat = $this->input->post('alamat');

			$data =
				[
					'namaUser' => $namaUser,
					'username' => $username,
					'pass' => sha1($password),
					'jabatan' => $jabatan,
					'nomorTelp' => $nomorTelp,
					'alamat' => $alamat,
				];
			$update = $this->m_user->editUserModel($id, $data);
			if ($update) {
				redirect('C_User', 'refresh');
			} else {
				echo 'gagal';
			}
		}
	}

	public function ceklogin()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('pass'));

		$cekdata = $this->m_user->userVerif($username, $password);
		

		if ($cekdata) {

			foreach ($cekdata as $key) {

				$array = array(
					'idUser' => $key['idUser'],
					'namaUser' => $key['namaUser'],
					'username' => $key['username'],
					'jabatan' => $key['jabatan']
				);

				

				$this->session->set_userdata($array);



				if (($this->session->userdata('jabatan') === 'admin') || ($this->session->userdata('jabatan') === 'kepala kandang')) {
					redirect('c_dashboard');
					// 	redirect('dashboard', 'refresh');
					// } else if ($this->session->userdata('level') == 'kasir') {
					// 	redirect('dashboard', 'refresh');
					// } else if ($this->session->userdata('level') == 'chef') {
					// 	redirect('dashboard', 'refresh');
					// }
				}
			}
		} else {
			$data['pesan'] = '<div class="alert alert-danger alert-dismissible">
		<h4><b>X</b> Failed!</h4>
		Login Gagal.
	  </div>';

			$this->load->view('dist/auth-login', $data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('dist/auth-login');
	}
}

/* End of file C_user.php */
/* Location: ./application/controllers/C_user.php */