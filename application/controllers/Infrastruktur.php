<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infrastruktur extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Infrastruktur');
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
  }

    public function index()
	{
		
		if($this->session->userdata('akses')!='1') redirect('dashboard');

		$this->load->view('bidang/infrastruktur');
    }
    public function ubah(){
		if($this->session->userdata('akses')!='1') redirect('dashboard');
    	
        $data=$this->M_Infrastruktur->singleInfrastruktur();
        //print_r($data);
        $this->load->view('bidang/infrastuktur',$data);
	}

	function datainfrastruktur(){
		$list = $this->M_Infrastruktur->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_subbidang;
			$row[] = $field->nama_sub;       
			$row[] = '<a href="'.base_url().'infrastruktur/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i>';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Infrastruktur->count_all(),
			"recordsFiltered" => $this->M_Infrastruktur->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Infrastruktur->updateInfrastruktur();
		redirect('infrastruktur');
	}
	function delete(){ //delete record method
		$this->M_Infrastruktur->deleteInfrastruktur();
		redirect('infrastruktur');
	}

}