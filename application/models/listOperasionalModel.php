<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class listOperasionalModel extends CI_Model {

    public function show($id) {
		$this->db->select('*');
        $this->db->from('coa a');
        $this->db->join('detail_operasional b', 'a.kode_coa = b.coa_id');
        $this->db->join('operasional c', 'b.operasional_id = c.id_operasional');
        $this->db->where('c.id_operasional', $id);
		return $this->db->get()->result_array();
    }

    public function showCoa($id) { 
        $sql =  "SELECT a.kode_coa, nama_coa, operasional_id 
				   FROM ( 
						SELECT a.kode_coa, nama_coa, (
								SELECT b.operasional_id 
								  FROM detail_operasional b 
								 WHERE a.kode_coa = b.coa_id  AND b.operasional_id = '$id'
						) AS operasional_id 
				        FROM coa a
                        JOIN biaya c 
                          ON a.kode_coa = c.kode_coa
                       WHERE a.header_coa = 5 
                         AND c.nama_biaya != 'Biaya Produksi'
				) A";
		return $this->db->query($sql)->result_array();
    }
    
    public function database($tabel, $id, $no) {
        $this->db->set('nominal', $_POST['nominal']);
        
        if ($no == 'coa_id') {
            $this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
            $this->db->set('operasional_id', $id);
            $this->db->set('coa_id', $_POST['id_coa']);
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->insert($tabel);
		}
		else {
            $this->db->where('no', $no); 
            $this->db->update($tabel);
		}
    } 
    
    public function getOne($no) { 
        $this->db->select('*');
        $this->db->from('coa a');
        $this->db->join('detail_operasional b', 'a.kode_coa = b.coa_id');
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
        $this->db->where('id_operasional', $id);
        $this->db->update($tabel);
    }
}