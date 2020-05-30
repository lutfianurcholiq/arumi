<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class listPesananModel extends CI_Model {

    public function show() {
        $this->db->select('produk_id, a.harga, jumlah, subtotal, nama_produk, foto');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b', 'a.id_produk = b.produk_id');
        $this->db->where('pelanggan_id', $this->session->userdata('pelanggan_id'));
        $this->db->where('pesanan_id', 0);
		return $this->db->get()->result_array();
    }
}