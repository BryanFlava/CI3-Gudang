<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/profil');
		$this->load->view('admin/templates/footer');
	}

	public function edit()
	{
		$id 		= $this->input->post('id');
		$username	= $this->input->post('username');
		$nama 		= $this->input->post('nama');

		$data = array(
			'username' 	=> $username,
			'nama' 		=> $nama
		);

		$where = array('id' => $id);

		$datauser = array(
			'id' => $id,
			'username' => $username,
			'nama' => $nama,
		);

		$this->session->set_userdata($datauser);
		$this->m_toko->edit_aksi($where, $data, 'tb_user');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data profil berhasil diubah
			</div>
		');
		redirect('admin/profil');
	}

	public function password()
	{
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');
		$id 	 	= $this->input->post('id');

		if ($password1 != $password2) {
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Maaf!</strong> Password tidak sama
				</div>
			');
			redirect('admin/profil');
		} else {

			$data = array(
				'password' => md5($password1)
			);

			$where = array(
				'id' => $id
			);

			$this->m_toko->edit_aksi($where, $data, 'tb_user');
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Selamat!</strong> Data password berhasil diubah
				</div>
			');
			redirect('admin/profil');
		}
	}

	public function foto()
	{
		$id 	= $this->input->post('id');
		$foto 	= $_FILES['foto'];

		if ($foto != '') {
			$config['upload_path'] = './assets/image/profil';
			$config['allowed_types'] = 'png|jpg';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('pesan', '
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Maaf!</strong> Foto gagal diupload
					</div>
				');
				redirect('admin/profil');
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$where = array('id' => $id);
		$data = array('foto' => $foto);
		$this->session->set_userdata($data);
		$this->m_toko->edit_aksi($where, $data, 'tb_user');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data password berhasil diubah
			</div>
		');
		redirect('admin/profil');
	}
}
