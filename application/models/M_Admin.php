<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model{
	

	function save_admin($id,$nama,$username,$password,$level){
		$data = array(
			
            'id' 	    => $id,
            'nama'    	=> $nama,
            'username' 	=> $username,
            'password' 	=> MD5($password),
            'level' 	=> $level
            
			
		);
		$this->db->insert('tb_user',$data);
	}

	function get_admin(){
		$this->db->select('id,nama,username,password,nama_akses');
		$this->db->from('tb_user');
		$this->db->join('akses','akses.id_akses = tb_user.level','left');
		$query = $this->db->get();
		return $query;
	}

	function get_admin_by_id($id){
		$query = $this->db->get_where('tb_user', array('id' => $id));
		return $query;
	}

	function update_admin($id,$nama,$username,$level){
        $this->db->set('nama' 	    		, $nama);
        $this->db->set('username'     		, $username);
		$this->db->set('level' 	    		, $level);
		$this->db->where('id'				, $id);
		$this->db->update('tb_user');
	}
	function changepass($id,$password){
        $this->db->set('password' 			, MD5($password));
		$this->db->where('id'				, $id);
		$this->db->update('tb_user');
	}

	//Delete admin
	function delete_admin($id){
		$this->db->delete('tb_user', array('id' => $id));
	}

	
}
