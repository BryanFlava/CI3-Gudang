<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Tambah Data Barang";
		$where = array(
			'MONTH(tanggal)'	=> date('m'),
			'YEAR(tanggal)'		=> date('Y')
		);

		$data['jumlahBarang'] = $this->m_barang->tampil_data('tb_barang')->num_rows();
		$data['barangMasuk'] = $this->m_masuk->tampil_data('tb_masuk')->num_rows();
		$data['masuk'] = $this->m_masuk->get_stok($where, 'tb_masuk')->result();
		$data['barangKeluar'] = $this->m_keluar->tampil_data('tb_keluar')->num_rows();
		$data['keluar'] = $this->m_masuk->get_stok($where, 'tb_keluar')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/templates/footer');
	}
}
