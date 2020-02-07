<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Admin','m_admin');
		$this->load->library('session');
	}

	function index(){
		$data['admin'] = $this->m_admin->get_admin();
		$this->load->view('admin/daftar_admin',$data);
	}

	// add new admin
	function tambah(){
		
		$this->load->view('admin/tambah_admin');
	}

	//save admin to database
	function save_admin(){
		$id	    = $this->input->post('id',TRUE);
		$nama    = $this->input->post('nama',TRUE);
        $username 	= $this->input->post('username',TRUE);
		$password 	    = $this->input->post('password',TRUE);
		$level	    = $this->input->post('level',TRUE);
		
        $this->m_admin->save_admin($id,$nama,$username,$password,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">admin Saved</div>');
		redirect('admin');
	}

	function get_edit(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$get_data = $this->m_admin->get_admin_by_id($id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();

		}
		$this->load->view('admin/ubah_admin',$data);
	}

	function get_data_edit(){
		$id = $this->input->post('id',TRUE);
		$data = $this->m_admin->get_admin_by_id($id)->result();
		echo json_encode($data);
	}

	//update admin to database
	function update_admin(){
		$id 	    		= $this->input->post('id',TRUE);
		$nama 	    = $this->input->post('nama',TRUE);
		$username     = $this->input->post('username',TRUE);
        $password 	= $this->input->post('password',TRUE);
		$level 	    = $this->input->post('level',TRUE);
        
		$this->m_admin->update_admin($id,$nama,$username,$password,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">admin Updated</div>');
		redirect('admin');
	}

	//Delete admin from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_admin->delete_admin($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">admin Deleted</div>');
		redirect('admin');
	}
}