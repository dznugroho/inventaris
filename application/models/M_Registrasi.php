<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrasi extends CI_Model{
	
	function get_kecamatan(){
		$query = $this->db->get('tb_kecamatan');
		return $query;	
	}

	function get_desa($kode_kecamatan){
		$query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		return $query;
	}
	
	function regist($NIK,$nama_depan,$username,$password,
	$alamat,$no_telpp,$email, $kode_kecamatan,$kode_wilayah,$image){
		
		$data = array(
			
            'NIK' 	    		=> $NIK,
            'nama_depan'    	=> $nama_depan,
            'username' 			=> $username,
            'password' 			=> MD5($password),
			'alamat' 			=> $alamat,
			'no_telpp' 			=> $no_telpp,
			'kode_kecamatan' 	=> $kode_kecamatan,
			'kode_wilayah' 		=> $kode_wilayah,
            'email' 			=> $email,
			'foto' 				=> $image
			
		);
		$this->db->insert('registrasi',$data);
		return $result;
	}

	function get_usulan_by_id($kode_usulan){
		$query = $this->db->get_where('tb_usulan', array('kode_usulan' =>  $kode_usulan));
		return $query;
	}

	
}