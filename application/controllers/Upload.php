<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_upload','m_upload');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		if($this->session->userdata('akses')!='1') redirect('dashboard');
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

		$this->load->library('form_validation');
		$this->form_validation->set_rules('NIK', 'NIK', 'required|min_length[16]|is_unique[registrasi.NIK]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]|is_unique[registrasi.username]',
		array(
			'required'      => 'You have not provided %s.',
			'is_unique'     => 'Username Sudah Digunakan.'
	)
);
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[registrasi.email]');
		$this->form_validation->set_rules('kode_kecamatan', 'kode_Kecamatan','required');
		$this->form_validation->set_rules('kode_wilayah', 'kode_wilayah','required');
			if (empty($_FILES['file']['name']))
				{
					$this->form_validation->set_rules('file', 'Document', 'required');
				}
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['kode_kecamatan'] = $this->m_upload->get_kecamatan()->result();
			$this->load->view('umum/add_data',$data);
		}
		else
		{
	        $config['upload_path']="./images";
			$config['allowed_types']='jpeg|jpg|png';		
			$config['max_size']	= '2048';
			$config['remove_space'] = TRUE;
	        
	        $this->load->library('upload',$config);
		    if($this->upload->do_upload("file")){
		        $data = array('upload_data' => $this->upload->data());

		        $NIK 	    		= $this->input->post('NIK',TRUE);
				$nama_depan     	= $this->input->post('nama_depan',TRUE);
				$username 			= $this->input->post('username',TRUE);
				$password 	    	= $this->input->post('password',TRUE);
				$alamat 	    	= $this->input->post('alamat',TRUE);
				$no_telpp	    	= $this->input->post('no_telpp',TRUE);
				$kode_kecamatan		= $this->input->post('kode_kecamatan',TRUE);
				$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
				$email 				= $this->input->post('email',TRUE);
				$level 				= $this->input->post('level',TRUE);
		        $image= $data['upload_data']['file_name']; 
		        
		        $this->m_upload->simpan_upload($NIK,$nama_depan,$username,$password,
				$alamat,$no_telpp,$kode_kecamatan,$kode_wilayah,$email,$level,$image);

	        }
			redirect('upload');
		}
	 }
	 
	function get_edit(){
		$id_umum = $this->uri->segment(3);
		$data['id_umum'] = $id_umum;
		$data['kode_kecamatan'] = $this->m_upload->get_kecamatan()->result();
		$get_data = $this->m_upload->get_umum_by_id($id_umum);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_wilayah'] = $row['kode_wilayah'];

		}
		$this->load->view('umum/ubah_umum',$data);
	}


	function get_data_edit(){
		$id_umum = $this->input->post('id_umum',TRUE);
		$data = $this->m_upload->get_umum_by_id($id_umum)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update(){
		$config['upload_path']="./images";
		$config['allowed_types']='jpeg|jpg|png';		
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
		$config['overwrite'] = TRUE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());

	        $id_umum 	    	= $this->input->post('id_umum',TRUE);
	        $NIK 	    		= $this->input->post('NIK',TRUE);
			$nama_depan     	= $this->input->post('nama_depan',TRUE);
			$username 			= $this->input->post('username',TRUE);
			$alamat 	    	= $this->input->post('alamat',TRUE);
			$no_telpp 	    	= $this->input->post('no_telpp',TRUE);
			$kode_kecamatan		= $this->input->post('kode_kecamatan',TRUE);
			$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
			$email 				= $this->input->post('email',TRUE);
			$level 				= $this->input->post('level',TRUE);
	        $image= $data['upload_data']['file_name']; 
	        
	        $this->m_upload->update($id_umum,$NIK,$nama_depan,$username,
			$alamat,$no_telpp,$kode_kecamatan,$kode_wilayah,$email,$level,$image);

        }
		$this->session->set_flashdata('msg','<div class="alert alert-success">umum Updated</div>');
		redirect('upload');
	}
	function change(){

	        $id_umum 	    	= $this->input->post('id_umum',TRUE);
			$password 	    	= $this->input->post('password',TRUE);
		
	        
	        $this->m_upload->changepass($id_umum,$password);

        
		$this->session->set_flashdata('msg','<div class="alert alert-success">Password Updated</div>');
		redirect('upload');
	}


	public function get_detail(){
		$data['detail_umum'] = $this->m_upload->get_detail();
		$this->load->view('umum/detail_umum',$data);
	}

	//Delete usulan from Database
	function delete(){
		$id_umum = $this->uri->segment(3);
		$this->m_upload->delete_umum($id_umum);
		$this->session->set_flashdata('msg','<div class="alert alert-success">umum Deleted</div>');
		redirect('upload');
	}
}