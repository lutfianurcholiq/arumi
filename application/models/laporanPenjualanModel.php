<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class laporanPenjualanModel extends CI_Model {

	public function show($bulan, $tahun) {
		$query 	= " SELECT  tanggal, id_pesanan, kode_pesanan, b.harga, jumlah, subtotal, 
                            id_produk, kode_produk, nama_produk, rasa, nama_pelanggan, 
						    MONTH(tanggal) bulan, YEAR(tanggal) tahun 
					  FROM  pesanan a 
					  JOIN  detail_pesanan b 
					    ON  a.id_pesanan = b.pesanan_id 
					  JOIN  produk c 
					    ON  b.produk_id = c.id_produk
					  JOIN  rasa d
					    ON  b.rasa_id = d.id_rasa
					  JOIN  pelanggan e
					    ON  b.pelanggan_id = e.id_pelanggan
					HAVING  bulan = '$bulan' AND tahun = '$tahun' ";
		return $this->db->query($query)->result_array();
	}

}