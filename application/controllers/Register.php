<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
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
		$data['register'] = $this->m_upload->get_regist();
		$this->load->view('umum/confirm_pendaftar',$data);
	}

    public function confirm($NIK){
        $data["level"]=2;
        $kode=$this->m_upload->confirm($data,$NIK);
        redirect(site_url('upload'));
    }


	public function cancel($NIK){
        $data["level"]=1;
        $kode=$this->m_upload->cancel($data,$NIK);
        redirect(site_url('upload'));
    }

}	