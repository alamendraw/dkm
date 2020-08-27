<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening2 extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('master/rekenings1');  
		$this->load->model('master/rekenings2');  
		$this->data['url'] = site_url('master/rekening/rekening2');
		$this->data['rek1'] = $this->rekenings1->dropdown();
	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Rekening 2');
		  
		$this->data['title'] = 'Kelola Data Rekening 2';
		$this->data['list'] = $this->rekenings2->get_list();
		$this->load->view('master/rekening/index_rekening2',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		$this->output->set_title('Tambah Rekening 2');
 
		// $this->load->view('js');
		// $this->load->view('css');
		$this->data['action'] = 'create'; 
		$this->data['title'] = 'Tambah Data Rekening 2';  
		$this->load->view('master/rekening/form_rekening2',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		$this->output->set_title('Ubah Rekening 2');

		$this->data['action'] = 'update'; 
		$this->data['title'] = 'Ubah Data Rekening 2'; 
		$this->data['val_rek'] = $this->rekenings2->nm_rek($id); 
		$this->data['data'] = $this->rekenings2->get($id); 
		// $this->load->view('js');
		// $this->load->view('css');
		$this->load->view('master/rekening/form_rekening2',$this->data);
	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		 
		$item['kd_rek1'] = $data['kd_rek1'];  
		$item['name'] = $data['name'];  

		if($data['action']=='create'){
			$item['kd_rek2'] = $this->rekenings2->get_rek($data['kd_rek1']);  
			$save = $this->rekenings2->insert($item); 
		}else{
			$save = $this->rekenings2->update($item,['id'=>$data['id']]); 
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
		$delete = $this->rekenings2->delete(['id'=>$id]);
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
