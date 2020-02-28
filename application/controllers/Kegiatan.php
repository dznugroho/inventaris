<?php
class Kegiatan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Pilihanps','m_pilihanps');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		if($this->session->userdata('akses')!='4') redirect('dashboard');
		
	}

	function index(){
		
		$data['usulan'] = $this->m_pilihanps->get_pilihan();
	
		$this->load->view('perusahaan/daftar_pilihan',$data);
	}
	function detail_perusahaan(){
		$data['detail_perusahaan'] = $this->m_pilihanps->get_detail();

		$this->load->view('perusahaan/detail_perusahaan',$data);
	}

	
}