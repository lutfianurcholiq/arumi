<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bomModel extends CI_Model {

	public function show($id) {
		$this->db->select('*, a.satuan satuan_bahan ');
        $this->db->from('bahan a');
        $this->db->join('detail_bb b', 'a.id_bahan = b.bahan_id');
        $this->db->join('produk c', 'b.produk_id = c.id_produk');
        $this->db->where('c.id_produk', $id);
		return $this->db->get()->result_array();
	}

	public function showBahan($id) {
        $query = "	SELECT id_bahan, kode_bahan, nama_bahan, produk_id 
					FROM ( 
						SELECT id_bahan, kode_bahan, nama_bahan, 
							(SELECT b.produk_id FROM detail_bb b WHERE a.id_bahan = b.bahan_id AND b.produk_id = '$id' 
							) AS produk_id 
						FROM bahan a
						WHERE keterangan = 'Bahan Baku' 
					) A";
		return $this->db->query($query)->result_array();
	}

	public function showBom($id) {
		$this->db->select('c.bahan_id, d.nama_bahan, c.jumlah, c.harga, c.subtotal, c.produk_id, b.jumlah qty');
        $this->db->from('pesanan a');
        $this->db->join('detail_pesanan b', 'a.id_pesanan = b.pesanan_id');
        $this->db->join('detail_bb c', 'b.produk_id = c.produk_id');
        $this->db->join('bahan d', 'c.bahan_id = d.id_bahan');
        $this->db->where('id_pesanan', $id);
		return $this->db->get()->result_array();
	}

	public function getHarga($id) {
		$this->db->where('id_bahan', $id); 
		return $this->db->get('bahan')->row()->harga;
	}

	public function database($tabel, $id, $no) {
		$harga = $this->getHarga($_POST['id_bahan']);
		$this->db->set('jumlah', $_POST['jumlah']); 
		$this->db->set('harga', $harga); 
		$this->db->set('subtotal', $harga * $_POST['jumlah']); 
        
        if ($no == 'no_id_bahan') {
			$this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
            $this->db->set('produk_id', $id);
            $this->db->set('bahan_id', $_POST['id_bahan']);
            $this->db->insert($tabel);
		}
		else {
			$this->db->where('no', $no); 
            $this->db->update($tabel);
		}
	}
	
	public function getOne($no) { 
        $this->db->select('*');
        $this->db->from('bahan a');
        $this->db->join('detail_bb b', 'a.id_bahan = b.bahan_id');
        $this->db->where('no', $no);
        return $this->db->get()->row_array();
    }

    public function truncate($tabel, $no) { 
        $this->db->where('no', $no);
        $this->db->delete($tabel);
    }
}