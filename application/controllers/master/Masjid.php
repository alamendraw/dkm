<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masjid extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('mosques');     
		$this->data['url'] = site_url('master/masjid');  

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Masjid');
		  
		$this->data['title'] = 'Kelola Data Masjid';
		$this->data['data'] = $this->mosques->get();
		$this->load->view('master/index_masjid',$this->data);
	}
  
	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		
		$item['name'] = $data['name']; 
		$item['ketua_dkm'] = $data['ketua_dkm']; 
		$item['sekertaris'] = $data['sekertaris']; 
		$item['bendahara'] = $data['bendahara']; 
		$item['phone'] = $data['phone']; 
		$item['fax'] = $data['fax']; 
		$item['email'] = $data['email']; 
		$item['website'] = $data['website']; 
		$item['address'] = $data['address']; 

		$save = $this->mosques->update($item,['id'=>$data['id']]); 
	 
		if($save){ 
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Diubah.';
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function delete($id){
		$delete = $this->mosques->delete(['id'=>$id]);
		if($delete){
			$return['status'] = 'success';
			$return['title'] = 'Sukses !';
			$return['message'] = 'Data Berhasil Terhapus.';
		}else{
			$return['status'] = 'error';
			$return['title'] = 'Gagal !';
			$return['message'] = 'Data Gagal Terhapus.';
		}
		
		echo json_encode($return);
	}
 
}
