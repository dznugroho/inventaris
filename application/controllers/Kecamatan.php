<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Kecamatan');
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
  }

    public function index()
	{
		$this->load->view('dashboard');
    }
    public function ubah(){
        $data=$this->M_Kesehatan->singleKecamatan();
        //print_r($data);
        $this->load->view('dashboard',$data);
	}

	function datakecamatan(){
		$list = $this->M_Kecamatan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$row = array();
			$row[] = $field->kode_kecamatan;
			$row[] = $field->nama_kecamatan;       
			$row[] = '<a href="'.base_url().'kecamatan/ubah/'.$field->kode_kecamatan.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'kesehatan/delete/'.$field->kode_kecamatan.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Kecamatan->count_all(),
			"recordsFiltered" => $this->M_Kecamatan->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Kecamatan->updateKecamatan();
		redirect('kecamatan');
	}
	function delete(){ //delete record method
		$this->M_Kecamatan->deleteKecamatan();
		redirect('kecamatan');
	}

}