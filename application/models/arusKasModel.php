<?php
defined('BASEPATH') or exit('No direct script access allowed');
class arusKasModel extends CI_Model {

    public function showKasPendapatan($bulan, $tahun) {
        $query   = " SELECT SUM(nominal) AS pendapatan 
                      FROM jurnal 
                     WHERE user = 'lutfi' AND coa_id = '111' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showKasBeban($bulan, $tahun) {
        $query   = " SELECT SUM(nominal) AS beban 
                       FROM jurnal a  
                       JOIN biaya b ON a.coa_id = b.kode_coa
                      WHERE user = 'rina' OR coa_id = '111' AND b.nama_biaya = 'Biaya Operasional'  AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showKasPeralatan($bulan, $tahun) {
        $query   = " SELECT SUM(nominal) AS peralatan 
                       FROM jurnal a  
                      WHERE user = 'rina' AND coa_id = '122'  AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showKasModal($bulan, $tahun) {
        $query   = " SELECT SUM(nominal) AS modal 
                       FROM jurnal a  
                      WHERE user = 'rina' AND coa_id = '311'  AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showKasPrive($bulan, $tahun) {
        $query   = " SELECT SUM(nominal) AS prive 
                       FROM jurnal a  
                      WHERE user = 'rina' AND coa_id = '312'  AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

}