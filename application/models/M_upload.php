<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload extends CI_Model{
	
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
	
	function get_umum(){
		$this->db->select('id_umum,NIK,nama_depan,username,password,alamat,no_telpp,
		nama_kecamatan,desa,email,nama_akses,foto');
		$this->db->from('registrasi');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = registrasi.kode_kecamatan','left');
		$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = registrasi.kode_wilayah','left');
		$this->db->join('akses','akses.id_akses = registrasi.level','left');
		$array = array('level' => 2);
		$this->db->where($array);
		$this->db->order_by('id_umum','ASC');
		$query = $this->db->get();
		return $query;
	}
	function get_detail(){
		$id_umum = $this->uri->segment(3);
		$this->db->select('id_umum,NIK,nama_depan,username,password,alamat,no_telpp,
		nama_kecamatan,desa,email,nama_akses,level,foto');
		$this->db->from('registrasi');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = registrasi.kode_kecamatan','left');
		$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = registrasi.kode_wilayah','left');
		$this->db->join('akses','akses.id_akses = registrasi.level','left');
		$this->db->where('registrasi.id_umum',$id_umum);
		$this->db->order_by('registrasi.id_umum','ASC');
		$query = $this->db->get();
		return $query;
	}

	function get_regist(){
		$this->db->select('id_umum,NIK,nama_depan,username,password,alamat,no_telpp,
		nama_kecamatan,desa,email,level,foto');
		$this->db->from('registrasi');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = registrasi.kode_kecamatan','left');
		$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = registrasi.kode_wilayah','left');
		$array = array('level' => 0);
		$this->db->where($array);
		$query = $this->db->get();
		return $query;
	}
	

	function simpan_upload($NIK,$nama_depan,$username,$password,
    $alamat,$no_telpp,$kode_kecamatan,$kode_wilayah,$email,$level,$image){
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
            'level' 			=> $level,
			'foto' 				=> $image
		
		);
		$this->db->insert('registrasi',$data);
	}


	function get_umum_by_id($id_umum){
		$query = $this->db->get_where('registrasi', array('id_umum' =>  $id_umum));
		return $query;
	}

	function update($id_umum,$NIK,$nama_depan,$username,
    $alamat,$no_telpp,$kode_kecamatan,$kode_wilayah,$email,$level,$image){

        $this->db->set('NIK'     , $NIK);
        $this->db->set('nama_depan'     , $nama_depan);
        $this->db->set('username'     , $username);
		$this->db->set('alamat' 		, $alamat);
		$this->db->set('no_telpp' 		, $no_telpp);
		$this->db->set('kode_kecamatan'		, $kode_kecamatan);
        $this->db->set('kode_wilayah' 	    , $kode_wilayah);
        $this->db->set('email' 	, $email);
        $this->db->set('level' 	, $level);
        $this->db->set('foto' 	, $image);
		$this->db->where('id_umum' 	, $id_umum);
		$this->db->update('registrasi');
	}

	function changepass($id_umum,$password){
		$this->db->set('password' , MD5($password));
		$this->db->where('id_umum' 	, $id_umum);
		$this->db->update('registrasi');
	}

	function cancel($data,$id_umum){
		$pilihan=$this->db->select("id_umum")->from('registrasi')->where("id_umum",$id_umum)->get()->row();
		
		$this->db->where("id_umum",$id_umum);
        $this->db->update('registrasi',$data);
        return $pilihan->id_umum;  
    }

    function confirm($data,$id_umum){
		$pilihan=$this->db->select("id_umum")->from('registrasi')->where("id_umum",$id_umum)->get()->row();
		
		$this->db->where("id_umum",$id_umum);
        $this->db->update('registrasi',$data);
        return $pilihan->id_umum;  		
    }


	//Delete usulan
	function delete_umum($id_umum){
		$this->db->delete('registrasi', array('id_umum' => $id_umum));
	}

	
} 