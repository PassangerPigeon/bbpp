<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_log extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function tampilLogModel()
    {
        $this->db->select("tb_user.*,tb_log.*");
        $this->db->join('tb_user', 'tb_user.idUser = tb_log.idUser');
        
		$check = $this->db->get('tb_log');
		if ($check) {
			return $check->result_array();
		} else {
			return false;
		}
    }

    public function tambahLogModel($data)
    {
        $insert = $this->db->insert('tb_log', $data);
		if ($this->db->affected_rows() > 0) {
			return $insert;
		} else {
			return false;
		}
    }
}

/* End of file M_log.php */
/* Location: ./application/models/M_log.php */