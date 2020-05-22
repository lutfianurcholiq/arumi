<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addRasa extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Karyawan') {
    	    redirect('welcome/blok');
    	} 
    }

    public function validasi() {
        $this->form_validation->set_rules('id_rasa', ucwords('rasa'), 'required');
        $message = ucfirst('data berhasil disimpan');
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
        $id = $this->uri->segment(3);
		if($this->validasi()) {
			$this->addRasaModel->database('produk_rasa', $id);
			redirect('addRasa/create/'.$id);
		}
		else {
            $data['judul']   = ucwords('rasa');
            $data['menu']    = ucwords('master data');
            $data['url']     = site_url('addRasa/create/'.$id);
            $data['tabel']   = site_url('produk');
            $data['rasa']    = $this->addRasaModel->showRasa($id);
            $data['produk']  = $this->produkModel->getOne('produk', $id);
            $data['hasil']   = $this->addRasaModel->show($id);
            $this->load->view('template/header', $data);
            $this->template->load('template/content', 'master/addRasa/index', $data);
            $this->load->view('template/footer');
        }
    }

	public function delete() {
		$id = $this->uri->segment(3);
		$no = $this->uri->segment(4);
		$this->addRasaModel->truncate('produk_rasa', $no);
		$message = ucfirst('data berhasil dihapus');
		flashdata($message);
		redirect('addRasa/create/'.$id);
	}
}