<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pek extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Pek');
  }

    public function index()
	{
		$this->load->view('bidang/pek');
    }
    public function ubah(){
        $data=$this->M_Pek->singlePek();
        //print_r($data);
        $this->load->view('bidang/ubah_pek',$data);
	}

	function datapek(){
		$list = $this->M_Pek->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_subbidang;
			$row[] = $field->nama_sub;       
			$row[] = '<a href="'.base_url().'pek/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'pek/delete/'.$field->kode_subbidang.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Pek->count_all(),
			"recordsFiltered" => $this->M_Pek->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Pek->updatePek();
		redirect('pek');
	}
	function delete(){ //delete record method
		$this->M_Pek->deletePek();
		redirect('pek');
	}

}