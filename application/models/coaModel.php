<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class coaModel extends CI_Model {

	public function show($tabel) { 
		$this->db->order_by('kode_coa', 'ASC');
		return $this->db->get($tabel)->result_array();
	}
	public function database($tabel, $id, $action) {
		$this->db->set('nama_coa', $_POST['nama_coa']);
		
		if ($action == 'save') {
			$header = substr($_POST['kode_coa'], 0);
			$this->db->set('id_coa', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_coa', $_POST['kode_coa']);
			$this->db->set('header_coa', $header);
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_coa', $id); 
			$this->db->update($tabel);
		}
	} 
	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_coa' => $id])->row_array();
	}
}