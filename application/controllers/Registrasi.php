<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Registrasi','m_registrasi');
		
	}

	function index(){
		$data['kode_kecamatan'] = $this->m_registrasi->get_kecamatan()->result();
		$this->load->view('registrasi/add_regis',$data);
	}

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_registrasi->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}
	// add new usulan

	public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('files/'.$file)."' width='100%' height='100%'></embed>";
    }

	//save usulan to database
	function regist(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('NIK', 'NIK', 'required|min_length[16]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Passconf', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('registrasi/add_regis');
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
				$username	 		= $this->input->post('username',TRUE);
				$password 	    	= $this->input->post('password',TRUE);
				$alamat 	    	= $this->input->post('alamat',TRUE);
				$no_telpp			= $this->input->post('no_telpp',TRUE);
				$kode_kecamatan		= $this->input->post('kode_kecamatan',TRUE);
				$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
				$email 				= $this->input->post('email',TRUE);
				$image = $data['upload_data']['file_name']; 
				
			$this->m_registrasi->regist($NIK,$nama_depan,$username,$password,
			$alamat,$no_telpp,$email,$kode_kecamatan,$kode_wilayah,$image);
			
			}
			$this->session->set_flashdata('msg','<div class="alert alert-success">Berhasil Mendaftar</div>');
	
			redirect('login');
				
		}



		
	}


}