<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Confirm extends CI_Model{
	
	function save_pilihan($kode_usulan,$kode_perusahaan,$dana){
		$data = array(
			
			'kode_usulan'		=> $kode_usulan,
			'kode_perusahaan'	=> $kode_perusahaan,
			'dana' 				=> $dana,
			
		);
		$this->db->insert('tb_pilihan',$data);
	}

	function cancel($data,$id){
		$pilihan=$this->db->select("kode_usulan,kode_perusahaan,kode_pilih")->from('tb_pilihan')->where("kode_pilih",$id)->get()->row();
		
		$this->db->where("kode_pilih",$id);
        $this->db->update('tb_pilihan',$data);
        return $pilihan->kode_pilih;  
    }

    function confirm($data,$id){
		$pilihan=$this->db->select("kode_usulan,kode_perusahaan,kode_pilih")->from('tb_pilihan')->where("kode_pilih",$id)->get()->row();
		
		$this->db->query("Update tb_usulan set status_usulan=1 where kode_usulan='".$pilihan->kode_usulan."'",FALSE);
		$this->db->where("kode_pilih",$id);
        $this->db->update('tb_pilihan',$data);
        return $pilihan->kode_pilih;  		
    }

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
		$query = $this->db->get();
		return $query;
	}

	function get_pilihan(){
		$kode_perusahaan = 'kode_perusahaan';
		return $this->db->query("SELECT tb_pilihan.kode_pilih,tb_pilihan.kode_usulan,nama_bidang,nama_sub,nama_kegiatan,
		waktu_mulai,waktu_selesai,anggaran,nama_perusahaan,tb_pilihan.dana,tb_usulan.status_usulan,
		tb_pilihan.status_perusahaan
		from tb_pilihan
		JOIN tb_usulan ON tb_usulan.kode_usulan = tb_pilihan.kode_usulan 
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang 
		JOIN tb_subbidang ON tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang 
		JOIN tb_perusahaan ON tb_perusahaan.id = tb_pilihan.kode_perusahaan 
		WHERE status_perusahaan = 0 ORDER BY tb_pilihan.kode_usulan ASC");
	}

	
}