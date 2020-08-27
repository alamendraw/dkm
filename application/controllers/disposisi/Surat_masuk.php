<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		} 
		  
		$this->load->model('disposisi/surat_masuks');  
		$this->data['url'] = site_url('disposisi/surat_masuk');	 

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Disposisi');
		  
		$this->data['title'] = 'Surat Masuk';
		$this->data['list'] = $this->surat_masuks->get_list();
		$this->load->view('disposisi/index_masuk',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		 
		$this->output->set_title('Tambah Surat Masuk');
		$this->data['title'] = 'Tambah Data Surat Masuk';  
		  
		$this->data['action'] = 'create'; 
		
		$this->load->view('disposisi/form_masuk',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Ubah Surat Masuk');
		$this->data['title'] = 'Ubah Data Surat Masuk';  
		$field = $this->surat_masuks->get($id);   
		$this->data['action'] = 'update';   
		$this->data['data'] = $field;  
		$this->load->view('disposisi/form_masuk',$this->data);
	}
 
	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true); 

		$item['no_mail'] = $data['no_mail'];
		$item['date'] = mysql_date($data['date']);
		$item['type'] = $data['type'];
		$item['address'] = $data['address']; 
		$item['description'] = $data['description'];  
		if($data['action']=='create'){ 
			$save = $this->surat_masuks->insert($item); 
		}else{
			$save = $this->surat_masuks->update($item,['id'=>$data['id']]); 
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
		$delete = $this->surat_masuks->delete(['id'=>$id]);
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
