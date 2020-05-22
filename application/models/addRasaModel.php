<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addRasaModel extends CI_Model {

	public function show($id) {
		$this->db->select('*');
        $this->db->from('rasa a');
        $this->db->join('produk_rasa b', 'a.id_rasa = b.rasa_id');
        $this->db->join('produk c', 'b.produk_id = c.id_produk');
        $this->db->where('c.id_produk', $id);
		return $this->db->get()->result_array();
	}

	public function showRasa($id) { 
        $query = "	SELECT id_rasa, rasa, produk_id 
                    FROM ( 
                        SELECT id_rasa, rasa, 
                            (SELECT b.produk_id FROM produk_rasa b WHERE a.id_rasa = b.rasa_id AND b.produk_id = '$id' 
                            ) AS produk_id 
                        FROM rasa a
                    ) A";            
		return $this->db->query($query)->result_array();
	}

	public function database($tabel, $id) {
        $this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
        $this->db->set('produk_id', $id);
        $this->db->set('rasa_id', $_POST['id_rasa']);
        $this->db->insert($tabel);
	}

    public function truncate($tabel, $no) { 
        $this->db->where('no', $no);
        $this->db->delete($tabel);
    }
}