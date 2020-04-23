<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class landing extends CI_Controller {

    public function index() {
        $data['judul'] = ucwords('selamat datang');
		$this->load->view('shop/header', $data);
		$this->load->view('home');
		$this->load->view('shop/footer');	
    }

    public function validasi() {
		$this->form_validation->set_rules('nama_pelanggan', ucwords('nama'), 'required');
		$this->form_validation->set_rules('no_wa', ucwords('no whatsapp'), 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('alamat', ucwords('alamat'), 'required');
		$this->form_validation->set_rules('username', ucwords('username'), 'required|is_unique[pelanggan.username]');
		$this->form_validation->set_rules('password', ucwords('password'), 'required|min_length[4]');
		$this->form_validation->set_rules('repassword', ucwords('repassword'), 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<b class="text-danger">', '</b>');

		if($this->form_validation->run()) {
			return true;
		}
		else {
			return false;
		}
	}

    public function register() {
        if($this->validasi()) {
			$this->pelangganModel->database('pelanggan', 'id_pelanggan', 'save');
			redirect('landing');
		}
		else {
            $data['judul'] = ucwords('selamat datang');
            $data['url']   = site_url('landing/register');
            $this->load->view('template/header', $data);
            $this->load->view('account-customer/register-page');
            $this->load->view('template/footer');
        }
    }
}