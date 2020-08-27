<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksis extends MY_Model {

  public $table = 'transaction';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 
 
  public function buku_kas($bln){ 
    $query = $this->db->query("CALL buku_kas($bln)");
    return ($query)?$query->result():false;
  }
   
  public function lap_jumat($date_start,$date_end,$date_start_be,$date_end_be){ 
    $query = $this->db->query("CALL rep_jumat('$date_start','$date_end','$date_start_be','$date_end_be')");
    return ($query)?$query->result():false;
  }
  public function get_jumat_month($month){
    $this->db->select('*');
    $this->db->from('m_jumat');
    $this->db->where('month',$month);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_jum($bln,$jum){ 
    $this->db->select("date_start,date_end,
    (select date_start from m_jumat where id=t.id-1)as date_start_be,
    (select date_end from m_jumat where id=t.id-1)as date_end_be");
    $this->db->from("m_jumat t");
    $this->db->where("month=$bln and no=$jum");
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }

  public function get_rekap_jumat($id){
    $query = $this->db->query("call rekap_jumat($id)");
    return $query->result();
  }
 
  public function list_transaksi(){
    $query = $this->db->query("SELECT * from transaction where id_budget is null and deleted_at is null order by date desc");
    return $query->result();
  }

  public function get_data($id){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where(['id'=>$id]);
    $query = $this->db->get();
    return $query->result();
  }
  
}