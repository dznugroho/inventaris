<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Perusahaan extends CI_Model{
	
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
            'password' 		  => $password,
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

	function get_perusahaan(){
		$this->db->select('id,username,password,level,nama_perusahaan,alamat,
		,nama_kecamatan,desa,no_telp,email');
		$this->db->from('tb_perusahaan');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_perusahaan.kode_kecamatan','left');
		$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = tb_perusahaan.kode_wilayah','left');
		$query = $this->db->get();
		return $query;
	}

	function get_perusahaan_by_id($id){
		$query = $this->db->get_where('tb_perusahaan', array('id' =>  $id));
		return $query;
	}

	function update_perusahaan($id,$username,$password,$level,$nama_perusahaan,
	$alamat,$kode_kecamatan,$kode_wilayah,$no_telp,$email){
        $this->db->set('id' 	    , $kode_bidang);
        $this->db->set('username'     , $kode_subbidang);
        $this->db->set('password' 	, $tahun_pengusulan);
		$this->db->set('level' 	    , $nama_kegiatan);            
		$this->db->set('nama_perusahaan' 		, $waktu_mulai);
		$this->db->set('alamat' 		, $waktu_selesai);
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