<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	function __construct(){
		parent::__construct();		
    		$this->load->model('M_Pendidikan');
    		$this->load->library('session');
			if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
  }

    public function index()
	{
		if($this->session->userdata('akses')!='1') redirect('dashboard');
		// $data['pendidikan'] = $this->M_Pendidikan->get_pendidikan();
		// $data['hitung'] = $this->M_Pendidikan->count_pendidikan();
		$this->load->view('bidang/pendidikan');
    }
    public function ubah(){
        $data=$this->M_Pendidikan->singlePendidikan();
        //print_r($data);
        $this->load->view('bidang/ubah_pendidikan',$data);
	}

	function datapendidikan(){
		$list = $this->M_Pendidikan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_subbidang;
			$row[] = $field->nama_sub;       
			$row[] = '<a href="'.base_url().'pendidikan/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i>';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Pendidikan->count_all(),
			"recordsFiltered" => $this->M_Pendidikan->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Pendidikan->updatePendidikan();
		redirect('pendidikan');
	}
	

}