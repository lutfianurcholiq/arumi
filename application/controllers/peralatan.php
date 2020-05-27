<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class peralatan extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('peralatan');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('peralatan/create');
		$data['hasil'] = $this->peralatanModel->show('peralatan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/peralatan/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data peralatan berhasil disimpan');
		}
		else {
			$message = ucfirst('data peralatan berhasil diubah');
		}
		$this->form_validation->set_rules('nama_peralatan', ucwords('nama'), 'required');
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
			$this->peralatanModel->database('peralatan', 'id_peralatan', 'save');
			redirect('peralatan');
		}
		else {
			$data['judul'] = ucwords('form tambah peralatan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('peralatan/create');
			$data['tabel'] = site_url('peralatan');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/peralatan/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->peralatanModel->database('peralatan', $id, 'edit');
			redirect('peralatan');
		}
		else {
			$data['judul'] = ucwords('form ubah peralatan');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('peralatan/update/'.$id);
			$data['tabel'] = site_url('peralatan');
			$data['hasil'] = $this->peralatanModel->getOne('peralatan', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/peralatan/edit');
			$this->load->view('template/footer');
		}
	}
}