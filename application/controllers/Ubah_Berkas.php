<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_Berkas extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('M_Ubahberkas');
	}
 
 
	public function index()
	{   
        $data=$this->M_Ubahberkas->singleBerkas();
		$data['dropdown'] = $this->M_Ubahberkas->tampil_data();
		$data['alamat'] = $this->M_Ubahberkas->tampil_alamat();
		$this->load->view('berkas/ubah_berkas', $data);
	}
 
 
	public function tampil_chained()
	{
		$id = $_POST['id'];
		$dropdown_chained = $this->M_Ubahberkas->tampil_data_chained($id);
		foreach ($dropdown_chained->result() as $baris) {
			echo "<option value='".$baris->kode_subbidang."'>".$baris->nama_sub."</option>";
		}
	}

	public function tampil_lokasi()
	{
		$id = $_POST['id'];
		$lokasi = $this->M_Ubahberkas->tampil_alamat_chained($id);
		foreach ($lokasi->result() as $baris) {
			echo "<option value='".$baris->kode_wilayah."'>".$baris->kecamatan."</option>";
		}
	}
 
	function update(){ //update record method
		//print_r($_POST);
		$this->M_Ubahberkas->updateBerkas();
		redirect('data_berkas');
	}

	

}