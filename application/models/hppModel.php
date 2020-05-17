<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class hppModel extends CI_Model {

    public function show() {
        $this->db->select('id_pesanan, kode_pesanan, total, tanggal, c.status, id_pelanggan, nama_pelanggan');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
        $this->db->join('produksi c', 'b.id_pesanan = c.pesanan_id');
        $this->db->where('c.status', 'Sudah Jadi');
        $this->db->where('hpp', '');
		return $this->db->get()->result_array();
    }

    public function database($tabel, $id) {
        $this->db->set('hpp', 'Sudah Input HPP');
        $this->db->where('id_produksi', $id);
        $this->db->update($tabel);
    }

    public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['pesanan_id' => $id])->row_array();
	}
}