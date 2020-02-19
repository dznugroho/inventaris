<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_pilihan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Status_usulan','m_status_usulan');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	}

	function index(){
		if($this->session->userdata('akses')!='1') redirect('dashboard');
		$data['riwayat'] = $this->m_status_usulan->get_riwayat();
	
		$this->load->view('usulan/riwayat',$data);
	}

	function detail_riwayat(){
		$data['detail_riwayat'] = $this->m_status_usulan->get_detail_riwayat();
		$data['riwayat_perusahaan'] = $this->m_status_usulan->get_riwayat_perusahaan();

		$this->load->view('usulan/detail_riwayat',$data);
	}
	

	public function edit_status(){
		$kode_pilih				= $this->input->post('kode_pilih',TRUE);
		$status_perusahaan	    = $this->input->post('status_perusahaan',TRUE);
		$kode=$this->m_status_usulan->edit_status($status_perusahaan,$kode_pilih);
		
        redirect(site_url('riwayat_pilihan'));
    }

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_status_usulan->delete_riwayat_pilihan($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('riwayat_pilihan');
	}
}