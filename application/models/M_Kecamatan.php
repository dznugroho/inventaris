<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kecamatan extends CI_Model{
	
	function get_kecamatan(){
		$query = $this->db->get('tb_kecamatan');
		return $query;	
	}

	function get_desa($kode_kecamatan){
		$query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		return $query;
	}
	
	function save_kecamatan($kode_k,$nama_k,$username,$password,$alamat,$email_kec,$no_telp_kec,$level){
		$data = array(
			
			'kode_k'			=> $kode_k,
			'nama_k'			=> $nama_k,
            'username'			=> $username,
            'password'			=> MD5($password),
            'alamat'			=> $alamat,
            'email_kec'			=> $email_kec,
            'no_telp_kec'		=> $no_telp_kec,
            'level'				=> $level
		);
		$this->db->insert('tb_k',$data);
	}

	function get_datakecamatan(){
		$this->db->select('kode_k,nama_k,alamat,no_telp_kec,email_kec,nama_akses');
		$this->db->from('tb_k');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_k.kode_k','left');
		$this->db->join('akses','akses.id_akses = tb_k.level','left');
		$query = $this->db->get();
		return $query;
	}

	function get_kecamatan_by_id($kode_k){
		$query = $this->db->get_where('tb_k', array('kode_k' =>  $kode_k));
		return $query;
	}

	function update_kecamatan($kode_k,$nama_k,$username,$alamat,$email_kec,$no_telp_kec,$level){

		$this->db->set('nama_k' 		, $nama_k);
        $this->db->set('username'		,$username);
        $this->db->set('alamat'			,$alamat);
        $this->db->set('email_kec'		,$email_kec);
        $this->db->set('no_telp_kec'	,$no_telp_kec);
		$this->db->set('level' 	    	, $level);
		$this->db->where('kode_k' 	    , $kode_k);            
		$this->db->update('tb_k');
	}
	function changepass($kode_k,$password){
        $this->db->set('password'		, MD5($password));
		$this->db->where('kode_k' 	    , $kode_k);            
		$this->db->update('tb_k');
	}

	//Delete usulan
	function delete_kecamatan($kode_k){
		$this->db->delete('tb_k', array('kode_k' => $kode_k));
	}

	
}