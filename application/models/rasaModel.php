<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class rasaModel extends CI_Model {

	public function show($tabel) { 
		$this->db->where('id_rasa !=', '0');
		return $this->db->get($tabel)->result_array();
	}
	public function database($tabel, $id, $action) {
		$this->db->set('rasa', $_POST['nama_rasa']);
		$this->db->set('harga_rasa', $_POST['harga_rasa']);
		
		if ($action == 'save') {
			$this->db->set('id_rasa', $this->modelKu->uuid($tabel, $id));
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_rasa', $id); 
			$this->db->update($tabel);
		}
	} 
	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_rasa' => $id])->row_array();
	}
}