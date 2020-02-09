<?php
class M_upload extends CI_Model{

	function simpan_upload($nama,$file){
		$data = array(
	        	'nama' => $nama,
	        	'file' => $file
	       	);  
	    $result= $this->db->insert('coba',$data);
	    return $result;
	}

	
}