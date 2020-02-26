<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Kecamatan','m_kecamatan');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		if($this->session->userdata('akses')!='1') redirect('dashboard');
		
	}

	function index(){
		$data['kecamatan'] = $this->m_kecamatan->get_datakecamatan();
		$this->load->view('kecamatan/daftar_kecamatan',$data);
	}

	// add new usulan
	function add_new(){
		$data['kode_kecamatan'] = $this->m_kecamatan->get_kecamatan()->result();
		$this->load->view('kecamatan/add_data', $data);
	}

	// get sub bkode_kang by bkode_kang_kode_k

	function get_desa(){
		$kode_kecamatan = $this->input->post('kode_k',TRUE);
		$data = $this->m_kecamatan->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	//save usulan to database
	function save_kecamatan(){
	
		$kode_k 			= $this->input->post('kode_k',TRUE);
		$nama_k				= $this->input->post('nama_k',TRUE);
		$username	    	= $this->input->post('username',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$alamat	   	 		= $this->input->post('alamat',TRUE);
		$email_kec	   	 	= $this->input->post('email_kec',TRUE);
		$no_telp_kec	   	= $this->input->post('no_telp_kec',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
	
             
        $this->m_kecamatan->save_kecamatan($kode_k,$nama_k,$username,$password,$alamat,$email_kec,
        	$no_telp_kec,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Saved</div>');
		redirect('kecamatan');
	}

	function get_edit(){
		$kode_k = $this->uri->segment(3);
		$data['kode_k'] = $kode_k;
		$data['kode_kecamatan'] = $this->m_kecamatan->get_kecamatan()->result();
		$get_data = $this->m_kecamatan->get_kecamatan_by_id($kode_k);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();

		}
		$this->load->view('kecamatan/ubah_kecamatan',$data);
	}

	function get_data_edit(){
		$kode_k = $this->input->post('kode_k',TRUE);
		$data = $this->m_kecamatan->get_kecamatan_by_id($kode_k)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_kecamatan(){

		$kode_k 			= $this->input->post('kode_k',TRUE);
		$nama_k				= $this->input->post('nama_k',TRUE);
		$username	    	= $this->input->post('username',TRUE);
		$alamat	   	 		= $this->input->post('alamat',TRUE);
		$email_kec	   	 	= $this->input->post('email_kec',TRUE);
		$no_telp_kec	   	= $this->input->post('no_telp_kec',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
        
		$this->m_kecamatan->update_kecamatan($kode_k,$nama_k,$username,$password,$alamat,$email_kec,
        	$no_telp_kec,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Updated</div>');
		redirect('kecamatan');
	}
	function update_pass(){

		$kode_k 			= $this->input->post('kode_k',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);       
		$this->m_kecamatan->changepass($kode_k,$password);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Updated</div>');
		redirect('kecamatan');
	}

	//Delete usulan from Database
	function delete(){
		$kode_k = $this->uri->segment(3);
		$this->m_kecamatan->delete_kecamatan($kode_k);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Kecamatan Deleted</div>');
		redirect('kecamatan');
	}
}