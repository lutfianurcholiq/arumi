<?php
defined('BASEPATH') or exit('No direct script access allowed');
class labaRugiModel extends CI_Model {

    public function showPendapatan($bulan, $tahun) {
        $query   = " SELECT IF(SUM(nominal) IS NOT NULL, SUM(nominal), 0) AS pendapatan 
                      FROM jurnal 
                     WHERE coa_id = '411' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showBeban($bulan, $tahun) {
        $query = "SELECT nama_coa, nama_biaya, IF(total IS NOT NULL, total, 0) AS total 
                    FROM ( 
                           SELECT nama_coa, nama_biaya,
                                (
                                    SELECT SUM(b.nominal) 
                                      FROM jurnal b 
                                     WHERE a.kode_coa = b.coa_id AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'
                                ) AS total 
                            FROM coa a
                    JOIN biaya c ON a.kode_coa = c.kode_coa
                   WHERE nama_biaya = 'Biaya Operasional' OR nama_biaya = 'Biaya Administrasi & Umum'
                    ) A";
        return $this->db->query($query)->result_array();
    }

    public function showHpp($bulan, $tahun) {
        $query   = " SELECT IF(SUM(nominal) IS NOT NULL, SUM(nominal), 0) AS hpp 
                      FROM jurnal 
                     WHERE coa_id = '501' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }

    public function showPendapatanLainLain($bulan, $tahun) {
        $query   = " SELECT IF(SUM(nominal) IS NOT NULL, SUM(nominal), 0) AS pendapatan_lain 
                      FROM jurnal 
                     WHERE coa_id = '412' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ";
        return $this->db->query($query)->row_array();
    }
}