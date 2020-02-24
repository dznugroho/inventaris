<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Coba extends CI_Model{
	
	function get_kecamatan(){
		$query = $this->db->get('tb_kecamatan');
		return $query;	
	}

	function get_desa($kode_kecamatan){
		$query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		return $query;
	}
	
	function regist($NIK,$nama,$username,$email,$password,$kode_kecamatan,$kode_wilayah){
		
		$data = array(
			
            'NIK' 	    		=> $NIK,
            'nama'    			=> $nama,
			'username'			=> $username,
			'email' 			=> $email,
			'password' 			=> MD5($password),
			'kode_kecamatan' 	=> $kode_kecamatan,
			'kode_wilayah' 		=> $kode_wilayah
			
		);
		$this->db->insert('jajal',$data);
		return $result;
	}

}