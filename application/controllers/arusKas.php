<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class arusKas extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul']  = ucwords('arus kas');
		$data['menu']   = ucwords('laporan');
        $data['form']   = site_url('arusKas/index');
		$data['tahun']	= $this->modelKu->getYear('jurnal');
		if($this->validasi() == FALSE) {
            $data['bulan']	= short_bulan(date('m'));
            $data['taun']   = date('Y');
        } 
        else {
            $data['bulan']  = $_POST['bulan'];
            $data['taun']   = $_POST['tahun'];
        }
        $data['kas_pendapatan']  = $this->arusKasModel->showKasPendapatan($data['bulan'], $data['taun']);
        $data['kas_beban']       = $this->arusKasModel->showKasBeban($data['bulan'], $data['taun']);
        $data['kas_peralatan']   = $this->arusKasModel->showKasPeralatan($data['bulan'], $data['taun']);
        $data['kas_modal']       = $this->arusKasModel->showKasModal($data['bulan'], $data['taun']);
        $data['kas_prive']       = $this->arusKasModel->showKasPrive($data['bulan'], $data['taun']);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'laporan/arus-kas/index', $data);
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