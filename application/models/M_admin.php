<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{
	
	function get_bidang(){
		$query = $this->db->get('tb_bidang');
		return $query;	
	}

	
	function save_admin($id,$nama,$username,$password){
		$data = array(
			
            'id' 	    => $id,
            'nama'    => $nama,
            'username' 	=> $username,
            'password' => $password,
            'level' => $level
            
			
		);
		$this->db->insert('tb_user',$data);
	}

	function get_usulan(){
		$this->db->select('id','nama','username','password','level');
		$this->db->from('tb_user');
		$query = $this->db->get();
		return $query;
	}

	function get_admin_by_id($id){
		$query = $this->db->get_where('tb_user', array('id' => $id ,'nama' => $nama));
		return $query;
	}

	function update_usulan($kode_usulan,$kode_bidang,$kode_subbidang,$tahun_pengusulan,$nama_kegiatan,$waktu_mulai,
	$waktu_selesai,$anggaran,$alamat_kegiatan,$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,
	$alamat_institusi,$kecamatan_institusi,$desa_institusi,$nama_pengusul,$no_telp,$file){
        $this->db->set('kode_bidang' 	    , $kode_bidang);
        $this->db->set('kode_subbidang'     , $kode_subbidang);
        $this->db->set('tahun_pengusulan' 	, $tahun_pengusulan);
		$this->db->set('nama_kegiatan' 	    , $nama_kegiatan);            
		$this->db->set('waktu_mulai' 		, $waktu_mulai);
		$this->db->set('waktu_selesai' 		, $waktu_selesai);
        $this->db->set('anggaran' 	        , $anggaran);
		$this->db->set('alamat_kegiatan'    , $alamat_kegiatan);
		$this->db->set('kode_kecamatan'		, $kode_kecamatan);
        $this->db->set('kode_wilayah' 	    , $kode_wilayah);
        $this->db->set('deskripsi' 	    	, $deskripsi);
        $this->db->set('nama_institusi' 	, $nama_institusi);
        $this->db->set('alamat_institusi' 	, $alamat_institusi);
        $this->db->set('kecamatan_institusi' 	, $kecamatan_institusi);
        $this->db->set('desa_institusi' 	, $desa_institusi);
        $this->db->set('nama_pengusul'   	, $nama_pengusul);
        $this->db->set('no_telp'         	, $no_telp);
        $this->db->set('file' 				, $file);
		$this->db->where('kode_usulan'      , $kode_usulan);
		$this->db->update('tb_usulan');
	}

	//Delete usulan
	function delete_usulan($kode_usulan){
		$this->db->delete('tb_usulan', array('kode_usulan' => $kode_usulan));
	}

	
}