<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Admin','M_admin');
		$this->load->library('session');
	}

	function index(){
		$data['admin'] = $this->M_admin->get_usulan();
		$this->load->view('admin/daftar_usulan',$data);
	}

	// add new usulan
	function add_new(){
		
		$data['kode_bidang'] = $this->m_usulan->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulan->get_kecamatan()->result();
		$this->load->view('admin/daftar_usulan', $data);
	}

	// get sub bidang by bidang_id
	function get_sub_bidang(){
		$kode_bidang = $this->input->post('id',TRUE);
		$data = $this->m_usulan->get_sub_bidang($kode_bidang)->result();
		echo json_encode($data);
	}

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_usulan->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	//save usulan to database
	function save_admin(){
		$id	    = $this->input->post('id',TRUE);
		$nama    = $this->input->post('nama',TRUE);
        $username 	= $this->input->post('username',TRUE);
		$password 	    = $this->input->post('password',TRUE);
		$level	    = $this->input->post('level',TRUE);
		
        $this->M_admin->save_admin($id,$nama,$username,$password,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">admin Saved</div>');
		redirect('admin');
	}

	function get_edit(){
		$kode_usulan = $this->uri->segment(3);
		$data['kode_usulan'] = $kode_usulan;
		$data['kode_bidang'] = $this->m_usulan->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulan->get_kecamatan()->result();
		$get_data = $this->m_usulan->get_usulan_by_id($kode_usulan);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_subbidang'] = $row['kode_subbidang'];
			$data['kode_wilayah'] = $row['kode_wilayah'];

		}
		$this->load->view('usulan/ubah_usulan',$data);
	}

	function get_data_edit(){
		$kode_usulan = $this->input->post('kode_usulan',TRUE);
		$data = $this->m_usulan->get_usulan_by_id($kode_usulan)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_usulan(){
		$kode_usulan 	    = $this->input->post('kode_usulan',TRUE);
		$kode_bidang 	    = $this->input->post('kode_bidang',TRUE);
		$kode_subbidang     = $this->input->post('kode_subbidang',TRUE);
        $tahun_pengusulan 	= $this->input->post('tahun_pengusulan',TRUE);
		$nama_kegiatan 	    = $this->input->post('nama_kegiatan',TRUE);
		$waktu_mulai 	    = $this->input->post('waktu_mulai',TRUE);
		$waktu_selesai 	    = $this->input->post('waktu_selesai',TRUE);
		$anggaran 	        = $this->input->post('anggaran',TRUE);
		$alamat_kegiatan    = $this->input->post('alamat_kegiatan',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
		$deskripsi 	    	= $this->input->post('deskripsi',TRUE);
        $nama_institusi 	= $this->input->post('nama_institusi',TRUE);
		$alamat_institusi 	= $this->input->post('alamat_institusi',TRUE);
		$kecamatan_institusi        = $this->input->post('kecamatan_institusi',TRUE);
		$desa_institusi 	    = $this->input->post('desa_institusi',TRUE);
		$nama_pengusul   	= $this->input->post('nama_pengusul',TRUE);
		$no_telp         	= $this->input->post('no_telp',TRUE);
		$file         		= $this->input->post('file',TRUE);
        
		$this->m_usulan->update_usulan($kode_usulan,$kode_bidang,$kode_subbidang,$tahun_pengusulan,$nama_kegiatan,$waktu_mulai,
		$waktu_selesai,$anggaran,$alamat_kegiatan,$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,
		$alamat_institusi,$kecamatan_institusi,$desa_institusi,$nama_pengusul,$no_telp,$file);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Updated</div>');
		redirect('usulan');
	}

	//Delete usulan from Database
	function delete(){
		$kode_usulan = $this->uri->segment(3);
		$this->m_usulan->delete_usulan($kode_usulan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Deleted</div>');
		redirect('usulan');
	}
}