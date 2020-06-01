<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produk extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('level') != 'Karyawan') {
			redirect('welcome/blok');
		} 
	}
	
	public function index() {
		$data['judul'] = ucwords('produk');
		$data['menu']  = ucwords('master data');
		$data['form']  = site_url('produk/create');
		$data['hasil'] = $this->produkModel->show('produk');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/produk/index', $data);
		$this->load->view('template/footer');	
	}

	public function validasi($action) {
		if ($action == 'save') {
			$this->form_validation->set_rules('foto', ucwords('foto'), 'callback_file_upload');
			$message = ucfirst('data produk berhasil disimpan');
		}
		else {
			$message = ucfirst('data produk berhasil diubah');
		}
		$this->form_validation->set_rules('nama_produk', ucwords('nama produk'), 'required');
		$this->form_validation->set_rules('satuan', ucwords('satuan'), 'required');
		$this->form_validation->set_rules('harga', ucwords('harga'), 'required|is_natural_no_zero');
		$this->form_validation->set_rules('min', ucwords('min'), 'required|is_natural_no_zero');
		$this->form_validation->set_rules('max', ucwords('max'), 'required|is_natural_no_zero');
		$this->form_validation->set_rules('deskripsi', ucwords('deskripsi'), 'required');
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
		if($this->validasi('save')) {
			$config['upload_path']		=	'./product-img';
			$config['allowed_types']	=	'gif|jpg|png|jpeg';
			$config['max_size']			=	6000;
			$config['quality']			= 	'100%';
			$config['overwrite']		= 	true;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$file 		= 	$this->upload->data();
				$gambar 	=	"product-img/".$file['file_name'];
				$this->produkModel->database('produk', 'id_produk', 'save', $gambar);
				redirect('produk');
			}
		}
		else {
			$data['judul'] = ucwords('form tambah produk');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('produk/create');
			$data['tabel'] = site_url('produk');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/produk/add');
			$this->load->view('template/footer');
		}
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		if($this->validasi('edit')) {
			$config['upload_path']		=	'./product-img';
			$config['allowed_types']	=	'gif|jpg|png|jpeg';
			$config['max_size']			=	6000;
			$config['quality']			= 	'100%';
			$config['overwrite']		= 	true;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$file 		= 	$this->upload->data();
				$gambar 	=	"product-img/".$file['file_name'];
			}
			else {
				$gambar = $_POST['foto_lama'];
			}
			$this->produkModel->database('produk', $id, 'edit', $gambar);
			redirect('produk');
		}
		else {
			$data['judul'] = ucwords('form ubah produk');
			$data['menu']  = ucwords('master data');
			$data['url']   = site_url('produk/update/'.$id);
			$data['tabel'] = site_url('produk');
			$data['hasil'] = $this->produkModel->getOne('produk', $id);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/produk/edit');
			$this->load->view('template/footer');
		}
	}

	function file_upload() {
		if ($_FILES['foto']['size'] == 0) { 
			$this->form_validation->set_message('file_upload', ucfirst('tidak ada file yang dipilih'));
			return false;
		}
	}
}