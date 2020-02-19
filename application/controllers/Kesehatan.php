<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

	function __construct(){
		parent::__construct();		
	    $this->load->model('M_Kesehatan');
		$this->load->library('session');
	    if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
  }

    public function index()
	{
		if($this->session->userdata('akses')!='1') redirect('dashboard');

		$this->load->view('bidang/kesehatan');
    }
    public function ubah(){
        $data=$this->M_Kesehatan->singleKesehatan();
        //print_r($data);
        $this->load->view('bidang/ubah_kesehatan',$data);
	}

	function datakesehatan(){
		$list = $this->M_Kesehatan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_subbidang;
			$row[] = $field->nama_sub;       
			$row[] = '<a href="'.base_url().'kesehatan/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'kesehatan/delete/'.$field->kode_subbidang.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Kesehatan->count_all(),
			"recordsFiltered" => $this->M_Kesehatan->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Kesehatan->updateKesehatan();
		redirect('kesehatan');
	}
	function delete(){ //delete record method
		$this->M_Kesehatan->deleteKesehatan();
		redirect('kesehatan');
	}

}