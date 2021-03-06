<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class buku extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner' AND $this->session->userdata('level') != 'Produksi' AND $this->session->userdata('level') != 'Karyawan') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul']  = ucwords('buku besar');
		$data['menu']   = ucwords('laporan');
        $data['url']    = site_url('buku/index');
		$data['coa']	= $this->coaModel->show('coa');
		$data['tahun']	= $this->modelKu->getYear('jurnal');
		if($this->validasi() == FALSE) {
            $data['kode']	= '111';
            $data['bulan']	= short_bulan(date('m'));
            $data['year']   = date('Y');
        } 
        else {
            $data['kode']   = $_POST['coa'];
            $data['bulan']  = $_POST['bulan'];
            $data['year']   = $_POST['tahun'];
		}
		$data['saldo']	= $this->bukuModel->getSaldoAwal($data['kode'], $data['bulan'], $data['year']);
        $data['hasil']  = $this->bukuModel->show($data['kode'], $data['bulan'], $data['year']);
        $data['akun']   = $this->bukuModel->getOne($data['kode'], 'coa');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'laporan/buku/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi() {
		$this->form_validation->set_rules('coa', ucwords('coa'), 'required');
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