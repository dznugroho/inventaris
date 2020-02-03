<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Berkas');
  }

    public function index()
	{
		$this->load->view('berkas/daftar_berkas');
    }
    public function tambah()
	{
		$this->load->view('berkas/tambah_berkas');
	}
	public function ubah(){
        $data=$this->M_Berkas->singleBerkas();
        //print_r($data);
        $this->load->view('berkas/ubah_berkas',$data);
	}

	function databerkas(){
		$list = $this->M_Berkas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_wilayah;
			$row[] = $field->desa;
			$row[] = $field->kecamatan;
			$row[] = $field->kabupaten;
			$row[] = $field->provinsi;          
			$row[] = '<a href="'.base_url().'/berkas/ubah/'.$field->kode_berkas.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> <a href="'.base_url().'/berkas/delete/'.$field->kode_berkas.'" class="btn btn-icon btn-danger"><i class="far fa-trash"></a></i>';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Berkas->count_all(),
			"recordsFiltered" => $this->M_Berkas->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function save(){ //insert record method
        $this->M_Berkas->insertBerkas();
        redirect('berkas');
    }
   
    function update(){ //update record method
        //print_r($_POST);
        $this->M_Berkas->updateBerkas();
        redirect('berkas');
    }
    function delete(){ //delete record method
        $this->M_Berkas->deleteBerkas();
        redirect('berkas');
    }
}