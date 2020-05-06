<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class priveModel extends CI_Model {

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function getKas() {
		$bulan 	=	short_bulan(date('m'));
		$tahun 	=	date('Y');
		$query = "SELECT ABS(SUM(IF(posisi = 'Debit', nominal, 0)) - SUM(IF(posisi = 'Kredit', nominal, 0))) AS kas 
					FROM jurnal b
				   WHERE coa_id = '111' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
		return $this->db->query($query)->row_array();
	}

	public function database($tabel, $id) {
		$this->db->set('id_prive', $id);
        $this->db->set('nominal', str_replace(".", "", $_POST['nominal']));
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('keterangan', $_POST['keterangan']);
        $this->db->insert($tabel);
	} 
}