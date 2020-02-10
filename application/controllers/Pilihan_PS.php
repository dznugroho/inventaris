<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan_PS extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Pilihanps','m_pilihanps');
		$this->load->model('M_Usulan','m_usulan');
		$this->load->library('session');
	}

	function index(){
		$data['usulan'] = $this->m_usulan->get_usulan();
	
		$this->load->view('perusahaan/pilih_kegiatan',$data);
	}

	function input(){
		$kode_usulan = $this->uri->segment(3);
		$data['kode_usulan'] = $kode_usulan;
		$data['kode_perusahaan'] = $this->session->userdata('ses_id');
		$this->load->view('perusahaan/input_dana',$data);
	}
	//save usulan to database
	function save_pilihan(){

		$kode_usulan 		= $this->input->post('kode_usulan',TRUE);
		$kode_perusahaan	= $this->input->post('kode_perusahaan',TRUE);
		$dana	   	 		= $this->input->post('dana',TRUE);

		$this->m_pilihanps->save_pilihan($kode_usulan,$kode_perusahaan,$dana);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Saved</div>');
		redirect('pilihan_ps');
	}

	function get_edit(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['kode_kecamatan'] = $this->m_pengguna->get_kecamatan()->result();
		$get_data = $this->m_pengguna->get_pengguna_by_id($id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();

		}
		$this->load->view('pengguna/ubah_pengguna',$data);
	}

	function get_data_edit(){
		$id = $this->input->post('id',TRUE);
		$data = $this->m_pengguna->get_pengguna_by_id($id)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_pengguna(){
	
		$nama 				= $this->input->post('nama',TRUE);
		$kode_kecamatan	    = $this->input->post('kode_kecamatan',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
	
        
		$this->m_pengguna->update_pengguna($id,$nama,$kode_kecamatan,$password,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Pengguna Updated</div>');
		redirect('pengguna');
	}

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('pengguna');
	}
}