<?php
 
class M_Berkas extends CI_Model {
 
    var $table = 'berkas'; //nama tabel dari database
    var $column_order = array(null,'nama_bidang','nama_sub','tahun_pengusulan','nama_kegiatan','anggaran','alamat_kegiatan','desa_kegiatan','kecamatan','nama_institusi','alamat_institusi','desa_institusi','kecamatan_institusi','no_telp','file','kode_berkas'); //field yang ada di table user
    var $column_search = array('kode_berkas','nama_bidang','nama_sub','tahun_pengusulan','nama_kegiatan','anggaran','alamat_kegiatan','desa_kegiatan','kecamatan','nama_institusi','alamat_institusi','desa_institusi','kecamatan_institusi','no_telp','file'); //field yang diizin untuk pencarian 
    var $order = array('kode_berkas' => 'asc'); // default order 
 
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
    
function singleBerkas(){
    $kode_berkas=$this->uri->segment(3);
    $this->db->where('kode_berkas',$kode_berkas);
    $data=$this->db->get('berkas');
    return $data->row_array();

}
    //insert data method
  function insertBerkas(){
    $data=array(
        'kode_berkas' => $this->input->post('kode_berkas'),
        'kode_subbidang'        => $this->input->post('kode_subbidang'),
        'tahun_pengusulan'  => $this->input->post('tahun_pengusulan'),
        'nama_kegiatan'  => $this->input->post('nama_kegiatan'),
        'anggaran'  => $this->input->post('angaran'),
        'alamat_kegiatan' => $this->input->post('alamat_kegiatan'),
        'desa_kegiatan' => $this->input->post('desa_kegiatan'),
        'kecamatan' => $this->input->post('kecamatan'),
        'nama_institusi' => $this->input->post('nama_institusi'),
        'alamat_institusi' => $this->input->post('alamat_institusi'),
        'desa_institusi' => $this->input->post('desa_institusi'),
        'kecamatan_institusi' => $this->input->post('kecamatan_institusi'),
        'no_telp' => $this->input->post('no_telp'),
        'file' => $this->input->post('file')

    );
    $result=$this->db->insert('berkas', $data);
    return $result;
}
//update data method
function updateBerkas(){
    $kode_berkas=$this->input->post('kode_berkas');
    $data=array(
        'kode_subbidang'        => $this->input->post('kode_subbidang'),
        'tahun_pengusulan'  => $this->input->post('tahun_pengusulan'),
        'nama_kegiatan'  => $this->input->post('nama_kegiatan'),
        'anggaran'  => $this->input->post('anggaran'),
        'alamat_kegiatan' => $this->input->post('alamat_kegiatan'),
        'desa_kegiatan' => $this->input->post('desa_kegiatan'),
        'kecamatan' => $this->input->post('kecamatan'),
        'nama_institusi' => $this->input->post('nama_institusi'),
        'alamat_institusi' => $this->input->post('alamat_institusi'),
        'desa_institusi' => $this->input->post('desa_institusi'),
        'kecamatan_institusi' => $this->input->post('kecamatan_institusi'),
        'no_telp' => $this->input->post('no_telp'),
        'file' => $this->input->post('file')


    );
    $this->db->where('kode_berkas',$kode_berkas);
    $result=$this->db->update('berkas', $data);
    return $result;
}
//delete data method
function deleteBerkas(){
    $kode_berkas=$this->uri->segment(3);
    $this->db->where('kode_berkas',$kode_berkas);
    $result=$this->db->delete('berkas');
    return $result;
}


}