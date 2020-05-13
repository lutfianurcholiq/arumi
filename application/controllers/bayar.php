<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bayar extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('pelanggan_id')) {
    	    redirect('welcome/blok');
    	} 
    }
    
    public function index() {
        $id_pesanan        = $this->uri->segment(3);
        $data['judul']     = ucwords('pembayaran');
        $data['hasil']     = $this->bayarModel->show($id_pesanan);
        $data['order']     = $this->bayarModel->getOne('pesanan', $id_pesanan);
		$data['list']      = $this->listPesananModel->show();
        $data['pesanan']   = $this->pemesananModel->countPesanan();
        $data['url']       = site_url('pemesanan/add');
        $this->load->view('shop/header', $data);
        $this->template->load('shop/content', 'account-customer/payment', $data);
        $this->load->view('shop/footer');
    }

    public function pay() {
        $id_pesanan  = $this->uri->segment(3);
        $nominal     = $this->uri->segment(4);
        $this->jurnalModel->generateJurnal('111', $id_pesanan, 'Debit', $nominal, 'lutfi');
        $this->jurnalModel->generateJurnal('411', $id_pesanan, 'Kredit', $nominal, 'lutfi');
        $this->bayarModel->finish('pesanan', $id_pesanan, $this->session->userdata('pelanggan_id'));
        redirect('pelangganBeranda');
    }
}