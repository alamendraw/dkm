<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invited_guests extends MY_Model {

  public $table = 'invited_guests';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  public function get_list(){
    $this->db->select("*");
    $this->db->from("$this->table"); 
    $this->db->order_by("name asc"); 
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
}