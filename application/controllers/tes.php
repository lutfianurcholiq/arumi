<?php
class tes extends CI_Controller {
	
	public function index() {
		$data['judul'] = ucwords('tes');
		$data['menu']  = ucwords('billy ngetes');
        $data['url']  = site_url('tes/create');
		$data['tabel'] = site_url('tes');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'form-test', $data);
        $this->load->view('template/footer');	
        
    }

    public function create() {
		$this->form_validation->set_rules('qty', ucwords('qty'), 'required|is_natural_no_zero');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');
		if($this->form_validation->run()) {
			$this->index();
		}
		else {
			$this->db->set('qty', $_POST['qty']);
			$this->db->insert('tes');
			redirect('tes');
		}
    }
}