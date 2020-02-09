<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_tampil','m_tampil');
		$this->load->library('session');
    }
    function index(){
        $b[data] = $this->m_tampil->tampil_desa();
        $this->load->view('view_tampil',$b);
       }
    
}