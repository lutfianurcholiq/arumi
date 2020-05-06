<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modal extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('modal');
		$data['menu']  = ucwords('transaksi');
		$data['form']  = site_url('modal/create');
		$data['hasil'] = $this->modalModel->show('modal');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/modal/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
        $message = ucfirst('modal berhasil disimpan');
		$this->form_validation->set_rules('nominal', ucwords('nominal'), 'required');
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
            $id_modal    = $this->modelKu->uuid('modal', 'id_modal');
            $nominal     = str_replace(".", "", $_POST['nominal']);
            $this->modalModel->database('modal', $id_modal);
            $this->jurnalModel->generateJurnal('111', $id_modal, 'Debit', $nominal, 'rina');
            $this->jurnalModel->generateJurnal('311', $id_modal, 'Kredit', $nominal, 'rina');
			redirect('modal');
		}
		else {
			$data['judul'] = ucwords('setor modal');
			$data['menu']  = ucwords('transaksi');
			$data['url']   = site_url('modal/create');
			$data['tabel'] = site_url('modal');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/modal/add');
			$this->load->view('template/footer');
		}
	}
}