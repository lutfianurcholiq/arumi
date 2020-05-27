<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class listPeralatan extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != "Owner") {
			redirect('welcome/blok');
		} 
    }

    public function validasi($action) {
		if ($action == 'save') {
			$this->form_validation->set_rules('id_peralatan', ucwords('peralatan'), 'required');
            $message = ucfirst('transaksi beli peralatan berhasil disimpan');
		}
		else {
            $message = ucfirst('transaksi beli peralatan berhasil diubah');
		}
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
		$id = $this->uri->segment(3);
		if($this->validasi('save')) {
			$this->listPeralatanModel->database('detail_transaksi_peralatan', $id, 'insert');
			redirect('listPeralatan/create/'.$id);
		}
		else {
			$data['judul']      = ucwords('beli peralatan');
			$data['menu']       = ucwords('transaksi');
			$data['url']        = site_url('listPeralatan/create/'.$id);
			$data['modal']      = site_url('listPeralatan/done');
			$data['tabel']      = site_url('beliPeralatan');
			$data['hasil']      = $this->listPeralatanModel->show($id);
            $data['peralatan']  = $this->listPeralatanModel->showPeralatan($id);
            $data['beli']       = $this->beliPeralatanModel->getOne('transaksi_peralatan', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/listPeralatan/index', $data);	
			$this->load->view('transaksi/listPeralatan/modal-selesai', $data);	
			$this->load->view('transaksi/listPeralatan/modal-alert');	
			$this->load->view('template/footer');	
		}
	}

	public function update() {
		$transaksi_id   = $this->uri->segment(3);
		$no         	= $this->uri->segment(4);
		if($this->validasi('edit')) {
			$this->listPeralatanModel->database('detail_transaksi_peralatan', $transaksi_id, $no);
			redirect('listPeralatan/create/'.$transaksi_id);
		}
		else {
			$data['judul']  = ucwords('beli peralatan');
			$data['menu']   = ucwords('transaksi');
			$data['url']    = site_url('listPeralatan/update/'.$transaksi_id.'/'.$no);
			$data['tabel']  = site_url('listPeralatan/create/'.$transaksi_id);
			$data['hasil']  = $this->listPeralatanModel->getOne($no);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/listPeralatan/form-edit', $data);	
			$this->load->view('template/footer');	
		}
	}

	public function delete() {
		$transaksi_id   = $this->uri->segment(3);
		$no         	= $this->uri->segment(4);
		$this->listPeralatanModel->truncate('detail_transaksi_peralatan', $no);
		$message = ucfirst('transaksi peralatan berhasil dihapus');
		flashdata($message);
		redirect('listPeralatan/create/'.$transaksi_id);
	}

	public function done() {
        $this->listPeralatanModel->finish('transaksi_peralatan', $_POST['id_transaksi']);
        
        $this->jurnalModel->generateJurnal('122', $_POST['id_transaksi'], 'Debit', $_POST['total'], 'rina');
        $this->jurnalModel->generateJurnal('111', $_POST['id_transaksi'], 'Kredit', $_POST['total'], 'rina');
		redirect('beliPeralatan');
	}
}