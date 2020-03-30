<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class hewan extends CI_Controller {
		
		public function __construct() {
			parent:: __construct();
			// if ($this->session->userdata('level') != "Karyawan") {
			// 	redirect('welcome/blok');
			// } 
		}
		
		public function index() {
			$data['judul'] 	=	"Hewan";
			$data['menu'] 	=	"Master Data";
			$data['icon'] 	=	"fa fa-users";
			$data['hasil'] 	=	$this->hewanModel->show("hewan");
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/hewan/index');
			$this->load->view('template/footer');
		}
	
		public function validasi() {
			$this->form_validation->set_rules('namaHewan', 'Nama', 'required');
			$this->form_validation->set_rules('jenis', 'Jenis', 'required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
			$this->form_validation->set_error_delimiters('<div style="text-align: left"><b class="text-danger">', '</b></div>');
	
			if($this->form_validation->run()) {
				return true;
			}
			else {
				return false;
			}
		}
	
		public function create() {
			if($this->validasi()) {
				$this->hewanModel->save("hewan", "noHewan");
				$data['hasil'] = $this->hewanModel->show("hewan");
				$html          = $this->load->view('master/hewan/list', $data, true);
				$callback      = array(
									'status' => 'sukses',
									'html'   => $html
								);
			}
			else {
				$callback = [
								'status'     => 'gagal',
								'namaHewan'  => form_error('namaHewan'),
								'jenis'      => form_error('jenis'),
								'keterangan' => form_error('keterangan'),
							];
			}
			echo json_encode($callback);
		}
	
		public function update($id) {
			if($this->validasi()) {
				$this->hewanModel->edit("hewan", $id);
				$data['hasil'] = $this->hewanModel->show("hewan");
				$html          = $this->load->view('master/hewan/list', $data, true);
				$callback      = array(
									'status' => 'sukses',
									'html'   => $html
								);
			}
			else {
				$callback = [
								'status'     => 'gagal',
								'namaHewan'  => form_error('namaHewan'),
								'jenis'      => form_error('jenis'),
								'keterangan' => form_error('keterangan'),
							];
			}
			echo json_encode($callback);
		}
	}