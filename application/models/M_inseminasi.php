<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_inseminasi extends CI_Model
{

	public function daftarInseminasiModel($id = null)
	{

		if ($id != null) {
			$this->db->select('tb_inseminasi.*, tb_sapi.*, tb_inseminasi.tglBeranak AS tglBeranakInseminasi');
			$this->db->join('tb_sapi', 'tb_sapi.idSapi = tb_inseminasi.idSapi');
			$this->db->where('tb_sapi.idSapi', $id);	
		}

		$check = $this->db->get('tb_inseminasi');
		if ($check) {
			return $check->result_array();
		} else {
			return false;
		}
	}

	public function tambahInseminasiModel($data)
	{
		$insert = $this->db->insert('tb_inseminasi', $data);
		if ($this->db->affected_rows() > 0) {
			return $insert;
		} else {
			return false;
		}
	}

	public function editInseminasiModel($id, $newData)
	{
		$this->db->where('idInseminasi', $id);
		$update = $this->db->update('tb_inseminasi', $newData);
		if ($this->db->affected_rows() > 0) {
			return $update;
		} else {
			return false;
		}
	}
	public function hapusInseminasiModel($id)
	{
		$this->db->where('idInseminasi', $id);
		$delete = $this->db->delete('tb_inseminasi');
		if ($this->db->affected_rows() > 0) {
			return $delete;
		} else {
			return false;
		}
	}
}

/* End of file M_inseminasi.php */
/* Location: ./application/models/M_inseminasi.php */