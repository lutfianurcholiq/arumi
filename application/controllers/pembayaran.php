<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pembayaran extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Owner') {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $data['judul']     = ucwords('pembayaran');
		$data['menu']      = ucwords('transaksi');
        $data['hasil']     = $this->pesananModel->showPendingOrder();
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/pembayaran/index', $data);
        $this->load->view('transaksi/pembayaran/modal-cek');	
        $this->load->view('template/footer');	
    }

    public function okay() {
        $id_pesanan  = $this->uri->segment(3);
        $nominal     = $this->uri->segment(4);
        $this->jurnalModel->generateJurnal('111', $id_pesanan, 'Debit', $nominal, 'lutfi');
        $this->jurnalModel->generateJurnal('411', $id_pesanan, 'Kredit', $nominal, 'lutfi');
        $this->pesananModel->yes('pesanan', $id_pesanan);
        $message = ucfirst('pesanan di ACC');
        flashdata($message);
        redirect('pembayaran');	 
    }

    public function reject() {
        $id_pesanan  = $this->uri->segment(3);
        $this->pesananModel->no('pesanan', $id_pesanan);
        $message = ucfirst('pesanan ditolak');
        flashdata($message);
        redirect('pembayaran');	 
    }
}