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
                    $this->session->set_userdata('ses_level',$data['level']);

                    redirect('dashboard');
                 }
					//echo"Admin";
        }else{
                $cek_individu=$this->M_Login->auth_individu($username,$password);
                if($cek_individu->num_rows() > 0){
                    $data=$cek_individu->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                        if($data['level']=='2'){
                            $this->session->set_userdata('akses','2');
                            $this->session->set_userdata('ses_id',$data['nik']);
                            $this->session->set_userdata('ses_level',$data['level']);
                            $this->session->set_userdata('ses_nama',$data['nama_depan']);
                            redirect('dashboard'); 
                        }
                    
                     
                }else{
                    $cek_kecamatan=$this->M_Login->auth_kecamatan($username,$password);
                    if($cek_kecamatan->num_rows() > 0){
                        $data=$cek_kecamatan->row_array();
                        $this->session->set_userdata('masuk',TRUE);
                         if($data['level']=='3'){
                            $this->session->set_userdata('akses','3');
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            $this->session->set_userdata('ses_level',$data['level']);
                            $this->session->set_userdata('ses_kodekec',$data['kode_kecamatan']);
        
                            redirect('dashboard');
                
                        }
                }else{

                    $cek_perusahaan=$this->M_Login->auth_perusahaan($username,$password);
                        if($cek_perusahaan->num_rows() > 0){
                            $data=$cek_perusahaan->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            if($data['level']=='4'){
                                $this->session->set_userdata('akses','4');
                                $this->session->set_userdata('ses_id',$data['id']);
                                $this->session->set_userdata('ses_nama',$data['nama_perusahaan']);
                                $this->session->set_userdata('ses_level',$data['level']);

                                redirect('dashboard');
                            }

                        }else{

                            $url=base_url('login');
                            echo $this->session->set_flashdata('msg','username atau Password Salah');
                            echo "Gagal";
                            redirect($url);
                        }


                    }

                }
            
        }
                 
            
    }
    function exit(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
}