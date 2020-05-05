<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pemesanan extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('pelanggan_id')) {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $id_produk         = $this->uri->segment(3);
        $data['judul']     = ucwords('pemesanan');
        $data['hasil']     = $this->produkModel->getOne('produk', $id_produk);
		$data['list']      = $this->listPesananModel->show();
        $data['pesanan']   = $this->pemesananModel->countPesanan();
        $data['url']       = site_url('pemesanan/add');
        $this->load->view('shop/header', $data);
        $this->template->load('shop/content', 'account-customer/form-detail', $data);
        $this->load->view('shop/footer');	
    }
    
    public function add() {
        $this->pemesananModel->database('detail_pesanan', 'save');
		redirect('pelangganBeranda');
    }

    public function see() {
        $id_produk         = $this->uri->segment(3);
        $data['judul']     = ucwords('lihat pemesanan');
        $data['hasil']     = $this->pemesananModel->getOne($id_produk);
		$data['list']      = $this->listPesananModel->show();
        $data['pesanan']   = $this->pemesananModel->countPesanan();
        $data['url']       = site_url('pemesanan/update');
        $this->load->view('shop/header', $data);
        $this->template->load('shop/content', 'account-customer/form-update', $data);
        $this->load->view('shop/footer');	 
    }

    public function update() {
        $this->pemesananModel->database('detail_pesanan', 'edit');
		redirect('pelangganBeranda');
    }

    public function remove() {
        $this->pemesananModel->delete($this->uri->segment(3), $this->uri->segment(4));
		redirect('pelangganBeranda');
    }

    public function checkout() {
        $id_pesanan  = $this->modelKu->uuid('pesanan', 'id_pesanan');
        $nominal     = $this->uri->segment(3);
        $this->jurnalModel->generateJurnal('111', $id_pesanan, 'Debit', $nominal, 'lutfi');
        $this->jurnalModel->generateJurnal('411', $id_pesanan, 'Kredit', $nominal, 'lutfi');
        $this->pemesananModel->finish('pesanan', $id_pesanan, $this->uri->segment(3), $this->session->userdata('pelanggan_id'));
		redirect('pelangganBeranda');
    }
}