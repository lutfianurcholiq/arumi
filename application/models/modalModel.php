<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modalModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function database($tabel, $id) {
		$this->db->set('id_modal', $id);
        $this->db->set('nominal', str_replace(".", "", $_POST['nominal']));
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('keterangan', $_POST['keterangan']);
        $this->db->insert($tabel);
	} 
}