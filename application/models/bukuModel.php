<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bukuModel extends CI_Model {

	public function show($kode, $bulan, $tahun) {
		$query 	= " SELECT  coa_id, tanggal, nama_coa, posisi, nominal, 
						    MONTH(tanggal) bulan, YEAR(tanggal) tahun 
					  FROM  jurnal AS a 
					  JOIN  coa AS b 
					    ON  a.coa_id = b.kode_coa 
					 WHERE  coa_id = '$kode' 
					HAVING  bulan = '$bulan' AND tahun = '$tahun' 
				  ORDER BY  a.no ASC ";
		return $this->db->query($query)->result_array();
    }

    public function getOne($kode, $tabel) {
        $this->db->where('kode_coa', $kode);
		return $this->db->get($tabel)->row_array();
    }

}