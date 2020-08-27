<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	public function index()
	{ 
		$this->load->view('template');
	}

	public function getContent(){ 
		$this->load->view('content');  
	}
	public function test(){ 
		$mpdf = new \Mpdf\Mpdf();
		$data = 'alam';
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}
}
