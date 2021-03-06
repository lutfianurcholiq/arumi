<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produksiModel extends CI_Model {

	public function show() { 
		$this->db->select('id_produksi, kode_produksi, mulai, selesai, id_pesanan, kode_pesanan, total, tanggal, a.status, kode_pelanggan, id_pelanggan, nama_pelanggan');
        $this->db->from('produksi a');
        $this->db->join('pesanan b', 'a.pesanan_id = b.id_pesanan');
        $this->db->join('pelanggan c', 'a.pelanggan_id = c.id_pelanggan');
        // $this->db->where('status', 'Belum Dikirim');
		return $this->db->get()->result_array();
    }

    public function showProduk($id_produksi) {
        $this->db->select('nama_produk, c.bahan_id, c.produk_id, rasa');
        $this->db->from('produksi a');
        $this->db->join('pesanan b', 'a.pesanan_id = b.id_pesanan');
        $this->db->join('bom c', 'b.id_pesanan = c.pesanan_id');
        $this->db->join('produk d', 'c.produk_id = d.id_produk');
        $this->db->join('detail_pesanan e', 'b.id_pesanan = e.pesanan_id');
        $this->db->join('rasa f', 'e.rasa_id = f.id_rasa');
        $this->db->where('id_produksi', $id_produksi);
        $this->db->group_by('c.produk_id');
        return $this->db->get()->result_array();
    }

    public function showKaryawan($id) {
        $query = "	SELECT id_karyawan, kode_karyawan, nama_karyawan, produksi_id 
					FROM ( 
						SELECT id_karyawan, kode_karyawan, nama_karyawan, 
							(SELECT b.produksi_id FROM detail_btkl b WHERE a.id_karyawan = b.karyawan_id AND b.produksi_id = '$id' 
							) AS produksi_id 
						FROM karyawan a
					) A";
		return $this->db->query($query)->result_array();
    }

    public function showBahan($id) {
        $query = "	SELECT id_bahan, kode_bahan, nama_bahan, satuan, produksi_id 
					FROM ( 
						SELECT id_bahan, kode_bahan, satuan, nama_bahan, 
							(SELECT b.produksi_id FROM detail_bp b WHERE a.id_bahan = b.bahan_id AND b.produksi_id = '$id' 
							) AS produksi_id 
						FROM bahan a
						WHERE keterangan = 'Bahan Penolong' 
					) A";
		return $this->db->query($query)->result_array();
	}
    
    public function showBtkl($id) {
		$this->db->select('*');
        $this->db->from('karyawan a');
        $this->db->join('detail_btkl b', 'a.id_karyawan = b.karyawan_id');
        $this->db->where('b.produksi_id', $id);
		return $this->db->get()->result_array();
    }
    
    public function showBp($id) {
		$this->db->select('*, b.harga harga_bahan');
        $this->db->from('bahan a');
        $this->db->join('detail_bp b', 'a.id_bahan = b.bahan_id');
        $this->db->where('b.produksi_id', $id);
        $this->db->where('keterangan', 'Bahan Penolong');
		return $this->db->get()->result_array();
    }
    
    public function showBb($id)
    {
        $this->db->select('e.nama_bahan, d.jumlah, e.satuan, d.harga, a.oh, c.nama_produk, a.bahan_baku');
        $this->db->from('produksi a');
        $this->db->join('detail_pesanan b', 'a.pesanan_id = b.pesanan_id');
        $this->db->join('produk c', 'c.id_produk = b.produk_id');
        $this->db->join('detail_bb d', 'd.produk_id = c.id_produk');
        $this->db->join('bahan e', 'e.id_bahan = d.bahan_id');
        $this->db->where('id_produksi', $id);
        return $this->db->get()->result_array();
    }

    public function showBtk($id)
    {
        $this->db->select('c.nama_karyawan, b.hari_masuk, c.gaji, b.subgaji, a.tenaga_kerja');
        $this->db->from('produksi a');
        $this->db->join('detail_btkl b', 'b.produksi_id = a.id_produksi');
        $this->db->join('karyawan c', 'b.karyawan_id = c.id_karyawan');
        $this->db->where('id_produksi', $id);
        return $this->db->get()->result_array();
    }

    public function showBap($id)
    {
        $this->db->select('nama_bahan, satuan, c.harga, b.jumlah, a.bahan_penolong');
        $this->db->from('produksi a');
        $this->db->join('detail_bp b', 'a.id_produksi = b.produksi_id');
        $this->db->join('bahan c', 'b.bahan_id = c.id_bahan');
        $this->db->where('id_produksi', $id);
        return $this->db->get()->result_array();
    }

    public function showOh($id)
    {
        $this->db->select('oh');
        $this->db->from('produksi');
        $this->db->where('id_produksi', $id);
        return $this->db->get()->result_array();
    }

    public function getOne($tabel, $id) { 
		return $this->db->get_where($tabel, ['id_produksi' => $id])->row_array();
    }
    
    public function getID($id) {
		$this->db->where('id_produksi', $id); 
		return $this->db->get('produksi')->row()->pesanan_id;
	}

    public function chanceStatus($id, $nominal, $action) {
        $id_pesanan = $this->getID($id);
        date_default_timezone_set("Asia/Jakarta");

        $this->db->where('id_produksi', $id);
        if ($action == 'bbb') {
            $this->db->set('status', 'Sudah Dibeli');
            $this->db->set('bahan_baku', $nominal);
            $this->db->update('produksi');
    
            $this->db->where('produksi_id', $id);
            $this->db->set('status', 'Sudah Dibeli');
            $this->db->update('bom');

            $keterangan = "User Produksi sudah melakukan Tahap Pertama.";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');

            $keterangan = "Pesanan sedang di Tahap Kedua (memilih karyawan).";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');
        }
        elseif ($action == 'btkl') {
            $oh = $nominal * 0.3;
            $this->db->set('status', 'Sudah Milih Karyawan');
            $this->db->set('tenaga_kerja', $nominal);
            $this->db->set('oh', $oh);
            $this->db->update('produksi');

            $keterangan = "User Produksi sudah melakukan Tahap Kedua.";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');

            $keterangan = "Pesanan sedang di Tahap Ketiga (memilih bahan penolong).";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');
        }
        elseif ($action == 'bp') {
            $this->db->set('status', 'Sudah Jadi');
            $this->db->set('selesai', date('Y-m-d'));
            $this->db->set('bahan_penolong', $nominal);
            $this->db->update('produksi');
    
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->set('status', 'Sudah Jadi');
            $this->db->update('pesanan');

            $keterangan = "User Produksi sudah menyelesaikan Tahap Ketiga.";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');

            $keterangan = "Pesanan siap diantar.";
            $this->db->set('no', $this->modelKu->uuid('timeline', 'no'));
            $this->db->set('pesanan_id', $id_pesanan);
            $this->db->set('kode_pesanan', 'PSN');
            $this->db->set('tanggal', date('Y-m-d'));
            $this->db->set('jam', date('H:i:s'));
            $this->db->set('keterangan', $keterangan);
            $this->db->insert('timeline');
        }
    }

    public function getGaji($id) {
		$this->db->where('id_karyawan', $id); 
		return $this->db->get('karyawan')->row()->gaji;
	}

	public function selectPeople($tabel, $action, $id) {
		$gaji = $this->getGaji($_POST['id_karyawan']);
		$this->db->set('hari_masuk', $_POST['jumlah']); 
		$this->db->set('gaji', $gaji); 
		$this->db->set('subgaji', $gaji * $_POST['jumlah']); 
        
        if ($action == 'insert') {
			$this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
            $this->db->set('produksi_id', $id);
            $this->db->set('karyawan_id', $_POST['id_karyawan']);
            $this->db->insert($tabel);
		}
		else {
            $this->db->where('no', $_POST['no']); 
            $this->db->update($tabel);
		}
    }

    public function truncateBtkl($tabel, $no) {
        $this->db->where('no', $no);
        $this->db->delete($tabel);
    }

    public function getHarga($id) {
		$this->db->where('id_bahan', $id); 
		return $this->db->get('bahan')->row()->harga;
	}

    public function selectBahan($tabel, $action, $id) {
		$harga = $this->getHarga($_POST['id_bahan']);
		$this->db->set('jumlah', $_POST['jumlah']); 
		$this->db->set('harga', $harga); 
		$this->db->set('subtotal', $harga * $_POST['jumlah']); 
        
        if ($action == 'insert') {
			$this->db->set('no', $this->modelKu->uuid($tabel, 'no'));
            $this->db->set('produksi_id', $id);
            $this->db->set('bahan_id', $_POST['id_bahan']);
            $this->db->insert($tabel);
		}
		else {
            $this->db->where('no', $_POST['no']); 
            $this->db->update($tabel);
		}
    }

    public function truncateBop($tabel, $no) {
        $this->db->where('no', $no);
        $this->db->delete($tabel);
    }

    public function getBahan($id) {
        $this->db->from('produksi a');
        $this->db->join('detail_pesanan b', 'a.pesanan_id = b.pesanan_id');
        $this->db->join('detail_pesanan b', 'a.pesanan_id = b.pesanan_id');
    }
}