<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	public function daftarUserModel($id=null)
	{
		if ($id != null) {
			$this->db->where('idUser', $id);
		}
		$check = $this->db->get('tb_user');
		if ($this->db->affected_rows() > 0) {
			return $check->result_array();
		} else {
			return false;
		}
	}

	public function totalUser()
	{
		$cek = $this->db->count_all_results('tb_user');
			return $cek;
	}

	public function tambahUserModel($data)
	{
		$insert = $this->db->insert('tb_user', $data);
		if ($this->db->affected_rows() > 0) {
			return $insert;
		} else {
			return false;
		}
	}

	public function hapusUserModel($id)
	{
		$this->db->where('idUser', $id);
		$delete = $this->db->delete('tb_user');
		if ($this->db->affected_rows() > 0) {
			return $delete;
		} else {
			return false;
		}
	}

	public function userVerif($username, $password)
	{
		$this->db->select('idUser,username,pass,namaUser,jabatan');
		$this->db->from('tb_user');
		$this->db->where('username', $username);
		$this->db->where('pass', $password);
		$this->db->limit(1); //limit data yang dicari

		$cek = $this->db->get();

		if ($cek->num_rows() == 1) {
			return $cek->result_array();
		} else {
			return false;
		}
	}

	public function editUserModel($id, $newData)
	{
		$this->db->where('idUser', $id);
		$update = $this->db->update('tb_user', $newData);
		if ($this->db->affected_rows() > 0) {
			return $update;
		} else {
			return false;
		}
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */