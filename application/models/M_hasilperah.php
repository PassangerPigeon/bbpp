<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hasilperah extends CI_Model
{

	public function daftarhasilPerahModel($id = null)
	{
		$this->db->select("tb_sapi.*,tb_hasilperah.*");
		$this->db->join('tb_sapi', 'tb_sapi.idSapi = tb_hasilperah.idSapi');
		if ($id != null) {
			$this->db->where('idPerah', $id);
		}
		$check = $this->db->get('tb_hasilperah');
		if ($check) {
			return $check->result_array();
		} else {
			return false;
		}
	}

	public function jumlahPerah()
	{
		$this->db->select_sum('jumlahPerah');
		$cek = $this->db->get('tb_hasilperah');
		if ($cek->num_rows() > 0) {
			return $cek->row()->jumlahPerah;
		}
		return false;	
		
	}


	public function tambahHasilPerahModel($data)
	{
		$insert = $this->db->insert('tb_hasilperah', $data);
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