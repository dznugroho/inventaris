<?php
class M_tampil extends CI_Model{
    public function hitungJumlahdesa()
{   
    $query = $this->db->get('tb_wilayah');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
 
}