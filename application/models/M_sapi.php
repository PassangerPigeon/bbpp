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

	public function firstIB($id)
	{
		$this->db->select('tglInseminasi');
		$this->db->where('idSapi', $id);
		$this->db->order_by('tglInseminasi', 'asc');
		$query = $this->db->get('tb_inseminasi', 1);
		$cek = $query->result_array();
		if ($cek) {
			foreach ($cek as $key) {
				echo $key['tglInseminasi'];
				$this->db->where('idSapi', $id);
				$this->db->set('firstIB', $key['tglInseminasi']);
				$this->db->update('tb_sapi');
			}
		} else {
			return false;
		}
	}

	public function lastIB($id)
	{

		$this->db->select('tglInseminasi');
		$this->db->where('idSapi', $id);
		$this->db->order_by('tglInseminasi', 'desc');
		$query = $this->db->get('tb_inseminasi', 1);
		$cek = $query->result_array();
		if ($cek) {
			foreach ($cek as $key) {
				echo $key['tglInseminasi'];
				$this->db->where('idSapi', $id);
				$this->db->set('lastIB', $key['tglInseminasi']);
				$this->db->update('tb_sapi');
			}
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

	public function totalIB($id)
	{
		$this->db->where('idSapi', $id);
		$cek = $this->db->count_all_results('tb_inseminasi');
		if ($cek) {
			echo $cek;
			$this->db->set('jumlahIB', $cek);
			$this->db->where('idSapi', $id);
			$this->db->update('tb_sapi');
		} else {
			return false;
		}
	}

	public function jumlahSapi()
	{
		$cek = $this->db->count_all('tb_sapi');
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
}

/* End of file M_sapi.php */
/* Location: ./application/models/M_sapi.php */