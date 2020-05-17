<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class biayaProduksi extends CI_Controller { 

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Produksi') {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
		$data['judul']  = ucwords('biaya produksi');
		$data['menu']   = ucwords('laporan');
        $data['url']    = site_url('biayaProduksi/index');
		$data['tahun']	= $this->modelKu->getYear('jurnal');
		if($this->validasi() == FALSE) {
            $data['bulan']	= short_bulan(date('m'));
            $data['taun']   = date('Y');
        } 
        else {
            $data['bulan']  = $_POST['bulan'];
            $data['taun']   = $_POST['tahun'];
        }
        $data['hasil']  = $this->biayaProduksiModel->show($data['bulan'], $data['taun']);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'laporan/biaya/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
		$this->form_validation->set_rules('bulan', ucwords('bulan'), 'required');
		$this->form_validation->set_rules('tahun', ucwords('tahun'), 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			return true;
		}
		else {
			return false;
		}
	}
}