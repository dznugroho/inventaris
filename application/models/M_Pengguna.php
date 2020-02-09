<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengguna extends CI_Model{
	
	function get_kecamatan(){
		$query = $this->db->get('tb_kecamatan');
		return $query;	
	}

	function get_desa($kode_kecamatan){
		$query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		return $query;
	}
	
	function save_pengguna($id,$nama,$kode_kecamatan,$password,$level){
		$data = array(
			
			'id' 	   		  => $id,
			'nama'     		  => $nama,
            'kode_kecamatan'  => $kode_kecamatan,
            'password' 		  => MD5($password),
            'level' 		  => $level,
		);
		$this->db->insert('tbu_kecamatan',$data);
	}

	function get_pengguna(){
		$this->db->select('id,nama,nama_kecamatan,password,level');
		$this->db->from('tbu_kecamatan');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tbu_kecamatan.kode_kecamatan','left');
		$query = $this->db->get();
		return $query;
	}

	function get_pengguna_by_id($id){
		$query = $this->db->get_where('tbu_kecamatan', array('id' =>  $id));
		return $query;
	}

	function update_pengguna($id,$nama,$kode_kecamatan,$password,$level){

		$this->db->set('nama' 		, $nama);
        $this->db->set('kode_kecamatan',$kode_kecamatan);
        $this->db->set('password' 	, MD5($password));
		$this->db->set('level' 	    , $level);
		$this->db->where('id' 	    , $id);            
		$this->db->update('tbu_kecamatan');
	}

	//Delete usulan
	function delete_pengguna($id){
		$this->db->delete('tbu_kecamatan', array('id' => $id));
	}

	
}