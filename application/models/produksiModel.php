<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produksiModel extends CI_Model {

	public function show() { 
		$this->db->select('id_produksi, kode_produksi, mulai, selesai, id_pesanan, kode_pesanan, total, tanggal, a.status, kode_pelanggan, id_pelanggan, nama_pelanggan');
        $this->db->from('produksi a');
        $this->db->join('pesanan b', 'a.pesanan_id = b.id_pesanan');
        $this->db->join('pelanggan c', 'a.pelanggan_id = c.id_pelanggan');
        // $this->db->where('status', 'Belum Dikirim');
		return $this->db->get()->result_array();
	}
}