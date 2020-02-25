<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulankec extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Usulankec','m_usulankec');
		$this->load->library('session');
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	}

	function index(){
		if($this->session->userdata('akses')!='3') redirect('dashboard');

		$data['usulankec'] = $this->m_usulankec->get_usulankec();
		$data['kode_bidang'] = $this->m_usulankec->get_bidang()->result();
		$this->load->view('usulankec/daftar_usulan',$data);
	}

	function cari() {
		$data['usulankec']=$this->m_usulankec->caridata();
		//jika data yang dicari tidak ada maka akan keluar informasi 
		//bahwa data yang dicari tidak ada
			$data['kode_bidang'] = $this->m_usulankec->get_bidang()->result();

			$this->load->view('usulankec/daftar_usulan',$data); 
 
		  
	   }

	// add new usulan
	function add_new(){
		
		$data['id_kec'] = $this->m_usulankec->get_sessionkec($this->session->userdata('ses_id'))->result();
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
	
	function detail_usulan(){
		$data['detail_usulan'] = $this->m_usulankec->get_detail();

		$this->load->view('usulankec/detail_usulan',$data);
	}

	public function save_usulankec(){

	$this->load->library('form_validation');

	$this->form_validation->set_rules('kode_bidang', 'Nama Bidang', 'required');
	$this->form_validation->set_rules('kode_subbidang', 'Nama Subbidang', 'required');
	$this->form_validation->set_rules('kode_kecamatan', 'Kecamatan', 'required');
	$this->form_validation->set_rules('kode_wilayah', 'Desa', 'required');
	$this->form_validation->set_rules('tahun_pengusulan', 'Tahun Pengusulan', 'required|numeric|min_length[4]|max_length[4]');
	$this->form_validation->set_rules('anggaran', 'Anggaran', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{	
			$data['id_kec'] = $this->m_usulankec->get_sessionkec($this->session->userdata('ses_id'))->result();
			$data['desas'] = $this->m_usulankec->get_desa($this->session->userdata('ses_kodekec'))->result();
			$data['desass'] = $this->m_usulankec->get_dk($this->session->userdata('ses_kodekec'))->result();
			$data['kode_bidang'] = $this->m_usulankec->get_bidang()->result();
			$data['kode_kecamatan'] = $this->m_usulankec->get_kecamatan()->result();
			$data['kode_k'] = $this->m_usulankec->get_k()->result();
			$this->load->view('usulankec/add_product_view',$data);
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
				
				$file 				= $data['upload_data']['file_name'];
			}

			if (empty($_FILES['file']['name'])){

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

				$this->m_usulankec->save($kode_bidang,$kode_subbidang,$tahun_pengusulan,
					$nama_kegiatan,$waktu_mulai,$waktu_selesai,$anggaran,$alamat_kegiatan,
					$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,$alamat_institusi,
					$kode_k,$kode_w,$nama_pengusul,$no_telp);
			}else{

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

				$this->m_usulankec->save_usulan($kode_bidang,$kode_subbidang,$tahun_pengusulan,
					$nama_kegiatan,$waktu_mulai,$waktu_selesai,$anggaran,$alamat_kegiatan,
					$kode_kecamatan,$kode_wilayah,$deskripsi,$nama_institusi,$alamat_institusi,
					$kode_k,$kode_w,$nama_pengusul,$no_telp,$file);

				}
			}
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Saved</div>');
		redirect('usulankec');
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

		$this->m_usulankec->add_file($kode_usulan,$file);


		}

		redirect('usulankec');
}

	function get_edit(){
		$data['id_kec'] = $this->m_usulankec->get_sessionkec($this->session->userdata('ses_id'))->result();
		$kode_usulan = $this->uri->segment(3);
		$data['kode_usulan'] = $kode_usulan;
		$data['desas'] = $this->m_usulankec->get_desa($this->session->userdata('ses_kodekec'))->result();
		$data['desass'] = $this->m_usulankec->get_dk($this->session->userdata('ses_kodekec'))->result();
		$data['kode_bidang'] = $this->m_usulankec->get_bidang()->result();
		$data['kode_kecamatan'] = $this->m_usulankec->get_kecamatan()->result();
		$data['kode_k'] = $this->m_usulankec->get_k()->result();
		$data['cekid']=$this->m_usulankec->cekid($kode_usulan)->row_array();
		$get_data = $this->m_usulankec->get_usulankec_by_id($kode_usulan);
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
		$data = $this->m_usulankec->get_usulankec_by_id($kode_usulan)->result();
		echo json_encode($data);
	}

	//update usulan to database
	function update_usulankec(){

	$this->load->library('form_validation');

	$this->form_validation->set_rules('kode_bidang', 'Nama Bidang', 'required');
	$this->form_validation->set_rules('kode_subbidang', 'Nama Subbidang', 'required');
	$this->form_validation->set_rules('kode_kecamatan', 'Kecamatan', 'required');
	$this->form_validation->set_rules('kode_wilayah', 'Desa', 'required');
	$this->form_validation->set_rules('tahun_pengusulan', 'Tahun Pengusulan', 'required|numeric|min_length[4]|max_length[4]');
	$this->form_validation->set_rules('anggaran', 'Anggaran', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{	
			$data['id_kec'] = $this->m_usulankec->get_sessionkec($this->session->userdata('ses_id'))->result();
			$kode_usulan = $this->uri->segment(3);
			$data['kode_usulan'] = $kode_usulan;
			$data['desas'] = $this->m_usulankec->get_desa($this->session->userdata('ses_kodekec'))->result();
			$data['desass'] = $this->m_usulankec->get_dk($this->session->userdata('ses_kodekec'))->result();
			$data['kode_bidang'] = $this->m_usulankec->get_bidang()->result();
			$data['kode_kecamatan'] = $this->m_usulankec->get_kecamatan()->result();
			$data['kode_k'] = $this->m_usulankec->get_k()->result();
			$data['cekid']=$this->m_usulankec->cekid($kode_usulan)->row_array();
			$get_data = $this->m_usulankec->get_usulankec_by_id($kode_usulan);
			if($get_data->num_rows() > 0){
				$row = $get_data->row_array();
				$data['kode_subbidang'] = $row['kode_subbidang'];
				$data['kode_wilayah'] = $row['kode_wilayah'];
				$data['kode_w'] = $row['kode_w'];

			}
			$this->load->view('usulankec/ubah_usulan',$data);
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
				
				$file 				= $data['upload_data']['file_name'];
			}

			if (empty($_FILES['file']['name'])){
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
				$no_telp         	= $this->input->post('no_telp',TRUE);
				
				$data=array(
					'kode_usulan'		=>$kode_usulan,
					'kode_bidang' 	    => $kode_bidang,
					'kode_subbidang'    => $kode_subbidang,
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
					'kode_w'	    	=> $kode_w,
					'nama_pengusul'   	=> $nama_pengusul,
					'no_telp'         	=> $no_telp
				);

				$this->m_usulankec->update($data,$kode_usulan);
			}else{

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
			$kode_k        = $this->input->post('kode_k',TRUE);
			$kode_w	    = $this->input->post('kode_w',TRUE);
			$nama_pengusul   	= $this->input->post('nama_pengusul',TRUE);
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
				'kode_k'   => $kode_k,
				'kode_w'	    => $kode_w,
				'nama_pengusul'   	=> $nama_pengusul,
				'no_telp'         	=> $no_telp,
				'file'=>$file_name

			);
			$this->m_usulankec->update_usulankec($data,$kode_usulan);

		}
			$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Updated</div>');
			redirect('usulankec');
		}
	}

	//Delete usulan from Database
	function delete(){
		$kode_usulan = $this->uri->segment(3);
		$this->m_usulankec->delete_usulankec($kode_usulan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Usulan Deleted</div>');
		redirect('usulankec');
	}
	//serch

	
}