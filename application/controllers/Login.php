<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Login');
    }
 
    function index(){
        $this->load->view('login');
    }
 
    function auth(){
		//print_r($_POST);
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_admin=$this->M_Login->auth_admin($username,$password);
 
        if($cek_admin->num_rows() > 0){
                $data=$cek_admin->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['level']=='1'){
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
					redirect('dashboard');
					//echo"Admin";
                 }else{
                        $this->session->set_userdata('akses','2');
                        $this->session->set_userdata('ses_id',$data['id']);
                        $this->session->set_userdata('ses_nama',$data['nama']);
                        redirect('dashboard'); 
                 }
 
            }else{
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','username atau Password Salah');
                echo "Gagal";
                redirect($url);

            }
    }
    function exit(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
}