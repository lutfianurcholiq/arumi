<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function index() {
		udahLogin();
		$data['judul'] = ucwords('login');
		$this->form_validation->set_rules('username', ucwords('username'), 'required');
		$this->form_validation->set_rules('password', ucwords('password'), 'required');
		$this->form_validation->set_error_delimiters('<div><b style="color: tomato;">', '</b></div>');
		if ($this->form_validation->run() == FALSE) {
			$data['url'] = site_url('welcome');
			$this->load->view('template/header', $data);
			$this->load->view('loginPage', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->_login();
		}
	}
	private function _login() {
		$this->db->where('username', $_POST['username']);
		if ($_POST['akses'] == 'pelanggan') {
			$this->db->from('pelanggan');
		}
		else {
			$this->db->from('akun');
		}
		$user 	=	$this->db->get()->row_array();
		if ($user) { 
			if ($_POST['password'] == $user['password']) {
				if ($_POST['akses'] == 'pelanggan') {
					$data	=	[
									'pelanggan_id' =>	$user['id_pelanggan'],
									'nama'		   =>	$user['nama_pelanggan'],
									'username'	   =>	$user['username'],
									'no_wa'	   	   =>	$user['no_wa'],
									'alamat'	   =>	$user['alamat'],
								];
					$this->session->set_userdata($data);
					redirect('pelangganBeranda');
				}
				else {
					$data	=	[
									'nama'		=>	$user['nama'],
									'username'	=>	$user['username'],
									'level'		=>	$user['level'],
									'foto'		=>	$user['foto']
								];
					$this->session->set_userdata($data);
					redirect('beranda');
				}
			}
			else {
				$this->session->set_flashdata('pesan2', '<div><b style="color: tomato;">Password salah!</b></div>');
				redirect('welcome');
			}
		}
		else {
			$this->session->set_flashdata('pesan1', '<div><b style="color: tomato;">Username tidak ada!</b></div>');
			redirect('welcome');	
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		if ($this->session->userdata('pelanggan_id')) {
			redirect('landing');
		}
		else {
			redirect('welcome');
		}
	}
	public function blok() {
		$this->load->view('errors/404');
	}
}