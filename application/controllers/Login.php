<?php
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
        $password=MD5(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));

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
                    $cek_pemimpin=$this->M_Login->auth_pemimpin($username,$password);
                    if($cek_pemimpin->num_rows() > 0){
                        $data=$cek_pemimpin->row_array();
                        $this->session->set_userdata('masuk',TRUE);
                        $this->session->set_userdata('akses','2');
                        $this->session->set_userdata('ses_id',$data['id']);
                        $this->session->set_userdata('ses_nama',$data['nama']);
                        //echo "Mitra";
                        redirect('dashboard');
                    }else{
                        $url=base_url();
                        echo $this->session->set_flashdata('msg','username atau Password Salah');
                        echo "Gagal";
                    }
                    
                 }
        }
    }
    function exit(){
        $this->session->sess_destroy();
        $url=base_url('/');
        redirect($url);
    }
}