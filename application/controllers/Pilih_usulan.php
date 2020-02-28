<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilih_usulan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Pilihanps','m_pilihanps');
		$this->load->model('M_Usulan','m_usulan');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		if($this->session->userdata('akses')!='4') redirect('dashboard');
	}

	function index(){

		$data['kode_perusahaan'] = $this->session->userdata('ses_id');
		$data['usulan'] = $this->m_pilihanps->get_usulan();
		$data['kode_bidang'] = $this->m_usulan->get_bidang()->result();
	
		$this->load->view('perusahaan/pilih_kegiatan',$data);
	}
	function detail_ps(){
		$data['detail_ps'] = $this->m_pilihanps->get_detailps();

		$this->load->view('perusahaan/detail_ps',$data);
	}
	function cari() {
		$data['kode_perusahaan'] = $this->session->userdata('ses_id');
		$data['usulan']=$this->m_pilihanps->caridata();
		//jika data yang dicari tidak ada maka akan keluar informasi 
		//bahwa data yang dicari tidak ada
			$data['kode_bidang'] = $this->m_pilihanps->get_bidang()->result();

			$this->load->view('perusahaan/pilih_kegiatan',$data); 
 
		  
	   }
	//save usulan to database
	function save_pilihan(){

		$kode_usulan 		= $this->input->post('kode_usulan',TRUE);
		$kode_perusahaan	= $this->input->post('kode_perusahaan',TRUE);
		$dana	   	 		= $this->input->post('dana',TRUE);
		$status				= $this->input->post('status',TRUE);

		$this->m_pilihanps->save_pilihan($kode_usulan,$kode_perusahaan,$dana,$status);
		redirect('pilih_usulan');
	}
	function get_sub_bidang(){
		$kode_bidang = $this->input->post('id',TRUE);
		$data = $this->m_pilihanps->get_sub_bidang($kode_bidang)->result();
		echo json_encode($data);
	}

}