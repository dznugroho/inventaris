<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Pendidikan');
  }

    public function index()
	{
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
			$row[] = '<a href="'.base_url().'pendidikan/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'pendidikan/delete/'.$field->kode_subbidang.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
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
	function delete(){ //delete record method
		$this->M_Pendidikan->deletePendidikan();
		redirect('pendidikan');
	}

}