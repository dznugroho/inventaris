<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ubahberkas extends CI_Model {
 
   
    public function tampil_data()
	{
		$query = $this->db->get('tb_bidang');
		return $query;
	}
 
	public function tampil_data_chained($id)
	{
		$query = $this->db->query("SELECT * FROM tb_subbidang where parent_bidang = '$id'");
		return $query;
	}

	public function tampil_alamat()
	{
		$query = $this->db->get('tb_wilayah');
		return $query;
	}
 
	public function tampil_alamat_chained($id)
	{
		$query = $this->db->query("SELECT * FROM tb_wilayah where kode_wilayah = '$id'");
		return $query;
    }
    
    function singleBerkas(){
        $kode_berkas=$this->uri->segment(3);
        $this->db->where('kode_berkas',$kode_berkas);
        $data=$this->db->get('tb_berkas');
        return $data->row_array();
    
    }

	function updateBerkas(){
        $kode_berkas=$this->input->post('kode_berkas');
		$data=array(
			'kode_subbidang'		=> $this->input->post('kode_subbidang'),
			'tahun_pengusulan'		=> $this->input->post('tahun_pengusulan'),
			'nama_kegiatan'			=> $this->input->post('nama_kegiatan'),
			'anggaran'				=> $this->input->post('anggaran'),
			'alamat_kegiatan'		=> $this->input->post('alamat_kegiatan'),
			'desa_kegiatan'			=> $this->input->post('desa_kegiatan'),
			'nama_institusi'		=> $this->input->post('nama_institusi'),
			'alamat_institusi'		=> $this->input->post('alamat_institusi'),
			'desa_institusi'		=> $this->input->post('desa_institusi'),
			'nama_pengusul'			=> $this->input->post('nama_pengusul'),
			'no_telp'				=> $this->input->post('no_telp')
	
		);
		$this->db->where('kode_berkas',$kode_berkas);
        $result=$this->db->update('tb_berkas', $data);
        return $result;
	}


}