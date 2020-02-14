<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_declined extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Status_usulan','m_status_usulan');
		$this->load->library('session');
	}

	function index(){
		$data['declined'] = $this->m_status_usulan->get_declined();
	
		$this->load->view('usulan/usulan_declined',$data);
	}

	function detail_status(){
		$data['detail_status'] = $this->m_status_usulan->get_detail();

		$this->load->view('usulan/detail_status_declined',$data);
	}

	


	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('pengguna');
	}
}