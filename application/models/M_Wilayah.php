<?php
 
class M_Wilayah extends CI_Model {
 
    var $table = 'tb_wilayah'; //nama tabel dari database
    var $column_order = array(null,'desa','kecamatan','kabupaten','provinsi','kode_wilayah'); //field yang ada di table user
    var $column_search = array('kode_wilayah','desa','kecamatan','kabupaten','provinsi'); //field yang diizin untuk pencarian 
    var $order = array('kode_wilayah' => 'asc'); // default order 
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query(){
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
function singleWilayah(){
    $kode_wilayah=$this->uri->segment(3);
    $this->db->where('kode_wilayah',$kode_wilayah);
    $data=$this->db->get('tb_wilayah');
    return $data->row_array();

}
    //insert data method
  function insertWilayah(){
    $data=array(
        'kode_wilayah'        => $this->input->post('kode_wilayah'),
        'desa'        => $this->input->post('kota'),
        'kecamatan'  => $this->input->post('kecamatan'),
        'kabupaten'  => $this->input->post('pass'),
        'provinsi'  => $this->input->post('provinsi')


    );
    $result=$this->db->insert('tb_wilayah', $data);
    return $result;
}
//update data method
function updateWilayah(){
    $kode_wilayah=$this->input->post('kode_wilayah');
    $data=array(
        'desa'        => $this->input->post('kota'),
        'kecamatan'  => $this->input->post('kecamatan'),
        'kabupaten'  => $this->input->post('pass'),
        'provinsi'  => $this->input->post('provinsi')
    );
    $this->db->where('kode_wilayah',$kode_wilayah);
    $result=$this->db->update('tb_wilayah', $data);
    return $result;
}
//delete data method
function deleteWilayah(){
    $kode_wilayah=$this->uri->segment(3);
    $this->db->where('kode_wilayah',$kode_wilayah);
    $result=$this->db->delete('tb_wilayah');
    return $result;
}


}