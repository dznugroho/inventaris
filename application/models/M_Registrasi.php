<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrasi extends CI_Model{
	
	public function all()
	{
		return $this->db->query("SELECT * from tb_usulan
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang JOIN tb_subbidang ON 
		tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang JOIN tb_kecamatan ON 
		tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan JOIN tb_wilayah ON
		tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah");
	}

	public function cekid($kode_usulan)
    {
        return $this->db->where('kode_usulan', $kode_usulan)->get('tb_usulan');
    }

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
	
	function regist($NIK,$nama_depan,$nama_belakang,$email,$username,$password,
	$alamat,$kode_kecamatan,$kode_wilayah,$foto){
		
		$data = array(
			
            'NIK' 	    		=> $NIK,
            'nama_depan'    	=> $nama_depan,
            'nama_belakang' 	=> $nama_belakang,
            'username' 			=> $username,
            'password' 			=> MD5($password),
			'alamat' 			=> $alamat,
			'kode_kecamatan' 	=> $kode_kecamatan,
			'kode_wilayah' 		=> $kode_wilayah,
            'email' 			=> $email,
			'foto' 				=> $foto
			
		);
		$this->db->insert('registrasi',$data);
		return $result;
	}

	function get_usulan_by_id($kode_usulan){
		$query = $this->db->get_where('tb_usulan', array('kode_usulan' =>  $kode_usulan));
		return $query;
	}

	function update_usulan($data,$kode_usulan){
		$this->db->where('kode_usulan'      , $kode_usulan);
		$this->db->update('tb_usulan',$data);
	}

	//Delete usulan
	function delete_usulan($kode_usulan){
		$this->db->delete('tb_usulan', array('kode_usulan' => $kode_usulan));
	}

	
}