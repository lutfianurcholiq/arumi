<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelKu extends CI_Model {

	public function uuid($tabel, $id) { 
		$sql = "SELECT $id AS kode FROM $tabel ORDER BY $id DESC LIMIT 1 ";
	    $query	=	$this->db->query($sql);    
	    if($query->num_rows() <> 0){       
	    	$data	=	$query->row();      
	    	$kode	=	intval($data->kode) + 1;     
	    }
	    else {            
	    	$kode	=	1;     
	    }
	    return $kode;  
	  }

	  public function buatKodeTransaksi() {
		$str = "";
	    $characters = array_merge(range('0','9'));
	    $max = count($characters) - 1;
	    for ($i = 0; $i < 10; $i++) {
	        $rand = mt_rand(0, $max);
	        $str  .= $characters[$rand];
	    }
	    return $str;
	}
}