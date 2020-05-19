<?php
defined('BASEPATH') or exit('No direct script access allowed');
class bayarModel extends CI_Model {

    public function show($id) {
        $this->db->select('produk_id, a.harga, jumlah, subtotal, nama_produk, foto, satuan');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b',  'a.id_produk = b.produk_id');
        $this->db->where('pelanggan_id', $this->session->userdata('pelanggan_id'));
        $this->db->where('pesanan_id', $id);
        return $this->db->get()->result_array();
    }

    public function getOne($tabel, $id) {
        return $this->db->get_where($tabel, ['id_pesanan' => $id, 'status' => ucwords('belum bayar')])->row_array();
    }

    public function payment($tabel, $id_pesanan, $gambar) {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->set('foto', $gambar);
        $this->db->set('status', 'Menunggu');
        $this->db->update($tabel);
    }

    public function finish($tabel, $id_pesanan, $id_pelanggan) {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->where('pelanggan_id', $id_pelanggan);
        $this->db->set('status', 'Belum Dikirim');
        $this->db->update($tabel);
    }
}
