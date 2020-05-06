<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pelanggan extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Karyawan') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('pelanggan');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('pelanggan/create');
		$data['hasil'] = $this->pelangganModel->show('pelanggan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pelanggan/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data pelanggan berhasil disimpan');
		}
		else {
			$message = ucfirst('data pelanggan berhasil diubah');
		}
		$this->form_validation->set_rules('nama_pelanggan', ucwords('nama'), 'required');
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
			$this->pelangganModel->database('pelanggan', 'id_pelanggan', 'save');
			redirect('pelanggan');
		}
		else {
			$data['judul'] = ucwords('form tambah pelanggan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('pelanggan/create');
			$data['tabel'] = site_url('pelanggan');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/pelanggan/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->pelangganModel->database('pelanggan', $id, 'edit');
			redirect('pelanggan');
		}
		else {
			$data['judul'] = ucwords('form ubah pelanggan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('pelanggan/update/'.$id);
			$data['tabel'] = site_url('pelanggan');
			$data['hasil'] = $this->pelangganModel->getOne('pelanggan', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/pelanggan/edit');
			$this->load->view('template/footer');
		}
	}
}