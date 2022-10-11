<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function insert($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function tampil_data($table)
	{
		$this->db->ORDER_BY('id', 'DESC');
		return $this->db->get($table);
	}

	public function delete($where, $table)
	{
		$this->db->delete($table, $where);
	}

	public function update($data, $where, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
