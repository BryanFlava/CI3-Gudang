<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {

	public function get_login($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
