<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masuk extends CI_Model {

	public function tampil_data($table)
	{
		$this->db->ORDER_BY('id', 'DESC');
		return $this->db->get($table);
	}

	public function get_stok($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_stok($whereupdate, $dataupate, $table)
	{
		$this->db->where($whereupdate);
		$this->db->update($table, $dataupate);
	}

	public function insert($datainsert, $table)
	{
		$this->db->insert($table, $datainsert);
	}

	public function delete($where, $table)
	{
		$this->db->delete($table, $where);
	}

	public function update($wherekode, $data, $table)
	{
		$this->db->where($wherekode);
		$this->db->update($table, $data);
	}

	public function get_stok_edit($wherekode, $table)
	{
		return $this->db->get_where($table, $wherekode);
	}

	public function update_stok_edit($wherekode, $dataupdatestok, $table)
	{
		$this->db->where($wherekode);
		$this->db->update($table, $dataupdatestok);
	}

	public function update_jumlah_edit($whereid, $dataupdatejumlah, $table)
	{
		$this->db->where($whereid);
		$this->db->update($table, $dataupdatejumlah);
	}

	public function cetak_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}