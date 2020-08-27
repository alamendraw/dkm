<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('master/rekenings1');  
		$this->load->model('master/rekenings2');  
		$this->load->model('master/rekenings');  
		$this->data['url'] = site_url('master/rekening/rekening'); 
		

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Rekening');
		  
		$this->data['title'] = 'Kelola Data Rekening';
		$this->data['list'] = $this->rekenings->get_list();
		$this->load->view('master/rekening/index_rekening',$this->data);
	}

	public function add($jns){ 
		$this->output->set_template('template');
		
		if($jns==1){
			$this->output->set_title('Tambah Rekening Pendapatan');
			$this->data['title'] = 'Tambah Data Rekening Pendapatan';  
		}else{
			$this->output->set_title('Tambah Rekening Pengeluaran');
			$this->data['title'] = 'Tambah Data Rekening Pengeluaran';  
		}
		$this->data['rek2'] = $this->rekenings2->dropdown($jns);
		$this->data['rek1'] = $jns;
		 
		$this->data['action'] = 'create'; 
		
		$this->load->view('master/rekening/form_rekening',$this->data); 
	}

	public function update($id,$jns){ 
		$this->output->set_template('template');
		if($jns==1){
			$this->output->set_title('Ubah Rekening Pendapatan');
			$this->data['title'] = 'Ubah Data Rekening Pendapatan';  
		}else{
			$this->output->set_title('Ubah Rekening Pengeluaran');
			$this->data['title'] = 'Ubah Data Rekening Pengeluaran';  
		}
 
		$this->data['rek1'] = $jns;
		$this->data['rek2'] = $this->rekenings2->dropdown($jns);
		$this->data['val_rek2'] = $this->rekenings2->dropdown2($id)[0]; 
		$this->data['action'] = 'update';   
		$this->data['data'] = $this->rekenings->get($id); 
		$this->load->view('master/rekening/form_rekening',$this->data);
	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		 
		$item['kd_rek1'] = $data['kd_rek1']; 
		$item['kd_rek2'] = $data['kd_rek2']; 
		$item['name'] = $data['name'];   

		if($data['action']=='create'){
			$item['kd_rek3'] = $this->rekenings->get_rek($data['kd_rek1'],$data['kd_rek2']); 
			$save = $this->rekenings->insert($item); 
		}else{
			$save = $this->rekenings->update($item,['id'=>$data['id']]); 
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
		$delete = $this->rekenings->delete(['id'=>$id]);
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
