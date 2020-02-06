<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Admin');
  }

    public function index()
	{
		$this->load->view('admin/Admin');
    }
    public function ubah(){
        $data=$this->M_admin->singleAdmin();
        //print_r($data);
        $this->load->view('admin/Admin',$data);
	}

	function dataAdmin(){
		$list = $this->M_admin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->id;
            $row[] = $field->username; 
            $row[] = $field->password;
			$row[] = $field->level;        
			$row[] = '<a href="'.base_url().'pek/ubah/'.$field->kode_subbidang.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'pek/delete/'.$field->kode_subbidang.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_admin->count_all(),
			"recordsFiltered" => $this->M_admin->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_admin->updateAdmin();
		redirect('tb_user');
	}
	function delete(){ //delete record method
		$this->M_admin->deleteAdmin();
		redirect('tb_user');
	}

}