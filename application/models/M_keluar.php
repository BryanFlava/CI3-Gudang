<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Keluar extends CI_Model {

	public function tampil_data($table)
	{
		$this->db->ORDER_BY('id', 'DESC');
		return $this->db->get($table);
	}
}