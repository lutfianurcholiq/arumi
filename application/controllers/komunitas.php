<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class komunitas extends CI_Controller {
	
	// public function __construct() {
	// 	parent:: __construct();
	// 	if ($this->session->userdata('level') != 'Karyawan') {
	// 		redirect('welcome/blok');
	// 	} 
	// }
	
	public function index() {
		$data['judul'] = ucwords('komunitas');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('komunitas/create');
		$data['hasil'] = $this->komunitasModel->show('komunitas');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/komunitas/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data komunitas berhasil disimpan');
		}
		else {
			$message = ucfirst('data komunitas berhasil diubah');
		}
		$this->form_validation->set_rules('nama_komunitas', ucwords('nama'), 'required');
		$this->form_validation->set_rules('no_wa', ucwords('no whatsapp'), 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('alamat', ucwords('alamat'), 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			flashdata($message);
			return true;
		}
		else {
			return false;
		}
	}

	public function create() {
		if($this->validasi('save')) {
			$this->komunitasModel->database('komunitas', 'id_komunitas', 'save');
			redirect('komunitas');
		}
		else {
			$data['judul'] = ucwords('form tambah komunitas');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('komunitas/create');
			$data['tabel'] = site_url('komunitas');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/komunitas/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->komunitasModel->database('komunitas', $id, 'edit');
			redirect('komunitas');
		}
		else {
			$data['judul'] = ucwords('form ubah komunitas');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('komunitas/update/'.$id);
			$data['tabel'] = site_url('komunitas');
			$data['hasil'] = $this->komunitasModel->getOne('komunitas', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/komunitas/edit');
			$this->load->view('template/footer');
		}
	}
}