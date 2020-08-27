<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('users'); 
		$this->load->model('mosques'); 
		$this->load->library('password'); 

	}

	public function index()
	{
		$this->load->view('register');
	}

	public function signup(){
		
		$mosque['code'] = $_REQUEST['mosquecode'];
		$mosque['name'] = $_REQUEST['mosquename'];
		$user['username'] = $_REQUEST['name'];
		$user['password'] = $this->password->hash_password($_REQUEST['password']); 
		$saveMosque = $this->mosques->insert($mosque);
		if($saveMosque){ 
			$user['mosque_id'] = $saveMosque;
			$this->users->insert($user);
			redirect('login', 'refresh');
		}else{ 
			redirect('register', 'refresh');
		} 
	}
}
