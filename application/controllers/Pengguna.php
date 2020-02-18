<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Pengguna','m_pengguna');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	}

	function index(){
		if($this->session->userdata('akses')!='1') redirect('dashboard');
		$data['pengguna'] = $this->m_pengguna->get_pengguna();
		$this->load->view('pengguna/daftar_pengguna',$data);
	}

	// add new usulan
	function add_new(){
		$data['kode_kecamatan'] = $this->m_pengguna->get_kecamatan()->result();
		$this->load->view('pengguna/add_data_view', $data);
	}

	// get sub bidang by bidang_id

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_perusahaan->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	//save usulan to database
	function save_pengguna(){
	
		$id 				= $this->input->post('id',TRUE);
		$nama				= $this->input->post('nama',TRUE);
		$kode_kecamatan	    = $this->input->post('kode_kecamatan',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
	
             
        $this->m_pengguna->save_pengguna($id,$nama,$kode_kecamatan,$password,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Saved</div>');
		redirect('pengguna');
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
		$id 				= $this->input->post('id',TRUE);
		$nama 				= $this->input->post('nama',TRUE);
		$kode_kecamatan	    = $this->input->post('kode_kecamatan',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
	
        
		$this->m_pengguna->update_pengguna($id,$nama,$kode_kecamatan,$password,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Updated</div>');
		redirect('pengguna');
	}

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Deleted</div>');
		redirect('pengguna');
	}
}