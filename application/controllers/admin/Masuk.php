<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->tampil_data('tb_barang')->result();
		$data['masuk'] = $this->m_masuk->tampil_data('tb_masuk')->result();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/masuk', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_barang()
	{
		$kode		= $this->input->post('kode');
		$tanggal	= $this->input->post('tanggal');
		$jumlah		= $this->input->post('jumlah');

		$where = array(
			'kode' => $kode
		);

		$stok = $this->m_masuk->get_stok($where, 'tb_barang')->result();

		foreach ($stok as $stk) {
			$stok = $stk->stok;
			$updatestok = $stok + $jumlah;
		}

		$datainsert = array(
			'kode' => $kode,
			'tanggal' => $tanggal,
			'jumlah' => $jumlah,
		);

		$whereupdate = array('kode' => $kode);

		$dataupate = array(
			'stok' => $updatestok
		);

		$this->m_masuk->update_stok($whereupdate, $dataupate, 'tb_barang');
		$this->m_masuk->insert($datainsert, 'tb_masuk');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data barang masuk berhasil ditambahkan
			</div>
		');
		redirect('admin/masuk');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);

		$datamasuk = $this->m_masuk->get_stok($where, 'tb_masuk')->result();

		foreach ($datamasuk as $dtmsk) {
			$wherebarang = array('kode' => $dtmsk->kode);
			$jumlahmasuk = $dtmsk->jumlah;
		}

		$databarang = $this->m_masuk->get_stok($wherebarang, 'tb_barang')->result();

		foreach ($databarang as $dtbrng) {
			$jumlahstok = $dtbrng->stok;
		}

		$stok = $jumlahstok-$jumlahmasuk;

		$wherekode = array('kode' => $dtmsk->kode);

		$data = array('stok' => $stok);

		$this->m_masuk->delete($where, 'tb_masuk');
		$this->m_masuk->update($wherekode, $data, 'tb_barang');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data barang masuk berhasil dihapus
			</div>
		');
		redirect('admin/masuk');
	}

	public function edit()
	{
		$id 		= $this->input->post('id');
		$kode 		= $this->input->post('kode');
		$tanggal	= $this->input->post('tanggal');
		$jumlah 	= $this->input->post('jumlah');

		$whereid = array('id' => $id);

		$wherekode = array('kode' => $kode);

		$datastok['barang'] = $this->m_masuk->get_stok_edit($wherekode, 'tb_barang')->result();
		$datastok['masuk'] = $this->m_masuk->get_stok_edit($wherekode, 'tb_masuk')->result();

		foreach ($datastok['barang'] as $dtstk) {
			$stok = $dtstk->stok;
		}

		foreach ($datastok['masuk'] as $dtmsk) {
			$jumlahmasuk = $dtmsk->jumlah;
		}

		$jumlahstok = $stok - $jumlahmasuk;
		$updatestok = $jumlahstok + $jumlah;

		$dataupdatestok = array('stok' => $updatestok);

		$dataupdatejumlah = array(
			'jumlah' => $jumlah,
			'tanggal' => $tanggal
		);

		$this->m_masuk->update_stok_edit($wherekode, $dataupdatestok, 'tb_barang');
		$this->m_masuk->update_jumlah_edit($whereid, $dataupdatejumlah, 'tb_masuk');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data barang masuk berhasil diubah
			</div>
		');
		redirect('admin/masuk');

	}

	public function cetak()
	{
		$bulan = $this->input->post('bulan');
		$jenis = $this->input->post('jenis');

		$where = array(
			'MONTH(tanggal)' => $bulan
		);

		$data['cetak'] = $this->m_masuk->cetak_data($where, 'tb_masuk')->result();
		$data['jenis'] = $jenis;

		$this->load->view('admin/cetak', $data);
	}
}
