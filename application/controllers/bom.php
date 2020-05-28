<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bom extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Produksi') {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $data['judul']   = ucwords('produk');
		$data['menu']    = ucwords('bill of Material');
		$data['hasil']   = $this->produkModel->show('produk');
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'bom/index', $data);
        $this->load->view('template/footer');	
    }

    public function validasi($action) {
		if ($action == 'save') {
            $this->form_validation->set_rules('id_bahan', ucwords('bahan'), 'required');
			$message = ucfirst('data bahan baku berhasil disimpan');
		}
		else {
			$message = ucfirst('data bahan baku berhasil diubah');
		}
		$this->form_validation->set_rules('jumlah', ucwords('jumlah'), 'required');
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
        $id_produk = $this->uri->segment(3);
		if($this->validasi('save')) {
			$this->bomModel->database('detail_bb', $id_produk, 'no_id_bahan');
			redirect('bom/create/'.$id_produk);
		}
		else {
            $data['judul']   = ucwords('bahan baku');
            $data['menu']    = ucwords('bill of Material');
            $data['url']     = site_url('bom/create/'.$id_produk);
            $data['tabel']   = site_url('bom');
            $data['bahan']   = $this->bomModel->showBahan($id_produk);
            $data['produk']  = $this->produkModel->getOne('produk', $id_produk);
            $data['hasil']   = $this->bomModel->show($id_produk);
            $this->load->view('template/header', $data);
            $this->template->load('template/content', 'bom/bahan-baku', $data);
            $this->load->view('template/footer');
        }
    }

    public function update() {
		$id_produk = $this->uri->segment(3);
		$no 	   = $this->uri->segment(4);
		if($this->validasi('edit')) {
			$this->bomModel->database('detail_bb', $id_produk, $no);
			redirect('bom/create/'.$id_produk);
		}
		else {
			$data['judul']  = ucwords('bahan baku');
			$data['menu']   = ucwords('transaksi');
			$data['url']    = site_url('bom/update/'.$id_produk.'/'.$no);
			$data['tabel']  = site_url('bom/create/'.$id_produk);
			$data['hasil']  = $this->bomModel->getOne($no);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'bom/form-edit', $data);	
			$this->load->view('template/footer');	
		}
	}

	public function delete() {
		$id_produk = $this->uri->segment(3);
		$no = $this->uri->segment(4);
		$this->bomModel->truncate('detail_bb', $no);
		$message = ucfirst('bahan baku berhasil dihapus');
		flashdata($message);
		redirect('bom/create/'.$id_produk);
	}

	public function info() {
        $id_produk_produk 		 = $this->uri->segment(3);
        $data['judul']   = ucwords('produk');
		$data['menu']    = ucwords('bill of Material');
		$data['tabel']   = site_url('bom');
		$data['produk']  = $this->produkModel->getOne('produk', $id_produk_produk);
		$data['hasil']   = $this->bomModel->show($id_produk_produk);
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'bom/detail', $data);
        $this->load->view('template/footer');	
    }
}