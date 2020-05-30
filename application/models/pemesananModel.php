<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pemesananModel extends CI_Model {

	public function countPesanan() {
		$id_pelanggan = $this->session->userdata('pelanggan_id');
		$sql = "SELECT produk_id 
				  FROM detail_pesanan
				 WHERE pelanggan_id = '$id_pelanggan'
				   AND pesanan_id = 0 ";
		return $this->db->query($sql)->num_rows();
	}

	public function show($tabel) { 
		return $this->db->get($tabel)->result_array();
	}

	public function showProduk() {
		$id_pelanggan = $this->session->userdata('pelanggan_id');
		$query = "	SELECT id_produk, kode_produk, nama_produk, harga, foto, pesanan_id 
					FROM ( 
						SELECT id_produk, kode_produk, nama_produk, harga, foto,
							(SELECT b.pesanan_id FROM detail_pesanan b 
							WHERE a.id_produk = b.produk_id AND pesanan_id = 0 AND b.pelanggan_id = '$id_pelanggan'
							) AS pesanan_id 
						FROM produk a 
					) A";
		return $this->db->query($query)->result_array();
	}

	public function showPesanan($tabel) {
		$id_pelanggan = $this->session->userdata('pelanggan_id');
		$this->db->where('pelanggan_id', $id_pelanggan);
		return $this->db->get($tabel)->result_array();
	}

	public function showInvoice($id_pesanan) {
		$id_pelanggan = $this->session->userdata('pelanggan_id');
		$this->db->select('id_produk, kode_produk, nama_produk, satuan, b.harga, jumlah, subtotal');
		$this->db->from('produk a');
		$this->db->join('detail_pesanan b', 'a.id_produk = b.produk_id');
		$this->db->where('pesanan_id', $id_pesanan);
		$this->db->where('pelanggan_id', $id_pelanggan);
		return $this->db->get()->result_array();
	}

	public function getHarga() {
		$this->db->where('id_produk', $_POST['produk_id']);
		return $this->db->get('produk')->row()->harga;
	}

	public function database($tabel, $action) {
		$id_pelanggan = $this->session->userdata('pelanggan_id');
		$harga        = $this->getHarga();
		$harga_custom = $harga + $_POST['harga']; #	ditambah harga rasa (meskipun original Rp. 0)

		$this->db->set('harga', $harga_custom);
		$this->db->set('jumlah', $_POST['jumlah']);
		$this->db->set('rasa_id', $_POST['id_rasa']);
		$this->db->set('subtotal', $_POST['jumlah'] * $harga_custom);
		if ($action == 'save') {
			$this->db->set('produk_id', $_POST['produk_id']);
			$this->db->set('pelanggan_id', $id_pelanggan);
			$this->db->insert($tabel);
		}
		else {
			$this->db->where('pesanan_id', 0);
			$this->db->where('produk_id', $_POST['produk_id']);
			$this->db->where('pelanggan_id', $id_pelanggan);
			$this->db->update($tabel);
		}
	}

	public function getOne($id) {
		$this->db->select('id_produk, kode_produk, nama_produk, a.harga, foto, deskripsi, min, max, jumlah');
        $this->db->from('produk a');
		$this->db->join('detail_pesanan b', 'a.id_produk = b.produk_id');
		$this->db->where('produk_id', $id);
		return $this->db->get()->row_array();
	}

	public function getPesanan($id_pesanan) {
        $this->db->from('pesanan a');
		$this->db->join('pelanggan b', 'a.pelanggan_id = b.id_pelanggan');
		$this->db->where('id_pesanan', $id_pesanan);
		return $this->db->get()->row_array();
	}

	public function delete($id_produk, $id_pelanggan) {
		$this->db->where('pesanan_id', 0);
		$this->db->where('produk_id', $id_produk);
		$this->db->where('pelanggan_id', $id_pelanggan);
		$this->db->delete('detail_pesanan');
	}

	public function finish($tabel, $id_pesanan, $total, $id_pelanggan) {
		$this->db->set('id_pesanan', $id_pesanan);
		$this->db->set('kode_pesanan', 'PSN');
		$this->db->set('pelanggan_id', $id_pelanggan);
		$this->db->set('tanggal', date('Y-m-d'));
		$this->db->set('total', $total);
		$this->db->set('status', 'Belum Bayar');
		$this->db->insert($tabel);

		$this->db->where('pesanan_id', 0);
		$this->db->where('pelanggan_id', $id_pelanggan);
		$this->db->set('pesanan_id', $id_pesanan);
		$this->db->update('detail_pesanan');
	}
}