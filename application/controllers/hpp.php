<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class hpp extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Owner') {
			redirect('welcome/blok');
		} 
    }

    public function index() {
        $data['judul'] = ucwords('harga pokok penjualan');
		$data['menu']  = ucwords('transaksi');
		$data['form']  = site_url('hpp/create');
		$data['hasil'] = $this->hppModel->show();
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/hpp/index', $data);
		$this->load->view('template/footer');	
    }

    public function validasi() {
        $message = ucfirst('harga pokok penjualan berhasil disimpan');
		
		$this->form_validation->set_rules('nominal', ucwords('nominal'), 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			flashdata($message);
			return true;
		}
		else {
			return false;
		}
	}

	public function create() {
        $id_pesanan = $this->uri->segment(3);
		if($this->validasi()) {
            $id_produksi = $_POST['id_produksi'];
            $nominal     = $_POST['nominal'];
            $this->hppModel->database('produksi', $id_produksi);
            #jurnal hpp
            $this->jurnalModel->generateJurnal('501', $id_produksi, 'Debit', $nominal, 'rina');
            $this->jurnalModel->generateJurnal('102', $id_produksi, 'Kredit', $nominal, 'rina');
			redirect('hpp');
		}
		else {
			$data['judul'] = ucwords('form tambah hpp');
			$data['menu']  = ucwords('transaksi');
			$data['url']   = site_url('hpp/create/'.$id_pesanan);
            $data['tabel'] = site_url('hpp');
		    $data['hasil'] = $this->hppModel->getOne('produksi', $id_pesanan);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/hpp/add');
			$this->load->view('template/footer');
		}
	}
}