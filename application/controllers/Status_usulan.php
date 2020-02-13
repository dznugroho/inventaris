<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_usulan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Status_usulan','m_status_usulan');
		$this->load->model('M_Usulan','m_usulan');
		$this->load->library('session');
	}

	function index(){
		$data['usulan'] = $this->m_status_usulan->get_pilihan();
	
		$this->load->view('usulan/status_usulan',$data);
	}

	function detail_pilihan(){
		$data['detail_pilihan'] = $this->m_status_usulan->get_detail();

		$this->load->view('usulan/detail_status_usulan',$data);
	}


	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('pengguna');
	}
}