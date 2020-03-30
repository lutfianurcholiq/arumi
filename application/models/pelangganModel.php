<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pelangganModel extends CI_Model {

	public function tampilkan($tabel) { 
		return $this->db->get($tabel)->result_array();
	}
	public function simpan($tabel, $id) {
		$this->db->set('id', $this->modelKu->buatKode($tabel, $id));
		$this->db->set('namaId', 'CUS');
		$this->db->set('namaPelanggan', $_POST['namaPelanggan']);
		$this->db->set('noHp', $_POST['noHp']);
		$this->db->set('alamat', $_POST['alamat']);
		$this->db->set('status', 'Aktif'); 
		$this->db->insert($tabel);
	} 
	public function ambilData($tabel, $id) { 
		return $this->db->get_where($tabel, ['id' => $id])->row_array();
	}
  	public function ubah($tabel) {
		$this->db->set('namaPelanggan', $_POST['namaPelanggan']);
		$this->db->set('noHp', $_POST['noHp']);
		$this->db->set('alamat', $_POST['alamat']);
		$this->db->set('status', $_POST['status']);
		$this->db->where('id', $_POST['id']); 
		$this->db->update($tabel);
	}
}