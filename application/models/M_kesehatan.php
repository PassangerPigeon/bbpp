<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kesehatan extends CI_Model {

	public function daftarCekKesehatanModel($id = null)
	{
		$this->db->select("tb_sapi.*,tb_cekkesehatan.*");
		$this->db->join('tb_sapi', 'tb_sapi.idSapi = tb_cekkesehatan.idSapi');
		if ($id != null) {
			$this->db->where('idCek', $id);
		}
		
		$check = $this->db->get('tb_cekKesehatan');
		if ($check) {
			return $check->result_array();
		} else {
			return false;
		}
	}

	public function verifKesehatanModel($id, $data)
	{
		$this->db->where('idCek', $id);
		$update = $this->db->update('tb_cekkesehatan', $data);
		if($this->db->affected_rows() > 0) {
			return $update;
		} else {
			return false;		}
		
	}

}

/* End of file M_kesehatan.php */
/* Location: ./application/models/M_kesehatan.php */