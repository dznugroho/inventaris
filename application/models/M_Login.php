<?php
class M_Login extends CI_Model{
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM tb_user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
    function auth_individu($username,$password){
        $query=$this->db->query("SELECT * FROM registrasi WHERE NIK='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_kecamatan($username,$password){
        $query=$this->db->query("SELECT * FROM tbu_kecamatan WHERE kode_kecamatan='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    function auth_perusahaan($username,$password){
        $query=$this->db->query("SELECT * FROM tb_perusahaan WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
 
}