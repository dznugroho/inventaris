<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('M_Berkas');
	}
 
 
	public function index()
	{
		$data['dropdown'] = $this->M_Berkas->tampil_data();
		$data['alamat'] = $this->M_Berkas->tampil_alamat();
		$this->load->view('berkas/tambah_berkas', $data);
	}
 
 
	public function tampil_chained()
	{
		$id = $_POST['id'];
		$dropdown_chained = $this->M_Berkas->tampil_data_chained($id);
		foreach ($dropdown_chained->result() as $baris) {
			echo "<option value='".$baris->kode_subbidang."'>".$baris->nama_sub."</option>";
		}
	}

	public function tampil_lokasi()
	{
		$id = $_POST['id'];
		$lokasi = $this->M_Berkas->tampil_alamat_chained($id);
		foreach ($lokasi->result() as $baris) {
			echo "<option value='".$baris->kode_wilayah."'>".$baris->kecamatan."</option>";
		}
	}
 
	function save(){ //update record method
		//print_r($_POST);
		$this->M_Berkas->insertBerkas();
		redirect('data_berkas');
	}

	

}