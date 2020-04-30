<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pelangganModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function database($tabel, $id, $action) {
		$this->db->set('nama_pelanggan', $_POST['nama_pelanggan']);
		$this->db->set('no_wa', noWa($_POST['no_wa']));
		$this->db->set('alamat', $_POST['alamat']);
		$this->db->set('username', $_POST['username']);
		$this->db->set('password', $_POST['password']);
		
		if ($action == 'save') {
			$this->db->set('id_pelanggan', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_pelanggan', 'Arumi');
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_pelanggan', $id); 
			$this->db->update($tabel);
		}
	} 
	
	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_pelanggan' => $id])->row_array();
	}
}