<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekenings extends MY_Model {

  public $table = 'rekening';
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

  public function nm_rek($kd,$jns){
    $this->db->select('rs.*');
    $this->db->from("$this->table rd");
    if($jns==1){
      $this->db->join("rek1 rs","rd.kd_rek1=rs.id","inner");
    }else{
      $this->db->join("rek2 rs","rd.kd_rek2=rs.kd_rek2","inner");
    }
     
    $this->db->where(['rd.id'=>$kd]);
    $query = $this->db->get()->row('name');
    return $query;
  }

  public function get_rek($kd1,$kd2){
    $this->db->select('IFNULL((MAX(kd_rek3)+1),1)AS new_rek');
    $this->db->from($this->table); 
    $this->db->where(['kd_rek1'=>$kd1,'kd_rek2'=>$kd2]); 
    $query = $this->db->get()->row('new_rek');
    return $query;
  }


  public function get_list(){
    $this->db->select('*');
    $this->db->from($this->table); 
    $this->db->order_by("kd_rek1,kd_rek2,kd_rek3"); 
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  
}