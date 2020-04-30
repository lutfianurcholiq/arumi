<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class biayaModel extends CI_Model {

	public function show() {
        $this->db->select('a.id_biaya, a.kode_coa, nama_coa, nama_biaya, keterangan');
        $this->db->from('biaya a');
        $this->db->join('coa b', 'a.kode_coa = b.kode_coa');
		return $this->db->get()->result_array();
	}
	
    public function showCoa() { 
        $sql =  "SELECT a.kode_coa, nama_coa, id_biaya 
				   FROM ( 
						SELECT a.kode_coa, nama_coa, (
								SELECT b.id_biaya 
								  FROM biaya b 
								 WHERE a.kode_coa = b.kode_coa 
						) AS id_biaya 
				        FROM coa a
				 WHERE a.header_coa = 5
				) A";
		return $this->db->query($sql)->result_array();
	}
	
	public function database($tabel, $id, $action) {
		$this->db->set('nama_biaya', $_POST['nama_biaya']);
        $this->db->set('kode_coa', $_POST['kode_coa']);
        $this->db->set('keterangan', $_POST['keterangan']);
		
		if ($action == 'save') {
			$this->db->set('id_biaya', $this->modelKu->uuid($tabel, $id));
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('id_biaya', $id); 
			$this->db->update($tabel);
		}
	} 

	public function getOne($id) { 
        $sql = "  SELECT b.kode_coa, nama_coa, keterangan, nama_biaya, a.kode_coa kodeCoa 
                    FROM biaya a 
                    JOIN coa b 
                   WHERE b.header_coa = 5 
                     AND a.id_biaya = '$id' ";
		return $this->db->query($sql)->row_array();
	}
}