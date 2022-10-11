<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_toko extends CI_Model {

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function edit_aksi($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}