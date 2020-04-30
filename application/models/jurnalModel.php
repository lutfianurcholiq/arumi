<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class jurnalModel extends CI_Model {

	public function show() {
		$this->db->select('a.no, coa_id, nama_coa, tanggal, posisi, nominal, transaksi_id');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'a.coa_id = b.id_coa');
		// $this->db->where('tanggal', date('Y-m-d'));
		$this->db->order_by('a.no', 'ASC');
		return $this->db->get()->result_array();
	}

    public function generateJurnal($coa_id, $transaksi_id, $posisi, $total) {
        $this->db->set('no', $this->modelKu->uuid('jurnal', 'no'));
		$this->db->set('transaksi_id', $transaksi_id);
		$this->db->set('coa_id', $coa_id);
        $this->db->set('tanggal', date('Y-m-d'));
		$this->db->set('posisi', $posisi);
		$this->db->set('nominal', $total);
		$this->db->insert('jurnal');
    }
}