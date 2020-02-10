<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pilihanps extends CI_Model{
	
	function get_pilihan(){
		$query = $this->db->get('tb_pilihan');
		return $query;	
	}

	
	function save_pilihan($kode_usulan,$kode_perusahaan,$dana){
		$data = array(
			
			'kode_usulan'		=> $kode_usulan,
			'kode_perusahaan'	=> $kode_perusahaan,
			'dana' 				=> $dana,
			
		);
		$this->db->insert('tb_pilihan',$data);
	}

	function get_usulan(){
		$this->db->select('kode_usulan,nama_bidang,nama_kegiatan,anggaran,dana,status');
		$this->db->from('tb_pilihan');
		$this->db->join('tb_usulan','tb_usulan.kode_usulan = tb_pilihan.kode_usulan','left');
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