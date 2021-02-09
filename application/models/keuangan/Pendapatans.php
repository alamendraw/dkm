<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatans extends MY_Model {

  public $table = 'transaction';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  public function get_list(){
    $this->db->select("id,date,debet,description");
    $this->db->from("$this->table"); 
    $this->db->where("debet!=0");
    $this->db->order_by("date desc");
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  public function get_report($bln){
    $this->db->select("t.no_kas,t.date,t.debet,t.description");
    $this->db->from("$this->table t"); 
    $this->db->join("rekening3 r", "t.kd_rek=r.id", "inner");
    $this->db->where(['r.kd_rek1'=>'1','MONTH(t.date)'=>$bln]);
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  public function get_data($id){
    $this->db->select("t.*");
    $this->db->from("$this->table t");
    $this->db->where(['id'=>$id]);
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  public function get_last_kas(){
    $this->db->select("(MAX(no_kas)*1)AS kas");
    $this->db->from($this->table);
    $query = $this->db->get()->result()[0]->kas;
    return $query;
  }
  
}