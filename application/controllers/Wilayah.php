<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Wilayah','m_wilayah');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	}

	function index(){
		if($this->session->userdata('akses')!='1') redirect('dashboard');
		$data['wilayah'] = $this->m_wilayah->get_wilayah();
		$this->load->view('wilayah/daftar_wilayah',$data);
	}

	// add new wilayah
	function tambah(){
		
		$data['kode_kecamatan'] = $this->m_wilayah->get_kecamatan()->result();
		$this->load->view('wilayah/tambah_wilayah', $data);
	}

	function get_nama(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_usulan->get_nama($kode_kecamatan)->result();
		echo json_encode($data);
	}

	

	//save wilayah to database
	function save_wilayah(){
		$kode_wilayah 	        = $this->input->post('kode_wilayah',TRUE);
		$desa                   = $this->input->post('desa',TRUE);
        $kabupaten 	            = $this->input->post('kabupaten',TRUE);
		$provinsi 	            = $this->input->post('provinsi',TRUE);
		$kode_kecamatan_wilayah = $this->input->post('kode_kecamatan_wilayah',TRUE);

             
        $this->m_wilayah->save_wilayah($kode_wilayah,$desa,$kabupaten,$provinsi,$kode_kecamatan_wilayah);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Wilayah Saved</div>');
		redirect('wilayah');
	}

	function get_edit(){
		$kode_wilayah = $this->uri->segment(3);
		$data['kode_wilayah'] = $kode_wilayah;
		$data['kode_kecamatan'] = $this->m_wilayah->get_kecamatan()->result();
		$get_data = $this->m_wilayah->get_wilayah_by_id($kode_wilayah);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			
		}
		$this->load->view('wilayah/ubah_wilayah',$data);
	}

	function get_data_edit(){
		$kode_wilayah = $this->input->post('kode_wilayah',TRUE);
		$data = $this->m_wilayah->get_wilayah_by_id($kode_wilayah)->result();
		echo json_encode($data);
	}

	//update wilayah to database
	function update_wilayah(){
        $kode_wilayah 	        = $this->input->post('kode_wilayah',TRUE);
		$desa                   = $this->input->post('desa',TRUE);
        $kabupaten 	            = $this->input->post('kabupaten',TRUE);
		$provinsi 	            = $this->input->post('provinsi',TRUE);
		$kode_kecamatan_wilayah = $this->input->post('kode_kecamatan_wilayah',TRUE);
        
		$this->m_wilayah->update_wilayah($kode_wilayah,$desa,$kabupaten,$provinsi,$kode_kecamatan_wilayah);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Wilayah Updated</div>');
		redirect('wilayah');
	}

	//Delete wilayah from Database
	function delete(){
		$kode_wilayah = $this->uri->segment(3);
		$this->m_wilayah->delete_wilayah($kode_wilayah);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Wilayah Deleted</div>');
		redirect('wilayah');
	}
}