<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model{

    function get_bidang(){
		$query = $this->db->get('tb_bidang');
		return $query;	
	}
	// PUNYANYA CONTROLLER STATUS_ACCEPTED
	function get_accepted(){
		$kode_perusahaan = $this->session->userdata('ses_id');
		return $this->db->query("SELECT kode_pilih,tb_pilihan.kode_usulan,nama_bidang,nama_sub,nama_kegiatan,
		anggaran,nama_perusahaan,alamat,email,tb_pilihan.dana,tb_pilihan.status_perusahaan
		from tb_pilihan
		JOIN tb_usulan ON tb_usulan.kode_usulan = tb_pilihan.kode_usulan
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang
		JOIN tb_subbidang ON tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang
		JOIN tb_perusahaan ON tb_perusahaan.id = tb_pilihan.kode_perusahaan 
		WHERE tb_pilihan.kode_perusahaan =  $kode_perusahaan AND status_usulan = 1 OR status_perusahaan = 1 ");
	}
    function caridata(){
		
		$c = $this->input->POST ('keyword');
		$th = $this->input->POST ('tahun');
		$this->db->like('tb_usulan.kode_bidang', $c);
		$this->db->from('tb_pilihan');
			$this->db->join('tb_usulan','tb_usulan.kode_usulan = tb_pilihan.kode_usulan','left');
			$this->db->join('tb_bidang','tb_bidang.kode_bidang = tb_usulan.kode_bidang','left');
			$this->db->join('tb_subbidang','tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang','left');
			$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan','left');
			$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah','left');
			$this->db->join('tb_k','tb_k.kode_k = tb_usulan.kode_k','left');
			$this->db->join('tb_w','tb_w.kode_w = tb_usulan.kode_w','left');
			$this->db->join('tb_perusahaan','tb_perusahaan.id = tb_pilihan.kode_perusahaan','left');
			$this->db->where('status_perusahaan',1 );
			$this->db->where('tb_usulan.kode_bidang',$c);
			$this->db->where('tb_usulan.tahun_pengusulan',$th);
		$query = $this->db->get();
		return $query; 
	}

	function print(){
		
		$c = $this->input->POST ('key');
		$th = $this->input->POST ('tahun');
		
		$this->db->from('tb_pilihan');
			$this->db->join('tb_usulan','tb_usulan.kode_usulan = tb_pilihan.kode_usulan','left');
			$this->db->join('tb_bidang','tb_bidang.kode_bidang = tb_usulan.kode_bidang','left');
			$this->db->join('tb_subbidang','tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang','left');
			$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan','left');
			$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah','left');
			$this->db->join('tb_k','tb_k.kode_k = tb_usulan.kode_k','left');
			$this->db->join('tb_w','tb_w.kode_w = tb_usulan.kode_w','left');
			$this->db->join('tb_perusahaan','tb_perusahaan.id = tb_pilihan.kode_perusahaan','left');
			$this->db->where('status_perusahaan',1 );
			$this->db->where('kode_bidang',$c);
			$this->db->where('tahun_pengusulan',$th);
		
		$query = $this->db->get();
		return $query; 
	}
	function get_excel_accept(){
		return $this->db->query("SELECT tb_usulan.kode_usulan,nama_bidang,nama_sub,tahun_pengusulan, nama_kegiatan,waktu_mulai,waktu_selesai,anggaran,alamat_kegiatan,nama_kecamatan,desa,
			deskripsi,nama_institusi,alamat_institusi,nama_k,nama_d,nama_pengusul,tb_usulan.no_telp,
			tb_perusahaan.nama_perusahaan,tb_perusahaan.alamat,tb_perusahaan.email, 
			dana,status_perusahaan,no_telp_perusahaan
		FROM tb_pilihan 
		JOIN tb_usulan ON tb_usulan.kode_usulan = tb_pilihan.kode_usulan
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang 
		JOIN tb_subbidang ON tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang 
		JOIN tb_kecamatan ON tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan 
		JOIN tb_wilayah ON tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah 
		JOIN tb_w ON tb_w.kode_w = tb_usulan.kode_w
		JOIN tb_k ON tb_k.kode_k = tb_usulan.kode_k
		JOIN tb_perusahaan ON tb_perusahaan.id = tb_pilihan.kode_perusahaan 
		WHERE tb_pilihan.status_perusahaan = 1");
	}



	// PUNYANYA CONTROLLER STATUS_USULANKEC
	function get_kec_detail(){
		$kode_pilih = $this->uri->segment(3);
		return $this->db->query("SELECT tb_usulan.kode_usulan,nama_bidang,nama_sub,tahun_pengusulan,nama_kegiatan,
		waktu_mulai,waktu_selesai,anggaran,alamat_kegiatan,nama_kecamatan,desa,deskripsi,
		nama_institusi,alamat_institusi,nama_k,nama_d,nama_pengusul,tb_usulan.no_telp,tb_usulan.file,
		tb_perusahaan.nama_perusahaan,tb_perusahaan.alamat,tb_perusahaan.email,dana,status_perusahaan
		FROM tb_pilihan 
		JOIN tb_usulan ON tb_usulan.kode_usulan = tb_pilihan.kode_usulan
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang 
		JOIN tb_subbidang ON tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang 
		JOIN tb_kecamatan ON tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan 
		JOIN tb_wilayah ON tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah 
		JOIN tb_w ON tb_w.kode_w = tb_usulan.kode_w
		JOIN tb_k ON tb_k.kode_k = tb_usulan.kode_k
		JOIN tb_perusahaan ON tb_perusahaan.id = tb_pilihan.kode_perusahaan 
		WHERE tb_pilihan.kode_pilih =  $kode_pilih");
	}
	//Delete usulan
	function delete_riwayat_pilihan($id){
		$this->db->delete('tb_pilihan', array('kode_pilih' => $id));
	}

	
}