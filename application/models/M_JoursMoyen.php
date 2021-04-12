<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_joursmoyen extends CI_Model
{

	public function daftarJMRModel($id = null)
	{
		if ($id != null) {
			$this->db->where('idSapi', $id);
		}
		$check = $this->db->get('tb_sapi');
		return $check->result_array();
	}

	public function indexModel()
	{
		$this->db->select('tb_sapi.*');
		$this->db->where('sex', 'Betina');
		$cek = $this->db->get('tb_sapi');
		return $cek->result_array();
	}

}

/* End of file M_jmr.php */
/* Location: ./application/models/M_jmr.php */