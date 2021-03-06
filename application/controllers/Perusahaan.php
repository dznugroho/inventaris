<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Perusahaan','m_perusahaan');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		if($this->session->userdata('akses')!='1') redirect('dashboard');
	}

	function index(){
		$data['perusahaan'] = $this->m_perusahaan->get_perusahaan();
		$this->load->view('perusahaan/daftar_perusahaan',$data);
	}

	// add new usulan
	function add_new(){
		$data['kode_kecamatan'] = $this->m_perusahaan->get_kecamatan()->result();
		$this->load->view('perusahaan/add_data_view', $data);
	}

	// get sub bidang by bidang_id

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_perusahaan->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	//save usulan to database
	function save_perusahaan(){
	
        $id 				= $this->input->post('id',TRUE);
		$username	    	= $this->input->post('username',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
		$nama_perusahaan 	= $this->input->post('nama_perusahaan',TRUE);
		$alamat    			= $this->input->post('alamat',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
		$no_telp 			= $this->input->post('no_telp',TRUE);
        $email				= $this->input->post('email',TRUE);
             
        $this->m_perusahaan->save_perusahaan($id,$username,$password,$level,$nama_perusahaan,
		$alamat,$kode_kecamatan,$kode_wilayah,$no_telp,$email);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Saved</div>');
		redirect('perusahaan');
	}

	function get_edit(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['kode_kecamatan'] = $this->m_perusahaan->get_kecamatan()->result();
		$get_data = $this->m_perusahaan->get_perusahaan_by_id($id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_wilayah'] = $row['kode_wilayah'];

		}
		$this->load->view('perusahaan/ubah_perusahaan',$data);
	}


	function get_data_edit(){
		$id = $this->input->post('id',TRUE);
		$data = $this->m_perusahaan->get_perusahaan_by_id($id)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_perusahaan(){
		$id 				= $this->input->post('id',TRUE);
		$username	    	= $this->input->post('username',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
		$nama_perusahaan 	= $this->input->post('nama_perusahaan',TRUE);
		$alamat    			= $this->input->post('alamat',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
		$no_telp 			= $this->input->post('no_telp',TRUE);
        $email				= $this->input->post('email',TRUE);
        
		$this->m_perusahaan->update_perusahaan($id,$username,$level,$nama_perusahaan,
		$alamat,$kode_kecamatan,$kode_wilayah,$no_telp,$email);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Updated</div>');
		redirect('perusahaan');
	}
	function update_pass(){
		$id 				= $this->input->post('id',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$this->m_perusahaan->changepass($id,$password);
		$this->session->set_flashdata('msg','<div class="alert alert-success">password Updated</div>');
		redirect('perusahaan');
	}
	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_perusahaan->delete_perusahaan($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('perusahaan');
	}
}