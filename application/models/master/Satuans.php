<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Satuans extends MY_Model {

  public $table = 'unit';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 
 
  
}