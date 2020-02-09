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
public function desaku(){
  $query = $this->db->query('SELECT COUNT( kode_wilayah ) FROM tb_wilayah
    ');
  return $query->result();
}
function tampil_desa(){
  $this->db->select('kode_wilayah, desa, kabupaten,provinsi,kode_kecamatan_wilayah, COUNT(desa) as total');
   $this->db->group_by('desa'); 
   $this->db->order_by('total', 'desc'); 
   $hasil = $this->db->get('tb_wilayah');
  return $hasil;
  }
 
}