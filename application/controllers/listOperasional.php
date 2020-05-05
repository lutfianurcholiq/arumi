<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class listOperasional extends CI_Controller {

	// public function __construct() {
	// 	parent:: __construct();
	// 	if ($this->session->userdata('level') != "") {
	// 		redirect('welcome/blok');
	// 	} 
    // }

    public function validasi($action) {
		if ($action == 'save') {
			$this->form_validation->set_rules('id_coa', ucwords('coa'), 'required');
            $message = ucfirst('daftar operasional berhasil disimpan');
		}
		else {
            $message = ucfirst('daftar operasional berhasil diubah');
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
			$this->listOperasionalModel->database('detail_operasional', $id, 'coa_id');
			redirect('listOperasional/create/'.$id);
		}
		else {
			$data['judul']  = ucwords('operasional');
			$data['menu']   = ucwords('transaksi');
			$data['url']    = site_url('listOperasional/create/'.$id);
			$data['modal']  = site_url('listOperasional/done');
			$data['tabel']  = site_url('addOperasional');
			$data['hasil']  = $this->listOperasionalModel->show($id);
            $data['coa']    = $this->listOperasionalModel->showCoa($id);
            $data['beban']  = $this->addOperasionalModel->getOne('operasional', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/listOperasional/index', $data);	
			$this->load->view('transaksi/listOperasional/modal-selesai', $data);	
			$this->load->view('transaksi/listOperasional/modal-alert');	
			$this->load->view('template/footer');	
		}
	}

	public function update() {
		$id_operasional = $this->uri->segment(3);
		$no         	= $this->uri->segment(4);
		if($this->validasi('edit')) {
			$this->listOperasionalModel->database('detail_operasional', $id_operasional, $no);
			redirect('listOperasional/create/'.$id_operasional);
		}
		else {
			$data['judul']  = ucwords('ubah operasional');
			$data['menu']   = ucwords('transaksi');
			$data['url']    = site_url('listOperasional/update/'.$id_operasional.'/'.$no);
			$data['tabel']  = site_url('listOperasional/create/'.$id_operasional);
			$data['hasil']  = $this->listOperasionalModel->getOne($no);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/listOperasional/form-edit', $data);	
			$this->load->view('template/footer');	
		}
	}

	public function delete() {
		$id_operasional = $this->uri->segment(3);
		$no         	= $this->uri->segment(4);
		$this->listOperasionalModel->truncate('detail_operasional', $no);
		$message = ucfirst('daftar operasional berhasil dihapus');
		flashdata($message);
		redirect('listOperasional/create/'.$id_operasional);
	}

	public function done() {
		$this->listOperasionalModel->finish('operasional', $_POST['id_operasional']);

		for ($i = 0; $i < $_POST['no']; $i++) { 
			$this->jurnalModel->generateJurnal("".$_POST['id_coa'][$i]."", $_POST['id_operasional'], 'Debit', "".$_POST['nominal'][$i]."", 'rina');
			$this->jurnalModel->generateJurnal('111', $_POST['id_operasional'], 'Kredit', "".$_POST['nominal'][$i]."", 'rina');
		}
		redirect('addOperasional');
	}
}