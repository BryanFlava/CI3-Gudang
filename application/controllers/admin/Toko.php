<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['toko'] = $this->m_toko->tampil_data('tb_toko')->result();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/toko', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit()
	{
		$id			= $this->input->post('id');
		$pemilik	= $this->input->post('pemilik');
		$nama		= $this->input->post('nama');
		$alamat		= $this->input->post('alamat');
		$telp		= $this->input->post('telp');
		$email		= $this->input->post('email');
		$instagram	= $this->input->post('instagram');

		$where = array('id' => $id);

		$data = array(
			'pemilik' 	=> $pemilik,
			'nama' 		=> $nama,
			'alamat' 	=> $alamat,
			'telp' 		=> $telp,
			'email' 	=> $email,
			'instagram' => $instagram
		);

		$this->m_toko->edit_aksi($where, $data, 'tb_toko');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data toko berhasil diubah
			</div>
		');
		redirect('admin/toko');
	}
}
