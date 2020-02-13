<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pilihanps extends CI_Model{
	
	function save_pilihan($kode_usulan,$kode_perusahaan,$dana){
		$data = array(
			
			'kode_usulan'		=> $kode_usulan,
			'kode_perusahaan'	=> $kode_perusahaan,
			'dana' 				=> $dana,
			
		);
		$this->db->insert('tb_pilihan',$data);
	}

	// function get_all(){
	// 	$kode_perusahaan = $this->session->userdata('ses_id');
	// 	return $this->db->query("SELECT tb_pilihan.kode_usulan,nama_bidang,nama_sub,nama_kegiatan,
	// 	waktu_mulai,waktu_selesai,anggaran,tb_pilihan.dana,tb_pilihan.status from tb_pilihan
	// 	JOIN tb_usulan ON tb_usulan.kode_usulan = tb_pilihan.kode_usulan JOIN tb_bidang 
	// 	ON tb_bidang.kode_bidang = tb_usulan.kode_bidang JOIN tb_subbidang ON 
	// 	tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang  WHERE 
	// 	tb_pilihan.kode_perusahaan =  $kode_perusahaan");
	// }

	function get_usulan(){
		$this->db->select('kode_usulan,nama_bidang,nama_sub,tahun_pengusulan,nama_kegiatan,waktu_mulai,
		waktu_selesai,anggaran,alamat_kegiatan,nama_kecamatan,desa,deskripsi,
		nama_institusi,alamat_institusi,nama_k,nama_d,nama_pengusul,no_telp,file');
		$this->db->from('tb_usulan');
		$this->db->join('tb_bidang','tb_bidang.kode_bidang = tb_usulan.kode_bidang','left');
		$this->db->join('tb_subbidang','tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang','left');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan','left');
		$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah','left');
		$this->db->join('tb_k','tb_k.kode_k = tb_usulan.kode_k','left');
		$this->db->join('tb_w','tb_w.kode_w = tb_usulan.kode_w','left');
		$this->db->order_by("kode_usulan", "asc");
		$this->db->where("status_usulan", 0);
		$query = $this->db->get();
		return $query;
	}
	function get_pilihan(){
		$kode_perusahaan = $this->session->userdata('ses_id');
		return $this->db->query("SELECT tb_pilihan.kode_usulan,nama_bidang,nama_sub,nama_kegiatan,
		waktu_mulai,waktu_selesai,anggaran,tb_pilihan.dana,tb_pilihan.status_perusahaan
		from tb_pilihan
		JOIN tb_usulan ON tb_usulan.kode_usulan = tb_pilihan.kode_usulan
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang
		JOIN tb_subbidang ON tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang 
		WHERE tb_pilihan.kode_perusahaan =  $kode_perusahaan");
	}


	//Delete usulan
	function delete_pengguna($id){
		$this->db->delete('tbu_kecamatan', array('id' => $id));
	}

	
}