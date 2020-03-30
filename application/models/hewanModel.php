<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class hewanModel extends CI_Model {

		public function show($table) {
			return $this->db->get($table)->result_array();
		}
		public function save($table, $id) {
			$this->db->set('noHewan', $this->modelKu->uuid($table, $id));
			$this->db->set('kodeHewan', "HWN");
			$this->db->set('namaHewan', $_POST['namaHewan']);
			$this->db->set('jenis', $_POST['jenis']);
			$this->db->set('keterangan', $_POST['keterangan']);
			$this->db->insert($table);
		}
		public function edit($table, $id) {
			$this->db->set('namaHewan', $_POST['namaHewan']);
			$this->db->set('jenis', $_POST['jenis']);
			$this->db->set('keterangan', $_POST['keterangan']);
			$this->db->where('noHewan', $id);
			$this->db->update($table);
		}		
	}