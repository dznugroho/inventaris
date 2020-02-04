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
	function databidang(){
        $data['tb_bidang'] = $this->M_Berkas->get_bidang()->result();
        $this->load->view('v_kategori', $data);
    }
 
    function get_subbidang(){
        $kode_bidang = $this->input->post('id',TRUE);
        $data = $this->M_Berkas->get_subbidang($kode_bidang)->result();
        echo json_encode($data);
    }

	function databerkas(){
		$list = $this->M_Berkas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->kode_berkas;
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

     

			$row[] = '<a href="'.base_url().'pendidikan/ubah/'.$field->kode_berkas.'"class="btn btn-icon btn-primary"><i class="far fa-edit"></a></i> &nbsp;<a href="'.base_url().'pendidikan/delete/'.$field->kode_berkas.'" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></a></i> ';
  
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

	function save(){ //update record method
		//print_r($_POST);
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