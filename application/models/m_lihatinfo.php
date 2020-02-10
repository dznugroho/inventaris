<?php
 
class m_lihatinfo extends CI_Model {
 
    var $table = 'lihatinfo'; //nama tabel dari database
    var $column_order = array(null,'nama_kecamatan','kode_kecamatab'); //field yang ada di table user
    var $column_search = array('kode_kecamatan','nama_kecamatan'); //field yang diizin untuk pencarian 
    var $order = array('kode_kecamatan' => 'asc'); // default order 
 
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
    
function singlelihatinfo(){
    $kode_subbidang=$this->uri->segment(3);
    $this->db->where('kode_kecamatan',$kode_kecamatan);
    $data=$this->db->get('db_kecamatan');
    return $data->row_array();

}
    //insert data method
  function insertlihatinfo(){
    $data=array(
        'kode_kecamatan'        => $this->input->post('kode_kecamatan'),
        'nama_kecamatan'        => $this->input->post('nama_kecamatan')


    );
    $result=$this->db->insert('db_kecamatan', $data);
    return $result;
}
//update data method
function updatelihatinfo(){
    $kode_subbidang=$this->input->post('kode_kecamatan');
    $data=array(
        'nama_kec'        => $this->input->post('nama_kec')

    );
    $this->db->where('kode_kecamatan',$kode_kecamatan);
    $result=$this->db->update('lihatinfo', $data);
    return $result;
} 
//delete data method
function deletelihatinfo(){
    $kode_kecamatan=$this->uri->segment(3);
    $this->db->where('kode_kecamatan',$kode_kecamatan);
    $result=$this->db->delete('lihatinfo');
    return $result;
}


}