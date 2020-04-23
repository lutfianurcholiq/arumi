<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bom extends CI_Controller {

    // public function __construct() {
    //     parent:: __construct();
    //     if (!$this->session->userdata('')) {
    // 	    redirect('welcome/blok');
    // 	} 
    // }

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
			$message = ucfirst('data bahan baku berhasil disimpan');
		}
		else {
			$message = ucfirst('data bahan baku berhasil diubah');
		}
		$this->form_validation->set_rules('id_bahan', ucwords('bahan'), 'required');
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

    public function addBahanBaku() {
        $id = $this->uri->segment(3);
		if($this->validasi('save')) {
			$this->bomModel->database('detail_bb', $id, 'no_id_bahan');
			redirect('bom/addBahanBaku/'.$id);
		}
		else {
            $data['judul']   = ucwords('bahan baku');
            $data['menu']    = ucwords('bill of Material');
            $data['url']     = site_url('bom/addBahanBaku/'.$id);
            $data['tabel']   = site_url('bom');
            $data['bahan']   = $this->bomModel->showBahan($id);
            $data['produk']  = $this->produkModel->getOne('produk', $id);
            $data['hasil']   = $this->bomModel->show($id);
            $this->load->view('template/header', $data);
            $this->template->load('template/content', 'bom/bahan-baku', $data);
            $this->load->view('template/footer');
        }
    }
}