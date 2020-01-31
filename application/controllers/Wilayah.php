<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Wilayah');
  }

    public function index()
	{
		$this->load->view('wilayah/daftar_wilayah');
    }
    public function ubah()
	{
		$this->load->view('wilayah/ubah_wilayah');
	}

	function datawilayah(){
		$list = $this->M_Wilayah->get_datatables();
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
			$row[] = '<a href="'.base_url().'/wilayah/deletewilayah/'.$field->kode_wilayah.'" class="btn btn-icon btn-danger"><i class="far fa-trash">Hapus</a> <a href="'.base_url().'/wilayah/ubah_wilayah/'.$field->kode_wilayah.'"class="btn btn-icon btn-primary"><i class="far fa-edit">Ubah</a></i>';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Wilayah->count_all(),
			"recordsFiltered" => $this->M_Wilayah->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

}