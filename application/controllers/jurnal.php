<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class jurnal extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner' AND $this->session->userdata('level') != 'Produksi') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul']  =   ucwords('jurnal umum');
		$data['menu']   =   ucwords('laporan');
        $data['form']   =   site_url('jurnal/index');
		if($this->validasi() == FALSE) {
            $data['awal']   = date('Y-m-d');
            $data['akhir']  = date('Y-m-d');
        } 
        else {
            $data['awal']   = $_POST['tanggal_awal'];
            $data['akhir']  = $_POST['tanggal_akhir'];
        }
		$data['hasil']  = $this->jurnalModel->show($data['awal'], $data['akhir']);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'laporan/jurnal/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
		$this->form_validation->set_rules('tanggal_awal', ucwords('tanggal awal'), 'required');
		$this->form_validation->set_rules('tanggal_akhir', ucwords('tanggal akhir'), 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			return true;
		}
		else {
			return false;
		}
	}

}