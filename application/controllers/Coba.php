<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Coba','m_coba');
		
	}

	function index(){
		$data['kode_kecamatan'] = $this->m_coba->get_kecamatan()->result();
		$this->load->view('jajal/coba',$data);
	}

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_coba->get_desa($kode_kecamatan)->result();
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
			$this->load->view('jajal/coba');
		}
		else
		{
				$this->load->view('login');
				
		}

		
	}

	
		
	


}