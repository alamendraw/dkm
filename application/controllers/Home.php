<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}   
		$this->load->model('homes');
		$this->data['url'] = site_url('home');    
		

	}
	public function index()
	{  
		$this->output->set_template('template');
		$this->output->set_title('Dashboard'); 
		$this->data['title'] = 'Dashboard'; 
		$this->data['dash'] = $this->homes->get_dash()[0]; 
		$this->load->view('dashboard',$this->data);
		
	}

	function get_404(){
		$this->output->set_template('template');
		$this->output->set_title('404');  
		$this->load->view('404');

	}
	function coming_soon(){
		$this->output->set_template('template');
		$this->output->set_title('404');  
		$this->load->view('coming_soon');

	}

	public function dashboard(){
		$this->output->set_template('template');
		$this->output->set_title('Dashboard');
		  
		$this->data['title'] = 'Dashboard'; 
		$this->load->view('dashboard',$this->data);
	}

	public function getContent(){ 
		$this->load->view('content');  
	}
	public function test(){ 
		$this->load->view('test');  
	}
}
