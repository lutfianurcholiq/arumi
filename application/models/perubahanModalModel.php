<?php
defined('BASEPATH') or exit('No direct script access allowed');
class perubahanModalModel extends CI_Model {

    public function showModal($bulan, $tahun) {
        $query   = " SELECT IF(SUM(nominal) IS NOT NULL, SUM(nominal), 0) AS modal 
                      FROM jurnal 
                     WHERE coa_id = '311' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showPrive($bulan, $tahun) {
        $query   = " SELECT IF(SUM(nominal) IS NOT NULL, SUM(nominal), 0) AS prive 
                      FROM jurnal 
                     WHERE coa_id = '312' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

}