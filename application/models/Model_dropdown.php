<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_dropdown extends CI_Model
{
	public function tampil_data()
	{
		$query = $this->db->get('tb_bidang');
		return $query;
	}
 
	public function tampil_data_chained($id)
	{
		$query = $this->db->query("SELECT * FROM tb_subbidang where parent_bidang = '$id'");
		return $query;
	}
 
}