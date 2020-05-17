<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bayar extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('pelanggan_id')) {
    	    redirect('welcome/blok');
    	} 
    }

    public function validasi() {   
        $this->form_validation->set_rules('foto', ucwords('foto'), 'callback_file_upload');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			return true;
		}
		else {
			return false;
		}
	}

    public function pay() {
        $id_pesanan  = $this->uri->segment(3);
        if ($this->validasi()) {
			$config['upload_path']		=	'./nota';
			$config['allowed_types']	=	'gif|jpg|png|jpeg';
			$config['max_size']			=	10000;
			$config['quality']			= 	'100%';
			$config['overwrite']		= 	true;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$file 		= 	$this->upload->data();
				$gambar 	=	$file['file_name'];
				$this->bayarModel->payment('pesanan', $id_pesanan, $gambar);
				redirect('riwayat');
			}
		}
		else {
            $data['judul']     = ucwords('pembayaran');
            $data['hasil']     = $this->bayarModel->show($id_pesanan);
            $data['order']     = $this->bayarModel->getOne('pesanan', $id_pesanan);
            $data['list']      = $this->listPesananModel->show();
            $data['pesanan']   = $this->pemesananModel->countPesanan();
            $data['url']       = site_url('bayar/pay/'.$id_pesanan);
            $this->load->view('shop/header', $data);
            $this->template->load('shop/content', 'account-customer/payment', $data);
            $this->load->view('shop/footer');
		}
    }

    function file_upload() {
		if ($_FILES['foto']['size'] == 0) { 
			$this->form_validation->set_message('file_upload', ucfirst('tidak ada file yang dipilih'));
			return false;
		}
	}
}