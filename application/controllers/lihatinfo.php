<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lihatinfo extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('m_lihatinfo');
  }

    public function index()
	{
		$this->load->view('dashboard');
    }
    public function ubah(){
        $data=$this->m_lihatinfo->singleInfrastruktur();
        //print_r($data);
        $this->load->view('dashboard',$data);
	}

	function datainfrastruktur(){
		$list = $this->m_lihatinfo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_kecamatan;
			$row[] = $field->nama_kecamatan;       
			$row[] = '<a href="'.base_url().'liahatinfo/ubah/'.$field->kode_kecamatan.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'lihatinfo/delete/'.$field->kode_kecamatan.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_lihatinfo->count_all(),
			"recordsFiltered" => $this->m_lihatinfo->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->m_lihatinfo->updatelihatinfo();
		redirect('lihatinfo');
	}
	function delete(){ //delete record method
		$this->m_lihatinfo->deletelihatinfo();
		redirect('lihatinfo');
	}

}