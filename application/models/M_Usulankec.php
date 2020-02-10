z<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Usulankec extends CI_Model{
	
	public function all()
	{
		return $this->db->query("SELECT * from tb_usulan
		JOIN tb_bidang ON tb_bidang.kode_bidang = tb_usulan.kode_bidang JOIN tb_subbidang ON 
		tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang JOIN tb_kecamatan ON 
		tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan JOIN tb_wilayah ON
		tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah");
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
	
	function save_usulankec($kode_bidang,$kode_subbidang,$tahun_pengusulan,$nama_kegiatan,$waktu_mulai,
	$waktu_selesai,$anggaran,$alamat_kegiatan,$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,
	$alamat_institusi,$kecamatan_institusi,$desa_institusi,$nama_pengusul,$no_telp,$file){
		$data = array(
			
            'kode_bidang' 	    => $kode_bidang,
            'kode_subbidang'    => $kode_subbidang,
            'tahun_pengusulan' 	=> $tahun_pengusulan,
            'nama_kegiatan' 	=> $nama_kegiatan,
            'waktu_mulai' 		=> $waktu_mulai,
            'waktu_selesai' 	=> $waktu_selesai,
            'anggaran' 	        => $anggaran,
            'alamat_kegiatan'   => $alamat_kegiatan,
            'kode_kecamatan' 	=> $kode_kecamatan,
            'kode_wilayah' 	    => $kode_wilayah,
            'deskripsi' 		=> $deskripsi,
            'nama_institusi' 	=> $nama_institusi,
            'alamat_institusi' 	=> $alamat_institusi,
            'kecamatan_institusi'  => $kecamatan_institusi,
            'desa_institusi' 	=> $desa_institusi,
            'nama_pengusul'   	=> $nama_pengusul,
			'no_telp'         	=> $no_telp,
            'file' 				=> $file
			
		);
		$this->db->insert('tb_usulan',$data);
	}

	function get_usulankec(){
		$this->db->select('kode_usulan,nama_bidang,nama_sub,tahun_pengusulan,nama_kegiatan,waktu_mulai,
		waktu_selesai,anggaran,alamat_kegiatan,nama_kecamatan,desa,deskripsi,
		nama_institusi,alamat_institusi,kecamatan_institusi,desa_institusi,
		nama_pengusul,no_telp,file');
		$this->db->from('tb_usulan');
		$this->db->join('tb_bidang','tb_bidang.kode_bidang = tb_usulan.kode_bidang','left');
		$this->db->join('tb_subbidang','tb_subbidang.kode_subbidang = tb_usulan.kode_subbidang','left');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_usulan.kode_kecamatan','left');
		$this->db->join('tb_wilayah','tb_wilayah.kode_wilayah = tb_usulan.kode_wilayah','left');
		$query = $this->db->get();
		return $query;
	}

	function get_usulankec_by_id($kode_usulan){
		$query = $this->db->get_where('tb_usulan', array('kode_usulan' =>  $kode_usulan));
		return $query;
	}

	function update_usulankec($kode_usulan,$kode_bidang,$kode_subbidang,$tahun_pengusulan,$nama_kegiatan,$waktu_mulai,
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
	function delete_usulankec($kode_usulan){
		$this->db->delete('tb_usulan', array('kode_usulan' => $kode_usulan));
	}

	
}