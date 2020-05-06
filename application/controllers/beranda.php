<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class beranda extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        if ($this->session->userdata('level') != 'Produksi' AND $this->session->userdata('level') != 'Karyawan' AND $this->session->userdata('level') != 'Owner') {
    	    redirect('welcome/blok');
    	} 
    }

    public function index() {
        $data['judul']   = ucwords('beranda');
        $data['menu']    = ucwords('beranda');
        $this->load->view('template/header', $data);
        $this->template->load('template/content', 'dashboard', $data);
        $this->load->view('template/footer');	
    }
}