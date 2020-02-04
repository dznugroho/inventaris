<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Berkas extends CI_Controller {

	function __construct(){
		parent::__construct();		
    $this->load->model('M_Databerkas');
  }

    public function index()
	{
		$this->load->view('berkas/daftar_berkas');
    }
    public function ubah(){
        $data=$this->M_Databerkas->singleBerkas();
        //print_r($data);
        $this->load->view('berkas/ubah_berkas',$data);
	}

    function databerkas(){
		$list = $this->M_Databerkas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nama_bidang;
			$row[] = $field->nama_sub;
			$row[] = $field->tahun_pengusulan;
			$row[] = $field->nama_kegiatan;
			$row[] = $field->anggaran;
			$row[] = $field->alamat_kegiatan;
			$row[] = $field->desa_kegiatan;
			$row[] = $field->kecamatan;
			$row[] = $field->nama_institusi;
			$row[] = $field->alamat_institusi;
			$row[] = $field->desa_institusi;
			$row[] = $field->kecamatan_institusi;
			$row[] = $field->no_telp;
			$row[] = $field->file;

     

			$row[] = '<a href="'.base_url().'data_berkas/ubah/'.$field->kode_berkas.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'data_berkas/delete/'.$field->kode_berkas.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
			$data[] = $row;
		}
  
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Databerkas->count_all(),
			"recordsFiltered" => $this->M_Databerkas->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	function update(){ //update record method
		//print_r($_POST);
		$this->M_Databerkas->updateBerkas();
		redirect('berkas');
	}
	function delete(){ //delete record method
		$this->M_Databerkas->deleteBerkas();
		redirect('berkas');
    }

}