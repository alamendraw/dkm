<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		 
	}
	public function get_data() { 		
		header('Access-Control-Allow-Origin: *'); 
		header('Content-Type: application/json');	
		$sql = $this->db->query("SELECT date tanggal, debet nilai, description keterangan from transaction where debet !=0 limit 10");
		$data = $sql->result_array();
		echo json_encode($data);
	} 
}
