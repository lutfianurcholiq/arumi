<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class laporanPenjualanModel extends CI_Model {

	public function show($bulan, $tahun) {
		$query 	= " SELECT  tanggal, id_pesanan, kode_pesanan, b.harga, jumlah, subtotal, 
                            id_produk, kode_produk, nama_produk, 
						    MONTH(tanggal) bulan, YEAR(tanggal) tahun 
					  FROM  pesanan a 
					  JOIN  detail_pesanan b 
					    ON  a.id_pesanan = b.pesanan_id 
					  JOIN  produk c 
					    ON  b.produk_id = c.id_produk 
					HAVING  bulan = '$bulan' AND tahun = '$tahun' ";
		return $this->db->query($query)->result_array();
	}

}