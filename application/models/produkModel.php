<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produkModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function database($tabel, $id, $action, $gambar) {
		$this->db->set('nama_produk', $_POST['nama_produk']);
		$this->db->set('satuan', $_POST['satuan']);
		$this->db->set('harga', $_POST['harga']);
		$this->db->set('min', $_POST['min']);
		$this->db->set('max', $_POST['max']);
		$this->db->set('deskripsi', $_POST['deskripsi']);
		
		if ($action == 'save') {
			$this->db->set('id_produk', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_produk', 'Cookie');
			$this->db->set('foto', $gambar);
			$this->db->insert($tabel);
		}
		else {
			$this->db->set('foto', $gambar);
			$this->db->where('id_produk', $id); 
			$this->db->update($tabel);
		}
	} 

	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_produk' => $id])->row_array();
	}
}