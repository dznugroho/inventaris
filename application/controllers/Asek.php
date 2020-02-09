<?php
class Asek extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_upload');
		
	}

	function index(){
		$this->load->view('coba');	
	}


	function do_upload(){
        $config['upload_path']="./files";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = FALSE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());

	        $nama= $this->input->post('nama');
	        $file= $data['upload_data']['file_name']; 
	        
	        $result= $this->m_upload->simpan_upload($nama,$file);
	        echo json_decode($result);
        }

     }
	
}