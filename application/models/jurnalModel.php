<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class jurnalModel extends CI_Model {

	public function show($tanggal_awal, $tanggal_akhir) {
		$this->db->select('a.no, coa_id, nama_coa, tanggal, posisi, nominal, transaksi_id');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'a.coa_id = b.kode_coa');
		$this->db->where('tanggal >=', $tanggal_awal);
		$this->db->where('tanggal <=', $tanggal_akhir);
		// if ($this->session->userdata('level') == "Karyawan") {
		// 	$this->db->where('user', 'lutfi');
		// } elseif ($this->session->userdata('level') == "Produksi") {
		// 	$this->db->where('user', 'adel');
		// }
		$this->db->order_by('a.no', 'ASC');
		return $this->db->get()->result_array();
	}

    public function generateJurnal($coa_id, $transaksi_id, $posisi, $total, $user) { #kolom keterangan belum
        $this->db->set('no', $this->modelKu->uuid('jurnal', 'no'));
		$this->db->set('transaksi_id', $transaksi_id);
		$this->db->set('coa_id', $coa_id);
        $this->db->set('tanggal', date('Y-m-d'));
		$this->db->set('posisi', $posisi);
		$this->db->set('nominal', $total);
		$this->db->set('user', $user);
		$this->db->insert('jurnal');
    }
}