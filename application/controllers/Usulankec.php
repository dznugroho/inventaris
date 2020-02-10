<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulankec extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Usulankec','m_usulankec');
		$this->load->library('session');
	}

	function index(){
		$data['usulankec'] = $this->m_usulankec->get_usulankec();
		$this->load->view('usulankec/daftar_usulan',$data);
	}

	// add new usulan
	function add_new(){
		
		$data['desas'] = $this->m_usulankec->get_desa($this->session->userdata('ses_kodekec'))->result();
		$data['desass'] = $this->m_usulankec->get_dk($this->session->userdata('ses_kodekec'))->result();
		$data['kode_bidang'] = $this->m_usulankec->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulankec->get_kecamatan()->result();
		$data['kode_k'] = $this->m_usulankec->get_k()->result();
		$this->load->view('usulankec/add_product_view', $data);
	}

	// get sub bidang by bidang_id
	function get_sub_bidang(){
		$kode_bidang = $this->input->post('id',TRUE);
		$data = $this->m_usulankec->get_sub_bidang($kode_bidang)->result();
		echo json_encode($data);
	}

	function get_desa($session_user){
		// $kode_kecamatan = $this->input->post('id',TRUE);
		// $data = $this->m_usulankec->get_desa($this->session->userdata('ses_kodekec'))->result();
		// $query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		$kode_kecamatan = $session_user;
		$data = $this->m_usulankec->get_desa($kode_kecamatan)->result();
		// return $data;
		echo json_encode($data);
	}
	function get_dk($session_user){
		// $kode_kecamatan = $this->input->post('id',TRUE);
		// $data = $this->m_usulankec->get_desa($this->session->userdata('ses_kodekec'))->result();
		// $query = $this->db->get_where('tb_wilayah', array('kode_kecamatan_wilayah' => $kode_kecamatan));
		$kode_k = $session_user;
		$data = $this->m_usulankec->get_dk($kode_k)->result();
		// return $data;
		echo json_encode($data);
	}

	public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('files/'.$file)."' width='100%' height='100%'></embed>";
    }

	//save usulan to database
	function save_usulankec(){

		$kode_bidang 	    = $this->input->post('kode_bidang',TRUE);
		$kode_subbidang     = $this->input->post('kode_subbidang',TRUE);
        $tahun_pengusulan 	= $this->input->post('tahun_pengusulan',TRUE);
		$nama_kegiatan 		= $this->input->post('nama_kegiatan',TRUE);
		$waktu_mulai 	    = $this->input->post('waktu_mulai',TRUE);
		$waktu_selesai		= $this->input->post('waktu_selesai',TRUE);
		$anggaran 	        = $this->input->post('anggaran',TRUE);
		$alamat_kegiatan    = $this->input->post('alamat_kegiatan',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
		$deskripsi 	   		= $this->input->post('deskripsi',TRUE);
        $nama_institusi 	= $this->input->post('nama_institusi',TRUE);
		$alamat_institusi 	= $this->input->post('alamat_institusi',TRUE);
		$kode_k			    = $this->input->post('kode_k',TRUE);
		$kode_w				= $this->input->post('kode_w',TRUE);
		$nama_pengusul   	= $this->input->post('nama_pengusul',TRUE);
		$no_telp         	= $this->input->post('no_telp',TRUE);
		$file         	= $this->input->post('file',TRUE);

		$this->m_usulankec->save_usulankec($kode_bidang,$kode_subbidang,$tahun_pengusulan,$nama_kegiatan,$waktu_mulai,
		$waktu_selesai,$anggaran,$alamat_kegiatan,$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,
		$alamat_institusi,$kode_k,$kode_w,$nama_pengusul,$no_telp,$file);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Updated</div>');
		redirect('usulankec');
		
	}

	public function add_file(){
		$dokumen=$_FILES['file']['name'];
		$dir="file/"; //tempat upload foto
		$dirs="files/"; //tempat upload foto
		$file='file'; //name pada input type file
		$new_name3='update'.$this->input->post('kode_subbidang').'.pdf'; //name pada input type file
		$vdir_upload = $dir;
		$file_name=$_FILES[''.$file.'']["name"];
		$vfile_upload = $vdir_upload . $file;
		$tmp_name=$_FILES[''.$file.'']["tmp_name"];
		move_uploaded_file($tmp_name, $dirs.$file_name);
		$source_url3=$dir.$file_name;
		rename($dirs.$file_name,$dirs.$new_name3);
		$data=array(
			'file'=>$new_name3
		);
		$this->db->where('kode_usulan', $kode_usulan);
		$this->db->update('tb_usulan', $data);
		$this->session->set_flashdata('sukses','1');
		redirect('usulankec');
}

	function get_edit(){
		$kode_usulan = $this->uri->segment(3);
		$data['kode_usulan'] = $kode_usulan;
		$data['kode_bidang'] = $this->m_usulan->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulan->get_kecamatan()->result();
		$data['kode_k'] = $this->m_usulan->get_k()->result();
		$get_data = $this->m_usulan->get_usulan_by_id($kode_usulan);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_subbidang'] = $row['kode_subbidang'];
			$data['kode_wilayah'] = $row['kode_wilayah'];
			$data['kode_w'] = $row['kode_w'];

		}
		$this->load->view('usulankec/ubah_usulan',$data);
	}

	function get_data_edit(){
		$kode_usulan = $this->input->post('kode_usulan',TRUE);
		$data = $this->m_usulan->get_usulan_by_id($kode_usulan)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_usulankec(){
		$kode_usulan 	    = $this->input->post('kode_usulan',TRUE);
		$kode_bidang 	    = $this->input->post('kode_bidang',TRUE);
		$kode_subbidang     = $this->input->post('kode_subbidang',TRUE);
        $tahun_pengusulan 	= $this->input->post('tahun_pengusulan',TRUE);
		$nama_kegiatan 	    = $this->input->post('nama_kegiatan',TRUE);
		$waktu_mulai 	    = $this->input->post('waktu_mulai',TRUE);
		$waktu_selesai 	    = $this->input->post('waktu_selesai',TRUE);
		$anggaran 	        = $this->input->post('anggaran',TRUE);
		$alamat_kegiatan    = $this->input->post('alamat_kegiatan',TRUE);
		$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
		$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
		$deskripsi 	    	= $this->input->post('deskripsi',TRUE);
        $nama_institusi 	= $this->input->post('nama_institusi',TRUE);
		$alamat_institusi 	= $this->input->post('alamat_institusi',TRUE);
		$kode_k				= $this->input->post('kode_k',TRUE);
		$kode_w 			= $this->input->post('kode_w',TRUE);
		$nama_pengusul   	= $this->input->post('nama_pengusul',TRUE);
		$no_telp         	= $this->input->post('no_telp',TRUE);
		$file         		= $this->input->post('file',TRUE);
        
		$this->m_usulankec->update_usulan($kode_usulan,$kode_bidang,$kode_subbidang,$tahun_pengusulan,$nama_kegiatan,$waktu_mulai,
		$waktu_selesai,$anggaran,$alamat_kegiatan,$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,
		$alamat_institusi,$kode_k,$kode_w,$nama_pengusul,$no_telp,$file);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Updated</div>');
		redirect('usulankec');
	}

	//Delete usulan from Database
	function delete(){
		$kode_usulan = $this->uri->segment(3);
		$this->m_usulankec->delete_usulankec($kode_usulan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Deleted</div>');
		redirect('usulankec');
	}
}