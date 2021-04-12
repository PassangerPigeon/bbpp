<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hasilperah extends CI_Model
{

	public function daftarHasilPerahModel($id = null)
	{
		$this->db->select("tb_sapi.*,tb_hasilperah.*");
		$this->db->join('tb_sapi', 'tb_sapi.idSapi = tb_hasilperah.idSapi');
		if ($id != null) {
			$this->db->where('tb_hasilperah.idSapi', $id);
		}
		$check = $this->db->get('tb_hasilperah');
		return $check->result_array();
	}

	public function formEditHasilPerahModel($id = null)
	{
		$this->db->select("tb_sapi.*,tb_hasilperah.*");
		$this->db->join('tb_sapi', 'tb_sapi.idSapi = tb_hasilperah.idSapi');
		if ($id != null) {
			$this->db->where('tb_hasilperah.idPerah', $id);
		}
		$check = $this->db->get('tb_hasilperah');
		return $check->result_array();
	}

	public function jumlahPerahSapi($id)
	{
		$this->db->select('hasilPerahPagi, hasilPerahSore');
		$this->db->where('idSapi', $id);
		$cek = $this->db->get('tb_hasilperah');
		if ($cek) {
			$this->db->set('jumlahPerah', "hasilPerahPagi + hasilPerahSore", FALSE);
			$this->db->where('idSapi', $id);
			$this->db->update('tb_hasilperah');

			return true;
		}
		return false;
	}

	public function perahSapiTotal()
	{
		$this->db->select_sum('jumlahPerah');
		$query = $this->db->get('tb_hasilperah');
		$cek = $query->result_array();
		if ($cek) {
			foreach ($cek as $key) {
				return $key['jumlahPerah'];
			}
		} else {
			return false;
		}
	}

	public function tambahHasilPerahModel($data, $id)
	{
		$insert = $this->db->insert('tb_hasilperah', $data, $id);
		if ($this->db->affected_rows() > 0) {
			return $insert;
		} else {
			return false;
		}
	}

	public function editPerahModel($id, $newData)
	{
		$this->db->where('idPerah', $id);
		$update = $this->db->update('tb_hasilperah', $newData);
		if ($this->db->affected_rows() > 0) {
			return $update;
		} else {
			return false;
		}
	}

	public function hapusPerahModel($id)
	{
		$this->db->where('idPerah', $id);
		$delete = $this->db->delete('tb_hasilperah');
		if ($this->db->affected_rows() > 0) {
			return $delete;
		} else {
			return false;
		}
	}
}

/* End of file M_hasilperah.php */
/* Location: ./application/models/M_hasilperah.php */