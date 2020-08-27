<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening1 extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('master/rekenings1');  
		$this->data['url'] = site_url('master/rekening/rekening1');

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Rekening 1');
		  
		$this->data['title'] = 'Kelola Data Rekening 1';
		$this->data['list'] = $this->rekenings1->get_list();
		$this->load->view('master/rekening/index_rekening1',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		$this->output->set_title('Tambah Rekening 1');

		$this->data['action'] = 'create'; 
		$this->data['title'] = 'Tambah Data Rekening 1';  
		$this->load->view('master/rekening/form_rekening1',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		$this->output->set_title('Ubah Rekening 1');

		$this->data['action'] = 'update'; 
		$this->data['title'] = 'Ubah Data Rekening 1'; 
		$this->data['data'] = $this->rekenings1->get($id); 
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('master/rekening/form_rekening1',$this->data);
	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		 
		$item['name'] = $data['name'];  

		if($data['action']=='create'){
			$save = $this->rekenings1->insert($item); 
		}else{
			$save = $this->rekenings1->update($item,['id'=>$data['id']]); 
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
		$delete = $this->rekenings1->delete(['id'=>$id]);
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
