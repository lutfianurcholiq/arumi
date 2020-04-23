<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class komunitasModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}
	public function database($tabel, $id, $action) {
		$this->db->set('nama_komunitas', $_POST['nama_komunitas']);
		$this->db->set('no_wa', noWa($_POST['no_wa']));
		$this->db->set('alamat', $_POST['alamat']);
		
		if ($action == 'save') {
			$this->db->set('id_komunitas', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_komunitas', 'CMTY');
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_komunitas', $id); 
			$this->db->update($tabel);
		}
	} 
	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_komunitas' => $id])->row_array();
	}
}