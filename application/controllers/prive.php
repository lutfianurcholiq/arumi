<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class prive extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('prive');
		$data['menu']  = ucwords('transaksi');
		$data['form']  = site_url('prive/create');
		$data['hasil'] = $this->priveModel->show('prive');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/prive/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
        $message = ucfirst('prive berhasil disimpan');
		$this->form_validation->set_rules('nominal', ucwords('nominal'), 'required|callback_cek_nominal1');
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
            $id_prive    = $this->modelKu->uuid('prive', 'id_prive');
            $nominal     = str_replace(".", "", $_POST['nominal']);
            $this->priveModel->database('prive', $id_prive);
            $this->jurnalModel->generateJurnal('312', $id_prive, 'Debit', $nominal, 'rina');
            $this->jurnalModel->generateJurnal('111', $id_prive, 'Kredit', $nominal, 'rina');
			redirect('prive');
		}
		else {
			$data['judul'] = ucwords('setor prive');
			$data['menu']  = ucwords('transaksi');
			$data['url']   = site_url('prive/create');
            $data['tabel'] = site_url('prive');
		    $data['kas']   = $this->priveModel->getKas();
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/prive/add');
			$this->load->view('template/footer');
		}
    }
    public function cek_nominal1() { 
		// $simpan = str_replace(".","", $_POST['tarif']);

		if ($_POST['nominal'] > $_POST['kas']) {
		 	$this->form_validation->set_message('cek_nominal1', ucfirst('penarikan melebihi jumlah kas bulan ini'));
		 	return FALSE;
		}
		else {
			return TRUE;
		}
	}
}