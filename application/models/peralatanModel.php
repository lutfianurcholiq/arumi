<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class peralatanModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function database($tabel, $id, $action) {
		$this->db->set('nama_peralatan', $_POST['nama_peralatan']);
		$this->db->set('harga', $_POST['harga']);
		
		if ($action == 'save') {
			$this->db->set('id_peralatan', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_peralatan', 'PLTN');
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_peralatan', $id); 
			$this->db->update($tabel);
		}
	} 
	
	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_peralatan' => $id])->row_array();
	}
}