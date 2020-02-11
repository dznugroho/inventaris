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
		$data['usulan'] = $this->m_pilihanps->get_usulan();
	
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

	

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('pengguna');
	}
}