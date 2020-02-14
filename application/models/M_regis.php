<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_regis extends CI_Model{
	
	function get_bidang(){
		$query = $this->db->get('tb_bidang');
		return $query;	
	}

	function get_sub_bidang($kode_bidang){
		$query = $this->db->get_where('tb_subbidang', array('parent_bidang' => $kode_bidang));
		return $query;
	}

	function get_kecamatan(){
		$query = $this->db->get('tb_kecamatan');
		return $query;	
	}


	function get_desa($kode_kecamatan){
		$query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		return $query;
	}
	
	function save_perusahaan($id,$username,$password,$level,$nama_perusahaan,
	$alamat,$kode_kecamatan,$kode_wilayah,$no_telp,$email){
		$data = array(
			
            'id' 	   		  => $id,
            'username'  	  => $username,
            'password' 		  => MD5($password),
            'level' 		  => $level,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat' 		  => $alamat,
            'kode_kecamatan'  => $kode_kecamatan,
            'kode_wilayah' 	  => $kode_wilayah,
			'no_telp' 		  => $no_telp,
			'email' 		  => $email,
		
		);
		$this->db->insert('tb_perusahaan',$data);
	}

	function get_regis(){
		$this->db->select('NIK','nama_depan','nama_belakang','password','email','kode_wilayah','kode_kecamatan','leve');
		$this->db->from('registrasi');
		$query = $this->db->get();
		return $query;
	}

	function get_perusahaan_by_id($id){
		$query = $this->db->get_where('tb_perusahaan', array('id' =>  $id));
		return $query;
	}

	function update_perusahaan($id,$username,$password,$level,$nama_perusahaan,
	$alamat,$kode_kecamatan,$kode_wilayah,$no_telp,$email){
        $this->db->set('id' 	    , $id);
        $this->db->set('username'     , $username);
        $this->db->set('password' 	, MD5($password));
		$this->db->set('level' 	    , $level);            
		$this->db->set('nama_perusahaan' , $nama_perusahaan);
		$this->db->set('alamat' 		, $alamat);
		$this->db->set('kode_kecamatan'		, $kode_kecamatan);
        $this->db->set('kode_wilayah' 	    , $kode_wilayah);
        $this->db->set('no_telp' 	    	, $no_telp);
        $this->db->set('email' 	, $email);
       
		$this->db->update('tb_perusahaan');
	}

	//Delete usulan
	function delete_perusahaan($id){
		$this->db->delete('tb_perusahaan', array('id' => $id));
	}

	
} 