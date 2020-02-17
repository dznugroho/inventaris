<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_regis','m_regis');
		$this->load->library('session');
	}

	function index(){
		$data['register'] = $this->m_regis->get_regis();
		$this->load->view('registrasi/daftar_regis',$data);
	}

	// add new usulan
	function add_new(){
		$data['NIK'] = $this->m_regis->get_kecamatan()->result();
		$this->load->view('registrasi/add_product_view', $data);
	}

	// get sub bidang by bidang_id

	function get_desa(){
		$nama_depan = $this->input->post('id',TRUE);
		$data = $this->m_regis->get_desa($nama_depan)->result();
		echo json_encode($data);
	}

	//save usulan to database
	function save_regis(){
	
        $NIK	= $this->input->post('NIK',TRUE);
		$nama_depan	    	= $this->input->post('username',TRUE);
		$password	   	 	= $this->input->post('password',TRUE);
		$level	  		    = $this->input->post('level',TRUE);
		$nama_perusahaan 	= $this->input->post('nama_perusahaan',TRUE);
		$alamat    			= $this->input->post('alamat',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
		$no_telp 	    	= $this->input->post('no_telp',TRUE);
        $email				= $this->input->post('email',TRUE);
             
        $this->m_perusahaan->save_perusahaan($id,$username,$password,$level,$nama_perusahaan,
		$alamat,$kode_kecamatan,$kode_wilayah,$no_telp,$email);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Saved</div>');
		redirect('perusahaan');
	}

	function get_edit(){
		$NIK = $this->uri->segment(3);
		$data['NIK'] = $NIK;
		$data['kode_kecamatan'] = $this->m_regis->get_kecamatan()->result();
		$get_data = $this->m_regis->get_register_by_id($NIK);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_wilayah'] = $row['kode_wilayah'];

		}
		$this->load->view('registrasi/ubah_regis',$data);
	}


	function get_data_edit(){
		$NIK = $this->input->post('NIK',TRUE);
		$data = $this->m_regis->get_register_by_id($NIK)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_register(){
		$NIK 				= $this->input->post('NIK',TRUE);
		$nama_depan	    	= $this->input->post('nama_depan',TRUE);
		$nama_belakang	   	 	= $this->input->post('nama_belakang',TRUE);
		$password	  		    = $this->input->post('password',TRUE);
		$email 				= $this->input->post('email',TRUE);
		$kode_wilayah    	= $this->input->post('kode_wilayah',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$level 	    		= $this->input->post('level',TRUE);

		$this->m_register->update_register($NIK,$nama_depan,$nama_belakang,$password,$email,
		$kode_wilayah,$kode_kecamatan,$level);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Register Updated</div>');
		redirect('register');
	}

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_perusahaan->delete_perusahaan($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('perusahaan');
	}
	function registrasi(){
		$list = $this->m_regis->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$row = array();
			$row[] = $field->NIK;
			$row[] = $field->nama_depan;
			$row[] = $field->nama_belakang;
			$row[] = $field->password;
			$row[] = $field->email;
			$row[] = $field->kode_wilayah;
			$row[] = $field->kode_kecamatan;	       
			$row[] = '<a href="'.base_url().'register/ubah/'.$field->kode_kecamatan.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'register/delete/'.$field->NIK.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_regis->count_all(),
			"recordsFiltered" => $this->_regis->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

}	