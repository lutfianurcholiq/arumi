<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addOperasional extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != "Owner") {
			redirect('welcome/blok');
		} 
    }

	public function index() {
		$data['judul'] = ucwords('operasional');
		$data['menu']  = ucwords('transaksi');
		$data['icon']  = "fa fa-shopping-cart";
		$data['form']  = site_url('addOperasional/create');
		$data['hasil'] = $this->addOperasionalModel->show('operasional');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/addOperasional/index', $data);
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
			$this->addOperasionalModel->database('operasional', 'id_operasional');
			redirect('addOperasional');
		}
		else {
			$data['judul']   = ucwords('operasional');
			$data['menu']    = ucwords('transaksi');
			$data['icon']    = "fa fa-shopping-cart";
			$data['url']     = site_url('addOperasional/create');
			$data['tabel']   = site_url('addOperasional');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/addOperasional/add');
			$this->load->view('template/footer');
		}
	}
}