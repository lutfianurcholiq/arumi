<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class labaRugi extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul']  = ucwords('laba rugi');
		$data['menu']   = ucwords('laporan');
        $data['form']   = site_url('labaRugi/index');
		$data['tahun']	= $this->modelKu->getYear('jurnal');
		if($this->validasi() == FALSE) {
            $data['bulan']	= short_bulan(date('m'));
            $data['taun']   = date('Y');
        } 
        else {
            $data['bulan']  = $_POST['bulan'];
            $data['taun']   = $_POST['tahun'];
        }
        $data['pendapatan']  = $this->labaRugiModel->showPendapatan($data['bulan'], $data['taun']);
        $data['beban']       = $this->labaRugiModel->showBeban($data['bulan'], $data['taun']);
        $data['hpp']         = $this->labaRugiModel->showHpp($data['bulan'], $data['taun']);
        $data['lain']        = $this->labaRugiModel->showPendapatanLainLain($data['bulan'], $data['taun']);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'laporan/laba-rugi/index', $data);
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