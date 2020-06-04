<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pesananModel extends CI_Model {

    public function show() {
        $this->db->select('id_pesanan, kode_pesanan, total, tanggal, status, id_pelanggan, nama_pelanggan');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
		return $this->db->get()->result_array();
    }

    public function showNewOrder() {
        $this->db->select('id_pesanan, kode_pesanan, total, tanggal, status, id_pelanggan, nama_pelanggan');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
        $this->db->where('status', 'Belum Diolah');
		return $this->db->get()->result_array();
    }

    public function showWorkingOrder() {
        $this->db->select('id_pesanan, kode_pesanan, total, tanggal, status, id_pelanggan, nama_pelanggan');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
        $this->db->where('status !=', 'Belum Diolah');
        $this->db->where('status !=', 'Sudah Jadi');
        $this->db->where('status !=', 'Belum Bayar');
        $this->db->where('status !=', 'Menunggu');
		return $this->db->get()->result_array();
    }

    public function showFinishOrder() {
        $this->db->select('id_pesanan, kode_pesanan, total, tanggal, status, id_pelanggan, nama_pelanggan');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
        $this->db->where('status', 'Sudah Jadi');
		return $this->db->get()->result_array();
    }

    public function showPendingOrder() {
        $this->db->select('id_pesanan, kode_pesanan, total, tanggal, status, id_pelanggan, nama_pelanggan, foto');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
        $this->db->where('status', 'Menunggu');
		return $this->db->get()->result_array();
    }

    public function showPesanan($id) {
        $this->db->select('*');
        $this->db->from('pelanggan a');
        $this->db->join('pesanan b', 'a.id_pelanggan = b.pelanggan_id');
        $this->db->where('id_pesanan', $id);
		return $this->db->get()->row_array();
    }

    public function showDetail($id) {
        $this->db->select('pesanan_id, produk_id, nama_produk, jumlah, b.harga, subtotal, satuan, rasa');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b', 'a.id_produk = b.produk_id');
        $this->db->join('rasa c', 'b.rasa_id = c.id_rasa');
        $this->db->where('pesanan_id', $id);
		return $this->db->get()->result_array();
    }

    public function showTimeline($tabel, $id) {
        $this->db->where('pesanan_id', $id);
		return $this->db->get($tabel)->result_array();
    }

    public function database($tabel, $id, $id_pesanan, $action) {
        date_default_timezone_set("Asia/Jakarta");
        $keterangan = "Pesanan sudah di Acc user Produksi.";
        $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
        $this->db->set('pesanan_id', $id_pesanan);
        $this->db->set('kode_pesanan', 'PSN');
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('jam', date('H:i:s'));
        $this->db->set('keterangan', $keterangan);
        $this->db->insert('timeline');

        if ($action == 'own') {
            $id_produksi = $this->modelKu->uuid($tabel, $id);
            $this->db->set('id_produksi', $id_produksi);
            $this->db->set('kode_produksi', 'Produksi');
            $this->db->set('pesanan_id', $_POST['pesanan_id']);
            $this->db->set('pelanggan_id', $_POST['pelanggan_id']);
            $this->db->set('mulai', $_POST['mulai_produksi']);
            $this->db->set('status', 'Belum Dibeli');
            $this->db->insert($tabel);
            
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->set('status', 'Diproduksi');
            $this->db->update('pesanan');

            $keterangan = "Pesanan sedang di Tahap Pertama beli bahan.";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');
    
            for ($i = 0; $i < $_POST['no'] ; $i++) {
                $no = $this->modelKu->uuid('bom', 'no');
                $this->db->set('no', $no);
                $this->db->set('pesanan_id', $_POST['pesanan_id']);
                $this->db->set('produksi_id', $id_produksi);
                $this->db->set('produk_id', "".$_POST['produk_id'][$i]."");
                $this->db->set('bahan_id', "".$_POST['bahan_id'][$i]."");
                $this->db->set('jumlah', "".$_POST['jumlah'][$i]."");
                $this->db->set('harga', "".$_POST['harga'][$i]."");
                $this->db->set('subtotal', "".$_POST['subtotal'][$i]."");
                $this->db->set('status', 'Belum Dibeli');
                $this->db->insert('bom');
            }
        } 
        else {
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->set('komunitas_id', $_POST['komunitas_id']);
            $this->db->set('status', 'Dikirim ke Komunitas');
            $this->db->update('pesanan');

            $keterangan = "Pesanan ditawarkan ke komunitas.";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');
        }
    }

    public function yes($tabel, $id) {
        $this->db->set('status', 'Belum Diolah');
        $this->db->where('id_pesanan', $id);
        $this->db->update($tabel);
        
        date_default_timezone_set("Asia/Jakarta");
        $keterangan = "Pesanan telah di ACC oleh Owner dan sekarang tinggal menunggu approval user Produksi.";
        $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
        $this->db->set('pesanan_id', $id);
        $this->db->set('kode_pesanan', 'PSN');
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('jam', date('H:i:s'));
        $this->db->set('keterangan', $keterangan);
        $this->db->insert('timeline');
    }

    public function no($tabel, $id) {
        $this->db->set('status', 'Belum Bayar');
        $this->db->where('id_pesanan', $id);
        $this->db->update($tabel);

        date_default_timezone_set("Asia/Jakarta");
        $keterangan = "Owner mengembalikan pesanan ke pelanggan, dikarenakan bukti pembayaran tidak valid.";
        $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
        $this->db->set('pesanan_id', $id);
        $this->db->set('kode_pesanan', 'PSN');
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('jam', date('H:i:s'));
        $this->db->set('keterangan', $keterangan);
        $this->db->insert('timeline');
    }

    public function getTotal($tabel, $id) {
        $this->db->select_sum('subtotal');
        $this->db->where('pesanan_id', $id);
        return $this->db->get($tabel)->row_array();
    }

    public function done($id_pesanan) {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->set('status', ucwords('sudah jadi'));
        $this->db->update('pesanan');

        $keterangan = "User Produksi sudah menerima produk dari komunitas.";
        $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
        $this->db->set('pesanan_id', $id_pesanan);
        $this->db->set('kode_pesanan', 'PSN');
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('jam', date('H:i:s'));
        $this->db->set('keterangan', $keterangan);
        $this->db->insert('timeline');

        $keterangan = "Pesanan siap diantar.";
        $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
        $this->db->set('pesanan_id', $id_pesanan);
        $this->db->set('kode_pesanan', 'PSN');
        $this->db->set('tanggal', date('Y-m-d'));
        $this->db->set('jam', date('H:i:s'));
        $this->db->set('keterangan', $keterangan);
        $this->db->insert('timeline');
    }

    public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_pesanan' => $id])->row_array();
    }

    public function getPesanan($id) { 
        $this->db->from('pesanan a');
        $this->db->join('pelanggan b', 'b.id_pelanggan = a.pelanggan_id');
        $this->db->where('id_pesanan', $id);
		return $this->db->get()->row_array();
    }

    public function getDetail($id) {
        $this->db->select('produk_id, a.harga, jumlah, subtotal, nama_produk, foto, rasa, harga_rasa, rasa_id');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b', 'a.id_produk = b.produk_id');
        $this->db->join('rasa c', 'b.rasa_id = c.id_rasa');
        $this->db->where('pesanan_id', $id);
		return $this->db->get()->result_array();
    }
}