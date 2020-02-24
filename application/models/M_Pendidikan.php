<?php
 
class M_Pendidikan extends CI_Model {
 
    var $table = 'pendidikan'; //nama tabel dari database
    var $column_order = array(null,'nama_sub','kode_subbidang'); //field yang ada di table user
    var $column_search = array('kode_subbidang','nama_sub'); //field yang diizin untuk pencarian 
    var $order = array('kode_subbidang' => 'asc'); // default order 
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // function count_pendidikan(){
    //     $select =   array('tb_subbidang.nama_sub','count(tb_usulan.kode_subbidang) as Total');  
    //     $this->db->select($select);
    //     $this->db->from('tb_subbidang');
    //     $this->db->join('tb_bidang','tb_bidang.kode_bidang = tb_subbidang.parent_bidang','left');
    //     $this->db->get();
    //     $this->db->result_array();
      
    // }

    // function get_pendidikan(){
    //     $this->db->select('nama_bidang,kode_subbidang,nama_sub');
    //     $this->db->from('tb_subbidang');
    //     $this->db->join('tb_bidang','tb_bidang.kode_bidang = tb_subbidang.parent_bidang','left');
    //     $this->db->where('parent_bidang',01);
    //     $query = $this->db->get();
    //     return $query;
    // }
 
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
    
function singlePendidikan(){
    $kode_subbidang=$this->uri->segment(3);
    $this->db->where('kode_subbidang',$kode_subbidang);
    $data=$this->db->get('pendidikan');
    return $data->row_array();

}
    //insert data method
  function insertPendidikan(){
    $data=array(
        'kode_subbidang'        => $this->input->post('kode_subbidang'),
        'nama_sub'        => $this->input->post('nama_sub')


    );
    $result=$this->db->insert('pendidikan', $data);
    return $result;
}
//update data method
function updatePendidikan(){
    $kode_subbidang=$this->input->post('kode_subbidang');
    $data=array(
        'nama_sub'        => $this->input->post('nama_sub')

    );
    $this->db->where('kode_subbidang',$kode_subbidang);
    $result=$this->db->update('pendidikan', $data);
    return $result;
}


}