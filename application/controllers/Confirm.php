<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Confirm','m_confirm');
		$this->load->library('session');
	}

	function index(){
		$data['usulan'] = $this->m_confirm->get_pilihan();
	
		$this->load->view('usulan/confirm_usulan',$data);
	}

	function input(){
		$kode_usulan = $this->uri->segment(3);
		$data['kode_usulan'] = $kode_usulan;
		$data['kode_perusahaan'] = $this->session->userdata('ses_id');
		$this->load->view('perusahaan/input_dana',$data);
	}
	//save usulan to database
	function save_pilihan(){

		$kode_usulan 		= $this->input->post('kode_usulan',TRUE);
		$kode_perusahaan	= $this->input->post('kode_perusahaan',TRUE);
		$dana	   	 		= $this->input->post('dana',TRUE);

		$this->m_confirm->save_pilihan($kode_usulan,$kode_perusahaan,$dana);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Saved</div>');
		redirect('pilihan_ps');
	}

	public function cancel($id){
        $data["status_perusahaan"]=2;
        $kode=$this->m_confirm->cancel($data,$id);
        redirect(site_url('confirm'));
    }
    
    public function confirm($id){
        $data["status_perusahaan"]=1;
        $kode=$this->m_confirm->confirm($data,$id);
        redirect(site_url('confirm'));
    }

	

	//Delete usulan from Database
	function delete(){
		$id = $this->uri->segment(3);
		$this->m_pengguna->delete_pengguna($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Perusahaan Deleted</div>');
		redirect('pengguna');
	}
}