<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil extends CI_Controller {
    $data['total_desa'] = $this->M_tampil->hitungJumlahdesa();

}