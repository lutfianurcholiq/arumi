<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pesananLutfi extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Karyawan') {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $data['judul']   = ucwords('pesanan');
		$data['menu']    = ucwords('transaksi');
		$data['hasil']   = $this->pesananModel->show();
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/pesanan/index-lutfi', $data);
        $this->load->view('template/footer');	
    }

    public function timeline() {
        $id_pesanan      = $this->uri->segment(3);
        $data['judul']   = ucwords('timeline');
        $data['menu']    = ucwords('pesanan');
        $data['tabel']   = site_url('pesananLutfi');
		$data['pesanan'] = $this->pesananModel->getPesanan($id_pesanan);
		$data['hasil']   = $this->pesananModel->showTimeline('timeline', $id_pesanan);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/pesanan/timeline', $data);
        $this->load->view('template/footer');	
    }

    public function info() {
        $id_pesanan     = $this->uri->segment(3);
		$data['judul']  = ucwords('detail pesanan');
		$data['menu']   = ucwords('transaksi');
		$data['icon']   = "fa fa-shopping-cart";
		$data['tabel']  = site_url('pesananLutfi');
		$data['hasil']  = $this->pesananModel->getDetail($id_pesanan);
		$data['detail'] = $this->pesananModel->getOne('pesanan', $id_pesanan);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/pesanan/detail', $data);
		$this->load->view('template/footer');
    }
}