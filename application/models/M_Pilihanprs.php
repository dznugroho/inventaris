<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pilihanprs extends CI_Model{
	
	function get_pilihan(){
		$query = $this->db->get('tb_pilihan');
		return $query;	
	}

	
	function save_pilihan($row,$kode_perusahaan){
		$data = array(
			
			'kode_usulan' 	  => $row,
			'kode_perusahaan' => $kode_perusahaan,
		);
		$this->db->insert('tb_pilihan',$data);
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