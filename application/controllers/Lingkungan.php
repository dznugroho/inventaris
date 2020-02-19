<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lingkungan extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Lingkungan');
		$this->load->library('session');
    	if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
  }

    public function index()
	{
		if($this->session->userdata('akses')!='1') redirect('dashboard');

		$this->load->view('bidang/lingkungan');
    }
    public function ubah(){
        $data=$this->M_Lingkungan->singleLingkungan();
        //print_r($data);
        $this->load->view('bidang/ubah_lingkungan',$data);
	}

	function dataLingkungan(){
		$list = $this->M_Lingkungan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_subbidang;
			$row[] = $field->nama_sub;       
			$row[] = '<a href="'.base_url().'lingkungan/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'lingkungan/delete/'.$field->kode_subbidang.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Lingkungan->count_all(),
			"recordsFiltered" => $this->M_Lingkungan->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Lingkungan->updateLingkungan();
		redirect('lingkungan');
	}
	function delete(){ //delete record method
		$this->M_Lingkungan->deleteLingkungan();
		redirect('lingkungan');
	}

}