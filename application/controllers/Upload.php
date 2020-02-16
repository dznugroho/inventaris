<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_upload','m_upload');
		$this->load->library('session');
	}

	function index(){
		$data['umum'] = $this->m_upload->get_umum();
		$this->load->view('umum/daftar_umum',$data);
	}

	// add new usulan
	function add_new(){
		$data['kode_kecamatan'] = $this->m_upload->get_kecamatan()->result();
		$this->load->view('umum/add_data', $data);
	}

	// get sub bidang by bidang_id

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_upload->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	function do_upload(){
        $config['upload_path']="./images";
		$config['allowed_types']='jpeg|jpg|png';		
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());

	        $NIK 	    		= $this->input->post('NIK',TRUE);
			$nama_depan     	= $this->input->post('nama_depan',TRUE);
			$nama_belakang 		= $this->input->post('nama_belakang',TRUE);
			$username 	    	= $this->input->post('username',TRUE);
			$password 	    	= $this->input->post('password',TRUE);
			$alamat 	    	= $this->input->post('alamat',TRUE);
			$kode_kecamatan		= $this->input->post('kode_kecamatan',TRUE);
			$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
			$email 				= $this->input->post('email',TRUE);
			$level 				= $this->input->post('level',TRUE);
	        $image= $data['upload_data']['file_name']; 
	        
	        $this->m_upload->simpan_upload($NIK,$nama_depan,$nama_belakang,$username,$password,
			$alamat,$kode_kecamatan,$kode_wilayah,$email,$level,$image);

        }
		redirect('upload');

	 }
	 
	function get_edit(){
		$NIK = $this->uri->segment(3);
		$data['NIK'] = $NIK;
		$data['kode_kecamatan'] = $this->m_upload->get_kecamatan()->result();
		$get_data = $this->m_upload->get_umum_by_id($NIK);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_wilayah'] = $row['kode_wilayah'];

		}
		$this->load->view('umum/ubah_umum',$data);
	}


	function get_data_edit(){
		$NIK = $this->input->post('NIK',TRUE);
		$data = $this->m_upload->get_umum_by_id($NIK)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update(){
		$config['upload_path']="./images";
		$config['allowed_types']='jpeg|jpg|png';		
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());

	        $NIK 	    		= $this->input->post('NIK',TRUE);
			$nama_depan     	= $this->input->post('nama_depan',TRUE);
			$nama_belakang 		= $this->input->post('nama_belakang',TRUE);
			$username 	    	= $this->input->post('username',TRUE);
			$password 	    	= $this->input->post('password',TRUE);
			$alamat 	    	= $this->input->post('alamat',TRUE);
			$kode_kecamatan		= $this->input->post('kode_kecamatan',TRUE);
			$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
			$email 				= $this->input->post('email',TRUE);
			$level 				= $this->input->post('level',TRUE);
	        $image= $data['upload_data']['file_name']; 
	        
	        $this->m_upload->update($NIK,$nama_depan,$nama_belakang,$username,$password,
			$alamat,$kode_kecamatan,$kode_wilayah,$email,$level,$image);

        }
		$this->session->set_flashdata('msg','<div class="alert alert-success">umum Updated</div>');
		redirect('upload');
	}

	public function get_detail(){
		$data['detail_umum'] = $this->m_upload->get_umum();
		$this->load->view('umum/detail_umum',$data);
	}

	//Delete usulan from Database
	function delete(){
		$NIK = $this->uri->segment(3);
		$this->m_upload->delete_umum($NIK);
		$this->session->set_flashdata('msg','<div class="alert alert-success">umum Deleted</div>');
		redirect('upload');
	}
}