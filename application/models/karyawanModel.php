<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class karyawanModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}
	public function database($tabel, $id, $action) {
		$this->db->set('nama_karyawan', $_POST['nama_karyawan']);
		$this->db->set('no_wa', noWa($_POST['no_wa']));
		$this->db->set('alamat', $_POST['alamat']);
		$this->db->set('gaji', $_POST['gaji']);
		
		if ($action == 'save') {
			$this->db->set('id_karyawan', $this->modelKu->uuid($tabel, $id));
			$this->db->set('kode_karyawan', 'EMP');
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_karyawan', $id); 
			$this->db->update($tabel);
		}
	} 
	public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_karyawan' => $id])->row_array();
	}
}