<?php
class M_Login extends CI_Model{
    function auth_admin($email,$password){
        $query=$this->db->query("SELECT * FROM user WHERE email='$email' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_pemimpin($email,$password){
        $query=$this->db->query("SELECT * FROM user WHERE email='$email' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
}