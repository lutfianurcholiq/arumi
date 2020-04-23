<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produksi extends CI_Controller {

    // public function __construct() {
    //     parent:: __construct();
    //     if (!$this->session->userdata('')) {
    // 	    redirect('welcome/blok');
    // 	} 
    // }

    public function index() {
        $data['judul']   = ucwords('produksi');
		$data['menu']    = ucwords('transaksi');
		$data['hasil']   = $this->produksiModel->show();
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/produksi/index', $data);	
        $this->load->view('template/footer');	
    }
    public function beli() {
        $data['judul']   = ucwords('beli bahan');
		$data['menu']    = ucwords('transaksi');
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/produksi/beli-bahan', $data);	
        $this->load->view('transaksi/produksi/modal-beli', $data);	
        $this->load->view('template/footer');	
    }

}