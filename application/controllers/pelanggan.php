<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pelanggan extends CI_Controller {
	
	// public function __construct() {
	// 	parent:: __construct();
	// 	if ($this->session->userdata('level') != 'Karyawan') {
	// 		redirect('welcome/blok');
	// 	} 
	// }
	
	public function index() {
		$data['judul'] = ucwords('pelanggan');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('pelanggan/create');
		$data['hasil'] = $this->pelangganModel->show('pelanggan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pelanggan/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
		$this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required');
		$this->form_validation->set_rules('no_wa', 'No WhatsApp', 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			return true;
		}
		else {
			return false;
		}
	}

	public function create() {
		if($this->validasi()) {
			$this->pelangganModel->save('pelanggan', 'id_pelanggan');
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
		if($this->validasi()) {
			$this->pelangganModel->edit('pelanggan', $id);
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