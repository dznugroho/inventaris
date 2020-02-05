<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dropdown extends CI_Controller
{
	
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Model_dropdown');
	}
 
 
	public function index()
	{
		$data['dropdown'] = $this->Model_dropdown->tampil_data();
		$this->load->view('berkas/tambah_berkas', $data);
	}
 
 
	public function tampil_chained()
	{
		$id = $_POST['id'];
		$dropdown_chained = $this->Model_dropdown->tampil_data_chained($id);
		foreach ($dropdown_chained->result() as $baris) {
			echo "<option value='".$baris->kode_subbidang."'>".$baris->nama_sub."</option>";
		}
	}
 
 
}