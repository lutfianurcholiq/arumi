<?php
defined('BASEPATH') or exit('No direct script access allowed');
class listPeralatanModel extends CI_Model {

    public function show($id) {
        $this->db->select('*');
        $this->db->from('peralatan a');
        $this->db->join('detail_transaksi_peralatan b', 'a.id_peralatan = b.peralatan_id');
        $this->db->where('b.transaksi_id', $id);
        return $this->db->get()->result_array();
    }

    public function showPeralatan($id) {
        $sql =  "SELECT id_peralatan, nama_peralatan, transaksi_id 
				   FROM ( 
						SELECT id_peralatan, nama_peralatan, (
								SELECT b.transaksi_id 
								  FROM detail_transaksi_peralatan b 
								 WHERE a.id_peralatan = b.peralatan_id  AND b.transaksi_id = '$id'
						) AS transaksi_id 
				        FROM peralatan a
				) A";
        return $this->db->query($sql)->result_array();
    }

    public function database($tabel, $id, $no) {
        $this->db->set('nominal', $_POST['nominal']);

        if ($no == 'insert') {
            $this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
            $this->db->set('transaksi_id', $id);
            $this->db->set('peralatan_id', $_POST['id_peralatan']);
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->insert($tabel);
        } else {
            $this->db->where('no', $no);
            $this->db->update($tabel);
        }
    }

    public function getOne($no) {
        $this->db->select('*');
        $this->db->from('peralatan a');
        $this->db->join('detail_transaksi_peralatan b', 'a.id_peralatan = b.peralatan_id');
        $this->db->where('no', $no);
        return $this->db->get()->row_array();
    }

    public function truncate($tabel, $no) {
        $this->db->where('no', $no);
        $this->db->delete($tabel);
    }

    public function finish($tabel, $id) {
        $this->db->set('total', $_POST['total']);
        $this->db->set('status', "Sudah Dibayar");
        $this->db->where('id', $id);
        $this->db->update($tabel);
    }
}
