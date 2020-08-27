<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mosques extends MY_Model {

  public $table = 'mosque';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  
  
}