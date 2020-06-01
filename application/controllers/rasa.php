<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class rasa extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Karyawan') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('topping');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('rasa/create');
		$data['hasil'] = $this->rasaModel->show('rasa');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/rasa/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data rasa berhasil disimpan');
		}
		else {
			$message = ucfirst('data rasa berhasil diubah');
		}
		$this->form_validation->set_rules('nama_rasa', ucwords('nama rasa'), 'required');
		$this->form_validation->set_rules('harga_rasa', ucwords('harga'), 'required');
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
			$this->rasaModel->database('rasa', 'id_rasa', 'save');
			redirect('rasa');
		}
		else {
			$data['judul'] = ucwords('form tambah topping');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('rasa/create');
			$data['tabel'] = site_url('rasa');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/rasa/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->rasaModel->database('rasa', $id, 'edit');
			redirect('rasa');
		}
		else {
			$data['judul'] = ucwords('form ubah topping');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('rasa/update/'.$id);
			$data['tabel'] = site_url('rasa');
			$data['hasil'] = $this->rasaModel->getOne('rasa', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/rasa/edit');
			$this->load->view('template/footer');
		}
	}
}