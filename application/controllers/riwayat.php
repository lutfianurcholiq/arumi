<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class riwayat extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('pelanggan_id')) {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $data['judul']      = ucwords('riwayat pesanan');
		$data['hasil']      = $this->pemesananModel->showPesanan('pesanan');
		$data['pesanan']    = $this->pemesananModel->countPesanan();
		$data['list']       = $this->listPesananModel->show();
		$this->load->view('shop/header', $data);
		$this->template->load('shop/content', 'account-customer/history', $data);
        $this->load->view('shop/footer');	
    }    
}