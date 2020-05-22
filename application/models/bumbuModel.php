<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bumbuModel extends CI_Model {

	public function show($id) {
		$this->db->select('*');
        $this->db->from('bahan a');
        $this->db->join('detail_rasa b', 'a.id_bahan = b.bahan_id');
        $this->db->join('rasa c', 'b.rasa_id = c.id_rasa');
        $this->db->where('c.id_rasa', $id);
		return $this->db->get()->result_array();
	}

	public function showBahan($id) {
        $query = "	SELECT id_bahan, kode_bahan, nama_bahan, rasa_id 
					FROM ( 
						SELECT id_bahan, kode_bahan, nama_bahan, 
							(SELECT b.rasa_id FROM detail_rasa b WHERE a.id_bahan = b.bahan_id AND b.rasa_id = '$id' 
							) AS rasa_id 
						FROM bahan a
						WHERE keterangan = 'Bahan Penolong' 
					) A";
		return $this->db->query($query)->result_array();
	}

	public function database($tabel, $id) {
        $this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
        $this->db->set('rasa_id', $id);
        $this->db->set('bahan_id', $_POST['id_bahan']);
        $this->db->insert($tabel);
	}

    public function truncate($tabel, $no) { 
        $this->db->where('no', $no);
        $this->db->delete($tabel);
    }
}