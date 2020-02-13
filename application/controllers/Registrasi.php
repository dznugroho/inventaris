<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Registrasi','m_registrasi');
		$this->load->library('session');
		
	}

	function index(){
		$data['registrasi'] = $this->m_registrasi->get_usulan();
		$data['kode_bidang'] = $this->m_registrasi->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_registrasi->get_kecamatan()->result();
		$this->load->view('registrasi/add_product_view',$data);
	}

	// add new usulan
	function add_new(){
   		
		$data['kode_bidang'] = $this->m_registrasi->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_registrasi->get_kecamatan()->result();
		$this->load->view('registrasi/add_product_view', $data);
	}

	

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_registrasi->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('files/'.$file)."' width='100%' height='100%'></embed>";
    }

	//save usulan to database
	function save_usulan(){

	
		$data=array(

			'nama_depan'     => $this->input->post('nama_depan',TRUE),
			'nama_belakang' 	=> $this->input->post('nama_belakang',TRUE),
			'NIK' 	    => $this->input->post('NIK',TRUE),
			'email' 	=> $this->input->post('email',TRUE),
			'password' 	    => $this->input->post('password',TRUE),
			'kode_kecamatan'		=> $this->input->post('kode_kecamatan',TRUE),
			'kode_wilayah' 	        => $this->input->post('kode_wilayah',TRUE)

		);
		$this->db->insert('registrasi', $data);
		$this->session->set_flashdata('msg','<div class="alert alert-success">registrasi Saved</div>');
		redirect('login');
		
	}

	//Delete usulan from Database
	function delete(){
		$kode_usulan = $this->uri->segment(3);
		$this->m_usulan->delete_usulan($kode_usulan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Deleted</div>');
		redirect('usulan');
	}
}