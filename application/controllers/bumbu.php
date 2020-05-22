<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bumbu extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Karyawan') {
    	    redirect('welcome/blok');
    	} 
    }

    public function validasi() {
        $this->form_validation->set_rules('id_bahan', ucwords('bahan'), 'required');
        $message = ucfirst('data bumbu berhasil disimpan');
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
			$this->bumbuModel->database('detail_rasa', $id);
			redirect('bumbu/create/'.$id);
		}
		else {
            $data['judul']   = ucwords('bumbu');
            $data['menu']    = ucwords('bahan penolong');
            $data['url']     = site_url('bumbu/create/'.$id);
            $data['tabel']   = site_url('rasa');
            $data['bahan']   = $this->bumbuModel->showBahan($id);
            $data['rasa']    = $this->rasaModel->getOne('rasa', $id);
            $data['hasil']   = $this->bumbuModel->show($id);
            $this->load->view('template/header', $data);
            $this->template->load('template/content', 'master/bumbu/index', $data);
            $this->load->view('template/footer');
        }
    }

	public function delete() {
		$id = $this->uri->segment(3);
		$no = $this->uri->segment(4);
		$this->bumbuModel->truncate('detail_rasa', $no);
		$message = ucfirst('bumbu berhasil dihapus');
		flashdata($message);
		redirect('bumbu/create/'.$id);
	}
}