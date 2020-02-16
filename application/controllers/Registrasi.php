<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Registrasi','m_registrasi');
		$this->load->library('session');
		
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

	public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('files/'.$file)."' width='100%' height='100%'></embed>";
    }

	//save usulan to database
	function regist(){
			
			$NIK 	    		= $this->input->post('NIK',TRUE);
			$nama_depan     	= $this->input->post('nama_depan',TRUE);
			$nama_belakang 		= $this->input->post('nama_belakang',TRUE);
			$username 	    	= $this->input->post('username',TRUE);
			$password 	    	= $this->input->post('password',TRUE);
			$alamat 	    	= $this->input->post('alamat',TRUE);
			$kode_kecamatan		= $this->input->post('kode_kecamatan',TRUE);
			$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
			$email 				= $this->input->post('email',TRUE);
			$foto 	    		= $this->input->post('foto',TRUE);
			
		$this->m_registrasi->regist($NIK,$nama_depan,$nama_belakang,$email,$username,$password,
		$alamat,$kode_kecamatan,$kode_wilayah,$foto);
		redirect('login');
		
	}


}