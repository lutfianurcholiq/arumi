<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class biayaProduksiModel extends CI_Model {

	public function show($bulan, $tahun) {
		$query 	= " SELECT  SUM(bahan_baku) bahan_baku, SUM(tenaga_kerja) tenaga_kerja, SUM(bahan_penolong) bahan_penolong, SUM(oh) oh,
						    MONTH(mulai) bulan, YEAR(mulai) tahun 
					  FROM  produksi
					HAVING  bulan = '$bulan' AND tahun = '$tahun'";
		return $this->db->query($query)->row_array();
    }

}