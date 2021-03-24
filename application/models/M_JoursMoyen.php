<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_joursmoyen extends CI_Model
{

	public function daftarSapiModel($id = null)
	{

		if ($id != null) {

			$this->db->where('idSapi', $id);
		}
		$check = $this->db->get('tb_sapi');

		return $check->result_array();
	}
	public function voluntaryPeriod($id)
	{
		$query = $this->db->query("SELECT jumlahLaktasi FROM tb_sapi WHERE idSapi = '$id'");
		$cek = $query->result_array();
		if ($cek) {
			return $cek;
		} else {
			return false;
		}
	}
}

/* End of file M_jmr.php */
/* Location: ./application/models/M_jmr.php */