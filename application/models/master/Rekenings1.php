<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekenings1 extends MY_Model {

  public $table = 'rekening1';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  }  

  public function dropdown(){
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->group_by('id');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_list(){
    $this->db->select('*');
    $this->db->from($this->table); 
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  
}