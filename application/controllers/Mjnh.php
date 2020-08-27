<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mjnh extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		 
		$this->data['url'] = site_url('mjnh');    
		

	}
	public function index()
	{  

		$this->load->view('web/home',$this->data);
		
	}
}
