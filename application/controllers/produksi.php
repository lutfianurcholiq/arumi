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

    public function validasi($action) {
        if ($action == 'btkl') {
            $this->form_validation->set_rules('id_karyawan', ucwords('karyawan'), 'required');
            $this->form_validation->set_rules('jumlah', ucwords('jumlah hari'), 'required');
		}
		else {
            $this->form_validation->set_rules('id_bahan', ucwords('bahan'), 'required');
            $this->form_validation->set_rules('jumlah', ucwords('kebutuhan'), 'required');
		}
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			// flashdata($message);
			return true;
		}
		else {
			return false;
		}
	}

    public function bbb() {
        $id_produksi = $this->uri->segment(3);
        $data['judul']      = ucwords('beli bahan');
		$data['menu']       = ucwords('transaksi');
        $data['produk']     = $this->produksiModel->showProduk($id_produksi);
		$data['produksi']   = $this->produksiModel->getOne('produksi', $id_produksi);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/produksi/beli-bahan', $data);	
        $this->load->view('transaksi/produksi/modal-beli', $data);	
        $this->load->view('template/footer');	
    }

    public function stepOne() {
        $id_produksi = $this->uri->segment(3); 
        $nominal     = $this->uri->segment(4);
        $this->produksiModel->chanceStatus($id_produksi, 'bbb');
        $this->jurnalModel->generateJurnal('113', $id_produksi, 'Debit', $nominal);
        $this->jurnalModel->generateJurnal('111', $id_produksi, 'Kredit', $nominal);
        redirect('produksi/btkl/'.$id_produksi);
    }

    public function btkl() {
        $id_produksi = $this->uri->segment(3);
        if($this->validasi('btkl')) {
			$this->produksiModel->selectPeople('detail_btkl', 'insert', $id_produksi);
			redirect('produksi/btkl/'.$id_produksi);
		}
        $data['judul']     = ucwords('pilih karyawan');
        $data['menu']      = ucwords('transaksi');
        $data['url']       = site_url('produksi/btkl/'.$id_produksi);
        $data['tabel']     = site_url('produksi');
        $data['hasil']     = $this->produksiModel->showBtkl($id_produksi);
        $data['karyawan']  = $this->produksiModel->showKaryawan($id_produksi);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/produksi/pilih-karyawan', $data);	
        $this->load->view('transaksi/produksi/modal-btkl', $data);	
        $this->load->view('template/footer');
    }

    public function deleteBtkl() {
        $id_produksi = $this->uri->segment(3);
        $no          = $this->uri->segment(4);
		$this->produksiModel->truncateBtkl('detail_btkl', $no);
		redirect('produksi/btkl/'.$id_produksi);
    }

    public function stepTwo() {
        $id_produksi = $this->uri->segment(3); 
        $nominal     = $this->uri->segment(4);
        $this->produksiModel->chanceStatus($id_produksi, 'btkl');
        $this->jurnalModel->generateJurnal('531', $id_produksi, 'Debit', $nominal);
        $this->jurnalModel->generateJurnal('515', $id_produksi, 'Kredit', $nominal);
        redirect('produksi/bop/'.$id_produksi);
    }

    public function bop() {
        $id_produksi = $this->uri->segment(3);
        if($this->validasi('bop')) {
			$this->produksiModel->selectBahan('detail_bop', 'insert', $id_produksi);
			redirect('produksi/bop/'.$id_produksi);
		}
        $data['judul'] = ucwords('biaya overhead pabrik');
        $data['menu']  = ucwords('transaksi');
        $data['url']   = site_url('produksi/bop/'.$id_produksi);
        $data['tabel'] = site_url('produksi');
        $data['hasil'] = $this->produksiModel->showBop($id_produksi);
        $data['bahan'] = $this->produksiModel->showBahan($id_produksi);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'transaksi/produksi/pilih-bahan', $data);	
        $this->load->view('transaksi/produksi/modal-bop', $data);	
        $this->load->view('template/footer');
    }

    public function deleteBop() {
        $id_produksi = $this->uri->segment(3);
        $no          = $this->uri->segment(4);
		$this->produksiModel->truncateBop('detail_bop', $no);
		redirect('produksi/bop/'.$id_produksi);
    }

    public function stepThree() {
        $id_produksi = $this->uri->segment(3); 
        $nominal     = $this->uri->segment(4);
        $this->produksiModel->chanceStatus($id_produksi, 'bop');
        $this->jurnalModel->generateJurnal('532', $id_produksi, 'Debit', $nominal);
        $this->jurnalModel->generateJurnal('51', $id_produksi, 'Kredit', $nominal);
        redirect('produksi');
    }
}