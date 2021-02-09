<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekenings2 extends MY_Model {

  public $table = 'rekening2';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 
  
  public function dropdown($id){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where(['kd_rek1'=>$id]);
    $this->db->group_by('id');
    $query = $this->db->get();
    return $query->result();
  }

  public function dropdown2($id){
    $this->db->select('rd.*');
    $this->db->from("$this->table rd");
    $this->db->join("rekening3 re","rd.kd_rek1=re.kd_rek1 and rd.kd_rek2=re.kd_rek2","join");
    $this->db->where("re.id=$id");
    $this->db->group_by('id');
    $query = $this->db->get();
    return $query->result();
  }

  public function nm_rek($kd){
    $this->db->select('rs.*');
    $this->db->from("$this->table rd");
    $this->db->join("rek1 rs","rd.kd_rek1=rs.id","inner");
    $this->db->where(['rd.id'=>$kd]);
    $query = $this->db->get()->row('name');
    return $query;
  }

  public function get_rek($kd){
    $this->db->select('(MAX(kd_rek2)+1)AS new_rek');
    $this->db->from($this->table); 
    $this->db->where(['kd_rek1'=>$kd]); 
    $query = $this->db->get()->row('new_rek');
    return $query;
  }

  public function get_list(){
    $this->db->select('*');
    $this->db->from($this->table); 
    $this->db->order_by("kd_rek1,kd_rek2");
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  
}