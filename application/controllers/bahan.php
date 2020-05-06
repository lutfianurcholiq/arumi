<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bahan extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Produksi') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('bahan');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('bahan/create');
		$data['hasil'] = $this->bahanModel->show('bahan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/bahan/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data bahan berhasil disimpan');
		}
		else {
			$message = ucfirst('data bahan berhasil diubah');
		}
		$this->form_validation->set_rules('nama_bahan', ucwords('nama bahan'), 'required');
		$this->form_validation->set_rules('satuan', ucwords('satuan'), 'required');
		$this->form_validation->set_rules('keterangan', ucwords('keterangan'), 'required');
		$this->form_validation->set_rules('harga', ucwords('harga'), 'required');
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
			$this->bahanModel->database('bahan', 'id_bahan', 'save');
			redirect('bahan');
		}
		else {
			$data['judul'] = ucwords('form tambah bahan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('bahan/create');
			$data['tabel'] = site_url('bahan');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bahan/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->bahanModel->database('bahan', $id, 'edit');
			redirect('bahan');
		}
		else {
			$data['judul'] = ucwords('form ubah bahan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('bahan/update/'.$id);
			$data['tabel'] = site_url('bahan');
			$data['hasil'] = $this->bahanModel->getOne('bahan', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bahan/edit');
			$this->load->view('template/footer');
		}
	}
}