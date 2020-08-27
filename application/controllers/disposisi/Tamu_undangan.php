<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu_undangan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		} 
		  
		$this->load->model('disposisi/invited_guests');  
		$this->data['url'] = site_url('disposisi/tamu_undangan');	 

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Tamu Undangan');
		  
		$this->data['title'] = 'Tamu Undangan';
		$this->data['list'] = $this->invited_guests->get_list();
		$this->load->view('disposisi/index_tamu',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		 
		$this->output->set_title('Tambah Tamu Undangan');
		$this->data['title'] = 'Tambah Data Tamu Undangan';  
		  
		$this->data['action'] = 'create'; 
		
		$this->load->view('disposisi/form_tamu',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Ubah Tamu Undangan');
		$this->data['title'] = 'Ubah Data Tamu Undangan';  
		$field = $this->invited_guests->get($id);   
		$this->data['action'] = 'update';   
		$this->data['data'] = $field;  
		$this->load->view('disposisi/form_tamu',$this->data);
	}
 
	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true); 

		$item['name'] = $data['name'];  
		$item['address'] = $data['address'];  
		if($data['action']=='create'){ 
			$save = $this->invited_guests->insert($item); 
		}else{
			$save = $this->invited_guests->update($item,['id'=>$data['id']]); 
		}
		
		if($save){
			if($data['action']=='create'){
				$return['status'] = 'success';
				$return['message'] = 'Data Berhasil Tersimpan.';
			}else{
				$return['status'] = 'success';
				 $return['message'] = 'Data Berhasil Diubah.';
			} 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function delete($id){
		$delete = $this->invited_guests->delete(['id'=>$id]);
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
