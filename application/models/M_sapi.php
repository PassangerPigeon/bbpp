<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sapi extends CI_Model
{


	public function daftarSapiModel($id = null)
	{

		if ($id != null) {

			$this->db->where('idSapi', $id);
		}
		$check = $this->db->get('tb_sapi');

		return $check->result_array();
	}

	public function statBunting($id)
	{
		$query = $this->db->query("SELECT statInseminasi FROM tb_inseminasi WHERE idSapi = '$id'
		ORDER BY tglInseminasi DESC LIMIT 1");
		$cek = $query->result_array();

		if ($cek) {
			return $cek;
		} else {
			return false;
		}
	}

	public function tglIBAwal($id)
	{
		$query = $this->db->query("SELECT tglInseminasi FROM tb_inseminasi WHERE idSapi = '$id'
		ORDER BY tglInseminasi ASC LIMIT 1");
		$cek = $query->result_array();

		if ($cek) {
			return $cek;
		} else {
			return false;
		}
	}

	public function jenisKelamin($id)
	{
		$query = $this->db->query("SELECT sex FROM tb_sapi WHERE idSapi = '$id'");
		$cek = $query->result_array();
		if ($cek) {
			return $cek;
		} else {
			return false;
		}
	}

	public function tglIBAkhir($id)
	{
		$query = $this->db->query("SELECT tglInseminasi FROM tb_inseminasi WHERE idSapi = '$id'
		ORDER BY tglInseminasi DESC LIMIT 1");
		$cek = $query->result_array();

		if ($cek) {
			return $cek;
		} else {
			return false;
		}
	}

	public function tglBeranak($id)
	{
		$query = $this->db->query("SELECT tglBeranak FROM tb_inseminasi WHERE idSapi = '$id'
		ORDER BY tglBeranak DESC LIMIT 1");
		$cek = $query->result_array();

		if ($cek) {
			return $cek;
		} else {
			return false;
		}
	}

	public function jumlahIB($id)
	{

		$this->db->where('idSapi', $id);
		$cek = $this->db->count_all_results('tb_inseminasi');

		if (
			$this->db->affected_rows() > 0
		) {
			return $cek;
		} else {
			return false;
		}
	}

	public function jumlahSapi()
	{
		$cek = $this->db->count_all_results('tb_sapi');
		return $cek;
	}


	public function tambahSapiModel($data)
	{
		$insert = $this->db->insert('tb_sapi', $data);
		if ($this->db->affected_rows() > 0) {
			return $insert;
		} else {
			return false;
		}
	}
	public function hapusSapiModel($id)
	{
		$this->db->where('idSapi', $id);
		$delete = $this->db->delete('tb_sapi');
		if ($this->db->affected_rows() > 0) {
			return $delete;
		} else {
			return false;
		}
	}

	public function editSapiModel($id, $newData)
	{
		$this->db->where('idSapi', $id);
		$update = $this->db->update('tb_sapi', $newData);
		if ($this->db->affected_rows() > 0) {
			return $update;
		} else {
			return false;
		}
	}
}

/* End of file M_sapi.php */
/* Location: ./application/models/M_sapi.php */