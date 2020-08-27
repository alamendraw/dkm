<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('master/rekenings1');  
		$this->load->model('master/rekenings2');  
		$this->load->model('master/rekenings');  
		$this->load->model('anggarans');  
		$this->load->model('master/satuans');  
		$this->data['url'] = site_url('anggaran'); 
		$this->data['unit'] = $this->satuans->get_all(); 
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Anggaran');
		  
		$this->data['title'] = '';
		$this->data['list'] = $this->anggarans->get_list();
		$this->load->view('anggaran/index',$this->data);
	}

	public function add($jns){ 
		$this->output->set_template('template');
		 
		$this->output->set_title('Tambah Anggaran');
		$this->data['title'] = 'Tambah Data Anggaran';  
		 
		$this->data['rek2'] = $this->rekenings2->dropdown($jns);
		$this->data['rek1'] = $jns;
		$this->data['val_rek2'] =[];
		$this->data['action'] = 'create'; 
		
		$this->load->view('anggaran/form',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Ubah Anggaran');
		$this->data['title'] = 'Ubah Data Anggaran';  
		$field = $this->anggarans->get_data($id)[0]; 
		$this->data['rek1'] = $field->kd_rek1;
		$this->data['rek2'] = $this->rekenings2->dropdown($field->kd_rek1);
		$this->data['val_rek2'] = $this->rekenings2->get(['kd_rek1'=>$field->kd_rek1,'kd_rek2'=>$field->kd_rek2]);
		$this->data['val_rek3'] = $this->rekenings->get(['id'=>$field->kd_rek]);
		$this->data['action'] = 'update';   
		$this->data['data'] = $field;  
		$this->load->view('anggaran/form',$this->data);
	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		$item['kd_rek'] = $data['kd_rek3'];
		$item['name'] = $data['name'];
		$item['cost'] = str_replace(",","",$data['cost']);
		$item['qty1'] = $data['qty1'];
		$item['unit1'] = $data['unit1'];
		$item['qty2'] = $data['qty2'];
		$item['unit2'] = $data['unit2'];
		$item['description'] = $data['description']; 
		if($data['action']=='create'){
			$item['sort_by'] = $this->anggarans->get_sort($data['kd_rek3']); 
			$save = $this->anggarans->insert($item); 
		}else{
			$save = $this->anggarans->update($item,['id'=>$data['id']]); 
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
		// echo $id; exit();
		$delete = $this->anggarans->delete(['id'=>$id]);
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
	
	public function dropr3($rek1,$rek2){
		$data['dropdown'] = $this->rekenings->get_all(['kd_rek1'=>$rek1,'kd_rek2'=>$rek2]);
		$data['field'] = $this->rekenings2->get(['kd_rek1'=>$rek1,'kd_rek2'=>$rek2]);
		echo json_encode($data);
	}
	
	public function field3($id){ 
		$data['field'] = $this->rekenings->get(['id'=>$id]);
		echo json_encode($data);
	}
}
