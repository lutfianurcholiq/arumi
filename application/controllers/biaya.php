<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class biaya extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('biaya');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('biaya/create');
		$data['hasil'] = $this->biayaModel->show();
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/biaya/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$message = ucfirst('data biaya berhasil disimpan');
		}
		else {
			$message = ucfirst('data biaya berhasil diubah');
		}
		$this->form_validation->set_rules('nama_biaya', ucwords('biaya'), 'required');
		$this->form_validation->set_rules('kode_coa', ucwords('coa'), 'required');
		$this->form_validation->set_rules('keterangan', ucwords('keterangan'), 'required');
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
			$this->biayaModel->database('biaya', 'id_biaya', 'save');
			redirect('biaya');
		}
		else {
			$data['judul'] = ucwords('form tambah biaya');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('biaya/create');
            $data['tabel'] = site_url('biaya');
            $data['coa']   = $this->biayaModel->showCoa();
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/biaya/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$this->biayaModel->database('biaya', $id, 'edit');
			redirect('biaya');
		}
		else {
			$data['judul'] = ucwords('form ubah biaya');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('biaya/update/'.$id);
			$data['tabel'] = site_url('biaya');
            $data['coa']   = $this->biayaModel->showCoa();
			$data['hasil'] = $this->biayaModel->getOne($id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/biaya/edit');
			$this->load->view('template/footer');
		}
	}
}