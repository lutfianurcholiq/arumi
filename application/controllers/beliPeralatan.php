<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class beliPeralatan extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != "Owner") {
			redirect('welcome/blok');
		} 
    }

	public function index() {
		$data['judul'] = ucwords('peralatan');
		$data['menu']  = ucwords('transaksi');
		$data['form']  = site_url('beliPeralatan/create');
		$data['hasil'] = $this->beliPeralatanModel->show('transaksi_peralatan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/beliPeralatan/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
		$message = ucfirst('daftar operasional berhasil dibuat');
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
		if($this->validasi()) {
			$this->beliPeralatanModel->database('transaksi_peralatan', 'id');
			redirect('beliPeralatan');
		}
		else {
			$data['judul']   = ucwords('peralatan');
			$data['menu']    = ucwords('transaksi');
			$data['url']     = site_url('beliPeralatan/create');
			$data['tabel']   = site_url('beliPeralatan');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/beliPeralatan/add');
			$this->load->view('template/footer');
		}
	}

	public function info() {
		$id = $this->uri->segment(3);
		$data['judul']  = ucwords('detail peralatan');
		$data['menu']   = ucwords('transaksi');
		$data['tabel']  = site_url('beliPeralatan');
		$data['hasil']  = $this->beliPeralatanModel->getDetail($id);
		$data['detail'] = $this->beliPeralatanModel->getOne('transaksi_peralatan', $id);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/beliPeralatan/detail', $data);
		$this->load->view('template/footer');	
	}
}