<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cek = $this->m_welcome->get_login($where, 'tb_user')->num_rows();

		if ($cek > 0) {
			
			$user = $this->m_welcome->get_login($where, 'tb_user')->result();
			foreach ($user as $usr) {
				$datauser = array(
					'id' 		=> $usr->id,
					'username' 	=> $usr->username,
					'password' 	=> $usr->password,
					'nama' 		=> $usr->nama,
					'foto' 		=> $usr->foto
				);
			}

			$this->session->set_userdata($datauser);
			redirect('admin/dashboard');

		} else {
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Maaf!</strong> Login gagal
				</div>
			');
			redirect('welcome');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
