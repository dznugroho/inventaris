<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_umum extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Usulan_umum','m_usulan_umum');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		
	}

	function index(){
		if($this->session->userdata('akses')!='2') redirect('dashboard');
		$data['usulan'] = $this->m_usulan_umum->get_usulan();
		$data['kode_bidang'] = $this->m_usulan_umum->get_bidang()->result();
		$this->load->view('usulan_umum/daftar_usulan',$data);
	}

	function cari() {
		$data['usulan']=$this->m_usulan_umum->caridata();
		//jika data yang dicari tidak ada maka akan keluar informasi 
		//bahwa data yang dicari tidak ada
			$data['kode_bidang'] = $this->m_usulan_umum->get_bidang()->result();

			$this->load->view('usulan_umum/daftar_usulan',$data); 
 
		  
	   }

	// add new usulan
	function add_new(){
		$data['NIK'] = $this->m_usulan_umum->get_NIK($this->session->userdata('ses_id'))->result();
		$data['kode_bidang'] = $this->m_usulan_umum->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulan_umum->get_kecamatan()->result();
		$data['kode_k'] = $this->m_usulan_umum->get_k()->result();
		$data['kode_w'] = $this->m_usulan_umum->get_d()->result();
		$this->load->view('usulan_umum/add_product_view', $data);
	}

	// get sub bidang by bidang_id
	function get_sub_bidang(){
		$kode_bidang = $this->input->post('id',TRUE);
		$data = $this->m_usulan_umum->get_sub_bidang($kode_bidang)->result();
		echo json_encode($data);
	}

	function get_desa(){
		$kode_kecamatan = $this->input->post('id',TRUE);
		$data = $this->m_usulan_umum->get_desa($kode_kecamatan)->result();
		echo json_encode($data);
	}

	function get_dk(){
		$kode_k = $this->session->userdata('ses_kecamatan');
		$data = $this->m_usulan_umum->get_dk($kode_k)->result();
		echo json_encode($data);
	}

	public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('files/'.$file)."' width='100%' height='100%'></embed>";
	}
	
	function detail_usulan(){
		$data['detail_usulan'] = $this->m_usulan_umum->get_detail();

		$this->load->view('usulan_umum/detail_usulan',$data);
	}

	//save usulan to database
	function save_usulan(){

	$this->load->library('form_validation');

	$this->form_validation->set_rules('kode_bidang', 'Nama Bidang', 'required');
	$this->form_validation->set_rules('kode_subbidang', 'Nama Subbidang', 'required');
	$this->form_validation->set_rules('kode_kecamatan', 'Kecamatan', 'required');
	$this->form_validation->set_rules('kode_wilayah', 'Desa', 'required');
	$this->form_validation->set_rules('tahun_pengusulan', 'Tahun Pengusulan', 'required|numeric|min_length[4]|max_length[4]');
	$this->form_validation->set_rules('anggaran', 'Anggaran', 'required|numeric');

		if (empty($_FILES['file']['name'])){

			$this->form_validation->set_rules('file', 'Document', 'required');

			}

		if ($this->form_validation->run() == FALSE)
		{	
			$data['NIK'] = $this->m_usulan_umum->get_NIK($this->session->userdata('ses_id'))->result();
			$data['kode_bidang'] = $this->m_usulan_umum->get_bidang()->result();
			$data['kode_kecamatan'] = $this->m_usulan_umum->get_kecamatan()->result();
			$data['kode_k'] = $this->m_usulan_umum->get_k()->result();
			$data['kode_w'] = $this->m_usulan_umum->get_d()->result();
			$this->load->view('usulan_umum/add_product_view',$data);
		}
		else
		{

			$config['upload_path']="./files";
			$config['allowed_types']='pdf';		
			$config['max_size']	= '4096';
			$config['remove_space'] = TRUE;
	        
	        $this->load->library('upload',$config);
		    if($this->upload->do_upload("file")){
				$data = array('upload_data' => $this->upload->data());
				
				$kode_bidang 	    = $this->input->post('kode_bidang',TRUE);
				$kode_subbidang     = $this->input->post('kode_subbidang',TRUE);
				$tahun_pengusulan 	= $this->input->post('tahun_pengusulan',TRUE);
				$nama_kegiatan 		= $this->input->post('nama_kegiatan',TRUE);
				$waktu_mulai 	    = $this->input->post('waktu_mulai',TRUE);
				$waktu_selesai		= $this->input->post('waktu_selesai',TRUE);
				$anggaran 	        = $this->input->post('anggaran',TRUE);
				$alamat_kegiatan   	= $this->input->post('alamat_kegiatan',TRUE);
				$kode_kecamatan 	= $this->input->post('kode_kecamatan',TRUE);
				$kode_wilayah 	    = $this->input->post('kode_wilayah',TRUE);
				$deskripsi 	   		= $this->input->post('deskripsi',TRUE);
				$nama_institusi 	= $this->input->post('nama_institusi',TRUE);
				$alamat_institusi 	= $this->input->post('alamat_institusi',TRUE);
				$kode_k 			= $this->input->post('kode_k',TRUE);
				$kode_w				= $this->input->post('kode_w',TRUE);
				$nama_pengusul   	= $this->input->post('nama_pengusul',TRUE);
				$no_telp         	= $this->input->post('no_telp',TRUE);
				$file 				= $data['upload_data']['file_name'];
				$NIK   				= $this->input->post('NIK',TRUE);

				$this->m_usulan_umum->save_usulan($kode_bidang,$kode_subbidang,$tahun_pengusulan,
					$nama_kegiatan,$waktu_mulai,$waktu_selesai,$anggaran,$alamat_kegiatan,
					$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,$alamat_institusi,$kode_k,
					$kode_w,$nama_pengusul,$no_telp,$file,$NIK);

			}

		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Saved</div>');
		redirect('usulan_umum');
		}
		
	}

	public function add_file(){
		
		$config['upload_path']="./files";
		$config['allowed_types']='pdf';		
		$config['max_size']	= '4096';
		$config['remove_space'] = TRUE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload->data());
			
			$kode_usulan = $this->input->post('kode_usulan');
			$file 	= $data['upload_data']['file_name'];

		$this->m_usulan_umum->add_file($kode_usulan,$file);


		}

		redirect('usulan_umum');
}

	function get_edit(){
		$kode_usulan = $this->uri->segment(3);
		$data['kode_usulan'] = $kode_usulan;
		$data['kode_bidang'] = $this->m_usulan_umum->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulan_umum->get_kecamatan()->result();
		$data['kode_k'] = $this->m_usulan_umum->get_k()->result();
		$data['kode_w'] = $this->m_usulan_umum->get_d()->result();
		$data['cekid']=$this->m_usulan_umum->cekid($kode_usulan)->row_array();
		$get_data = $this->m_usulan_umum->get_usulan_by_id($kode_usulan);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['kode_subbidang'] = $row['kode_subbidang'];
			$data['kode_wilayah'] = $row['kode_wilayah'];

		}
		$this->load->view('usulan_umum/ubah_usulan',$data);
	}

	function get_data_edit(){
		$kode_usulan = $this->input->post('kode_usulan',TRUE);
		$data = $this->m_usulan_umum->get_usulan_by_id($kode_usulan)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_usulan(){
	
	$this->load->library('form_validation');

	$this->form_validation->set_rules('kode_bidang', 'Nama Bidang', 'required');
	$this->form_validation->set_rules('kode_subbidang', 'Nama Subbidang', 'required');
	$this->form_validation->set_rules('kode_kecamatan', 'Kecamatan', 'required');
	$this->form_validation->set_rules('kode_wilayah', 'Desa', 'required');
	$this->form_validation->set_rules('tahun_pengusulan', 'Tahun Pengusulan', 'required|numeric|min_length[4]|max_length[4]');
	$this->form_validation->set_rules('anggaran', 'Anggaran', 'required|numeric');

		if (empty($_FILES['file']['name'])){

			$this->form_validation->set_rules('file', 'Document', 'required');

			}

		if ($this->form_validation->run() == FALSE)
		{	
			$data['NIK'] = $this->m_usulan_umum->get_NIK($this->session->userdata('ses_id'))->result();
			$data['kode_bidang'] = $this->m_usulan_umum->get_bidang()->result();
			$data['kode_kecamatan'] = $this->m_usulan_umum->get_kecamatan()->result();
			$data['kode_k'] = $this->m_usulan_umum->get_k()->result();
			$data['kode_w'] = $this->m_usulan_umum->get_d()->result();
			$this->load->view('usulan_umum/add_product_view',$data);
		}
		else
		{

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
			$kode_k        		= $this->input->post('kode_k',TRUE);
			$kode_w 	  	    = $this->input->post('kode_w',TRUE);
			$nama_pengusul   	= $this->input->post('nama_pengusul',TRUE);
			$NIK  				= $this->input->post('NIK',TRUE);
			$no_telp         	= $this->input->post('no_telp',TRUE);
	        
	        if($_FILES['file']['name'] == ""){
	            $file_name=$this->input->post('file_lama', TRUE);
	        }else{
	            $hapus = $this->input->post('file_lama', TRUE);
	            unlink('files/'.$hapus);
	            $dokumen=$_FILES['file']['name'];
	            $dir="file/"; //tempat file foto
	            $dirs="files/"; //tempat file foto
	            $file='file'; //name pada input type file
	           //name pada input type file
	            $vdir_upload = $dir;
	            $file_name=$_FILES[''.$file.'']["name"];
	            $vfile_upload = $vdir_upload . $file;
	            $tmp_name=$_FILES[''.$file.'']["tmp_name"];
	            move_uploaded_file($tmp_name, $dirs.$file_name);
	            rename($dirs.$file_name);
	        }
	            $data=array(
					'kode_usulan'=>$kode_usulan,
				'kode_bidang' 	    => $kode_bidang,
				'kode_subbidang'     => $kode_subbidang,
				'tahun_pengusulan' 	=> $tahun_pengusulan,
				'nama_kegiatan' 	=> $nama_kegiatan,
				'waktu_mulai' 	    => $waktu_mulai,
				'waktu_selesai'		=> $waktu_selesai,
				'anggaran' 	        => $anggaran,
				'alamat_kegiatan'   => $alamat_kegiatan,
				'kode_kecamatan' 	=> $kode_kecamatan,
				'kode_wilayah' 	    => $kode_wilayah,
				'deskripsi' 	   	=> $deskripsi,
				'nama_institusi' 	=> $nama_institusi,
				'alamat_institusi' 	=> $alamat_institusi,
				'kode_k'   			=> $kode_k,
				'kode_w'	   		=> $kode_w,
				'nama_pengusul'   	=> $nama_pengusul,
				'NIK'   			=> $NIK,
				'no_telp'         	=> $no_telp,
				'file'=>$file_name

			);
			$this->m_usulan_umum->update_usulan($data,$kode_usulan);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Updated</div>');
			redirect('usulan_umum');
		}
	}

	//Delete usulan from Database
	function delete(){
		$kode_usulan = $this->uri->segment(3);
		$this->m_usulan_umum->delete_usulan($kode_usulan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Deleted</div>');
		redirect('usulan_umum');
	}
}