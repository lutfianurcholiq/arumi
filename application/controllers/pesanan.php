<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pesanan extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Produksi') {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $data['judul']   = ucwords('pesanan');
		$data['menu']    = ucwords('transaksi');
		$data['new']     = $this->pesananModel->showNewOrder();
		$data['work']    = $this->pesananModel->showWorkingOrder();
		$data['finish']  = $this->pesananModel->showFinishOrder();
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/pesanan/index', $data);
		$this->load->view('transaksi/pesanan/modal-option');	
		$this->load->view('transaksi/pesanan/modal-komunitas');	
        $this->load->view('template/footer');	
    }

    public function validasi($action) {
        if ($action == 'own') {
            $message = ucfirst('jadwal produksi berhasil disimpan');
            $this->form_validation->set_rules('mulai_produksi', ucwords('tanggal'), 'required');
		}
		else {
            $message = ucfirst('pesanan berhasil dikirim ke komunitas');
            $this->form_validation->set_rules('komunitas_id', ucwords('komunitas'), 'required');
		}
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			flashdata($message);
			return true;
		}
		else {
			return false;
		}
	}

    public function own() {
        $id = $this->uri->segment(3);
        if($this->validasi('own')) {
			$this->pesananModel->database('produksi', 'id_produksi', $id, 'own');
			redirect('produksi');
		}
		else {
            $data['judul']    = ucwords('detail pesanan');
            $data['menu']     = ucwords('transaksi');
            $data['pesanan']  = $this->pesananModel->showPesanan($id);
            $data['hasil']    = $this->pesananModel->showDetail($id);
            $data['bom']      = $this->bomModel->showBom($id);
            $data['url']      = site_url('pesanan/own/'.$id);    
            $data['tabel']    = site_url('pesanan');    
            $this->load->view('template/header', $data);
            $this->template->load('template/content', 'transaksi/pesanan/own', $data);
            $this->load->view('template/footer');
        }
    }

    public function throwing() {
        $id = $this->uri->segment(3);
        if($this->validasi('throwing')) {
            $id          = $_POST['pesanan_id']; 
            $nominal1    = $_POST['nominal1'];
            $nominal2    = $_POST['nominal2'];
			$this->pesananModel->database('produksi', 'id_produksi', $id, 'throw');
            # jurnal lempar produksi ke komunitas
            $this->jurnalModel->generateJurnal('111', $id, 'Debit', $nominal1, 'adel');
            $this->jurnalModel->generateJurnal('411', $id, 'Kredit', $nominal1, 'adel');

            $this->jurnalModel->generateJurnal('519', $id, 'Debit', $nominal2, 'adel');
            $this->jurnalModel->generateJurnal('111', $id, 'Kredit', $nominal2, 'adel');
			redirect('pesanan');
		}
		else {
            $data['judul']      = ucwords('detail pesanan');
            $data['menu']       = ucwords('transaksi');
            $data['pesanan']    = $this->pesananModel->showPesanan($id);
            $data['hasil']      = $this->pesananModel->showDetail($id);
            $data['total']      = $this->pesananModel->getTotal('detail_pesanan', $id);
            $data['bom']        = $this->bomModel->showBom($id);
            $data['komunitas']  = $this->komunitasModel->show('komunitas');
            $data['url']        = site_url('pesanan/throwing/'.$id);    
            $data['tabel']      = site_url('pesanan');    
            $this->load->view('template/header', $data);
            $this->template->load('template/content', 'transaksi/pesanan/throwing', $data);
            $this->load->view('template/footer');
        }
    }

    public function receive() {
        $id_pesanan = $this->uri->segment(3);
        $this->pesananModel->done($id_pesanan);
        redirect('pesanan');
    }

    public function info() { # detail pesanan yang diolah sendiri
        $id_pesanan = $this->uri->segment(3);
        $data['judul']  = ucwords('detail pesanan');
		$data['menu']   = ucwords('pesanan');
		$data['tabel']  = site_url('pesanan');
		$data['info']   = $this->pesananModel->getPesanan($id_pesanan);
		$data['hasil']  = $this->pesananModel->getDetail($id_pesanan);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/pesanan/detail', $data);	
        $this->load->view('template/footer');
    }

    public function infoKomunitas() { # detail pesanan yang ditawarkan ke komunitas
        $id_pesanan = $this->uri->segment(3);
        $data['judul']  = ucwords('detail pesanan');
		$data['menu']   = ucwords('pesanan');
		$data['tabel']  = site_url('pesanan');
		$data['info']   = $this->pesananModel->getKomunitas($id_pesanan);
		$data['hasil']  = $this->pesananModel->getDetail($id_pesanan);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/pesanan/detail-komunitas', $data);	
        $this->load->view('template/footer');
    }

}