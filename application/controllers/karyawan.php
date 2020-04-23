<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class karyawan extends CI_Controller {
	
	// public function __construct() {
	// 	parent:: __construct();
	// 	if ($this->session->userdata('level') != 'Karyawan') {
	// 		redirect('welcome/blok');
	// 	} 
	// }
	
	public function index() {
		$data['judul'] = ucwords('karyawan');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('karyawan/create');
		$data['hasil'] = $this->karyawanModel->show('karyawan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/karyawan/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data karyawan berhasil disimpan');
		}
		else {
			$message = ucfirst('data karyawan berhasil diubah');
		}
		$this->form_validation->set_rules('nama_karyawan', ucwords('nama'), 'required');
		$this->form_validation->set_rules('no_wa', ucwords('no whatsapp'), 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('alamat', ucwords('alamat'), 'required');
		$this->form_validation->set_rules('gaji', ucwords('gaji'), 'required');
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
			$this->karyawanModel->database('karyawan', 'id_karyawan', 'save');
			redirect('karyawan');
		}
		else {
			$data['judul'] = ucwords('form tambah karyawan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('karyawan/create');
			$data['tabel'] = site_url('karyawan');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/karyawan/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->karyawanModel->database('karyawan', $id, 'edit');
			redirect('karyawan');
		}
		else {
			$data['judul'] = ucwords('form ubah karyawan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('karyawan/update/'.$id);
			$data['tabel'] = site_url('karyawan');
			$data['hasil'] = $this->karyawanModel->getOne('karyawan', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/karyawan/edit');
			$this->load->view('template/footer');
		}
	}
}