<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addOperasionalModel extends CI_Model {

    public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}
    
    public function database($tabel, $id) {
        $this->db->set('id_operasional', $this->modelKu->uuid($tabel, $id));
        $this->db->set('kode_operasional', 'OP');
		$this->db->set('keterangan', $_POST['keterangan']);
		$this->db->set('tanggal', date('Y-m-d'));
		$this->db->set('status', ucwords('baru dibuat'));
        $this->db->insert($tabel);
    }
    
    public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_operasional' => $id])->row_array();
    }
    
    public function getDetail($id) {
        $this->db->select('nama_coa, nominal, a.tanggal');
        $this->db->from('operasional a');
        $this->db->join('detail_operasional b', 'a.id_operasional = b.operasional_id');
        $this->db->join('coa c', 'b.coa_id = c.kode_coa');
        $this->db->where('id_operasional', $id);
		return $this->db->get()->result_array();
    }
}