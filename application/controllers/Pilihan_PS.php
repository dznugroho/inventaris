<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan_PS extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Pilihanps','m_pilihanps');
		$this->load->model('M_Usulan','m_usulan');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	}

	function index(){

		if($this->session->userdata('akses')!='4') redirect('dashboard');

		$data['kode_perusahaan'] = $this->session->userdata('ses_id');
		$data['usulan'] = $this->m_pilihanps->get_usulan();
	
		$this->load->view('perusahaan/pilih_kegiatan',$data);
	}
	function detail_ps(){
		$data['detail_ps'] = $this->m_pilihanps->get_detailps();

		$this->load->view('perusahaan/detail_ps',$data);
	}
	//save usulan to database
	function save_pilihan(){

		$kode_usulan 		= $this->input->post('kode_usulan',TRUE);
		$kode_perusahaan	= $this->input->post('kode_perusahaan',TRUE);
		$dana	   	 		= $this->input->post('dana',TRUE);

		$this->m_pilihanps->save_pilihan($kode_usulan,$kode_perusahaan,$dana);
		redirect('pilihan_ps');
	}

}