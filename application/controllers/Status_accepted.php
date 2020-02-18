<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_accepted extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Status_usulan','m_status_usulan');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	}

	function index(){
		if($this->session->userdata('akses')!='1') redirect('dashboard');
		$data['accepted'] = $this->m_status_usulan->get_accepted();
	
		$this->load->view('usulan/usulan_accepted',$data);
	}

	function detail_accepted(){
		$data['detail_accepted'] = $this->m_status_usulan->get_detail();

		$this->load->view('usulan/detail_status_accepted',$data);
	}

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('pengguna');
	}
}