<?php
class M_Login extends CI_Model{
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM tb_user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_pemimpin($username,$password){
        $query=$this->db->query("SELECT * FROM tb_user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
}