<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bahanModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function database($tabel, $id, $action) {
		$this->db->set('nama_bahan', $_POST['nama_bahan']);
		$this->db->set('satuan', $_POST['satuan']);
		$this->db->set('harga', $_POST['harga']);
		$this->db->set('keterangan', $_POST['keterangan']);
		
		if ($action == 'save') {
			$this->db->set('id_bahan', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_bahan', 'BHN');
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_bahan', $id); 
			$this->db->update($tabel);
		}
	} 

	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_bahan' => $id])->row_array();
	}

	public function delete($tabel, $id) {
		$this->db->where('id_bahan', $id);
		$this->db->delete($tabel);
	}
}