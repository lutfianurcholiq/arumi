<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pelanggan extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != "Karyawan") {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] 			=	"Pelanggan";
		$data['menu'] 			=	"Master Data";
		$data['icon'] 			=	"fa fa-users";
		$data['hasil'] 			=	$this->pelangganModel->tampilkan("pelanggan");
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pelanggan/index');
		$this->load->view('template/footer');	
	}

	public function validasi() {
		$this->form_validation->set_rules('namaPelanggan', 'Nama', 'required');
		$this->form_validation->set_rules('noHp', 'No Hp', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_error_delimiters('<div style="text-align: left"><b class="text-danger">', '</b></div>');

		if($this->form_validation->run()) {
			return true;
		}
		else {
			return false;
		}
	}

	public function tambahPelanggan() {
		if($this->validasi()) {
			$this->pelangganModel->simpan("pelanggan", "id");
			$data['hasil'] = $this->pelangganModel->tampilkan("pelanggan");
			$html          = $this->load->view('master/pelanggan/list', $data, true);
			$callback      = array(
								'status' => 'sukses',
								'html'   => $html
							);
		}
		else {
			$callback = [
							'status'        => 'gagal',
							'namaPelanggan' => form_error('namaPelanggan'),
							'noHp'          => form_error('noHp'),
							'alamat'        => form_error('alamat'),
						];
		}
		echo json_encode($callback);
	}

	public function formUbah() {
		$data['judul'] 			=	"Pelanggan";
		$data['menu'] 			=	"Master Data";
		$data['icon'] 			=	"fa fa-users";
		$data['url'] 			=	site_url('pelanggan/ubahPelanggan/'. $this->uri->segment(3));
		$data['back'] 			=	site_url('pelanggan');
		$data['hasil'] 			=	$this->pelangganModel->ambilData("pelanggan", $this->uri->segment(3));
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pelanggan/edit', $data);
		$this->load->view('template/footer');
	}

	public function ubahPelanggan() {
		if($this->validasi()) {
			$this->pelangganModel->ubah("pelanggan", "id");
			redirect('pelanggan');
		}
		else {
			$this->formUbah();
		}
	}

}