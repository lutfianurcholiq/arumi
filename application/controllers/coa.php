<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class coa extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner' AND $this->session->userdata('level') != 'Produksi' AND $this->session->userdata('level') != 'Karyawan') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('coa');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('coa/create');
		$data['hasil'] = $this->coaModel->show('coa');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/coa/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$this->form_validation->set_rules('kode_coa', ucwords('kode coa'), 'required|is_unique[coa.kode_coa]');
			$message = ucfirst('data coa berhasil disimpan');
		}
		else {
			$message = ucfirst('data coa berhasil diubah');
		}
		$this->form_validation->set_rules('nama_coa', ucwords('nama coa'), 'required');
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
			$this->coaModel->database('coa', 'id_coa', 'save');
			redirect('coa');
		}
		else {
			$data['judul'] = ucwords('form tambah coa');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('coa/create');
			$data['tabel'] = site_url('coa');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/coa/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->coaModel->database('coa', $id, 'edit');
			redirect('coa');
		}
		else {
			$data['judul'] = ucwords('form ubah coa');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('coa/update/'.$id);
			$data['tabel'] = site_url('coa');
			$data['hasil'] = $this->coaModel->getOne('coa', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/coa/edit');
			$this->load->view('template/footer');
		}
	}
}