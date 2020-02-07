<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Wilayah extends CI_Model{
	
	function get_kecamatan(){
		$query = $this->db->get('tb_kecamatan');
		return $query;	
    }

    function get_nama($kode_kecamatan){
		$query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		return $query;
	}
	
	function save_wilayah($kode_wilayah,$desa,$kabupaten,$provinsi,$kode_kecamatan_wilayah){
		$data = array(
			
            'kode_wilayah' 	            => $kode_wilayah,
            'desa'                      => $desa,
            'kabupaten' 	            => $kabupaten,
            'provinsi' 	                => $provinsi,
            'kode_kecamatan_wilayah'    => $kode_kecamatan_wilayah,

			
		);
		$this->db->insert('tb_wilayah',$data);
	}

	function get_wilayah(){
		$this->db->select('kode_wilayah,desa,nama_kecamatan,kabupaten,provinsi');
		$this->db->from('tb_wilayah');
		$this->db->join('tb_kecamatan','tb_kecamatan.kode_kecamatan = tb_wilayah.kode_kecamatan_wilayah','left');
		$query = $this->db->get();
		return $query;
	}

	function get_wilayah_by_id($kode_wilayah){
		$query = $this->db->get_where('tb_wilayah', array('kode_wilayah' =>  $kode_wilayah));
		return $query;
    }

	function update_wilayah($kode_wilayah,$desa,$kabupaten,$provinsi,$kode_kecamatan_wilayah){
        $this->db->set('desa' 	    			, $desa);
        $this->db->set('kabupaten'     			, $kabupaten);
        $this->db->set('provinsi' 				, $provinsi);
		$this->db->set('kode_lecamatan_wilayah'	, $kode_kecamatan_wilayah);
		$this->db->where('kode_wilayah'      	, $kode_wilayah);
		$this->db->update('tb_wilayah');
	}

	//Delete wilayah
	function delete_wilayah($kode_wilayah){
		$this->db->delete('tb_wilayah', array('kode_wilayah' => $kode_wilayah));
	}

	
}