<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integrasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		} 
		$this->load->model('master/rekenings');  
		$this->load->model('master/rekenings2');  
		$this->load->model('keuangan/transaksis');  
		$this->load->model('anggarans');  
		$this->data['url'] = site_url('keuangan/integrasi'); 
		// $this->data['rek1']=0;

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('integrasi');
		  
		$this->data['title'] = 'integrasi Masjid';
		$this->data['list'] = $this->transaksis->list_transaksi();
		$this->load->view('keuangan/index_integrasi',$this->data);
	}
 

	private function get_kas(){
		$last_no = $this->transaksis->get_last_kas();
		if($last_no){  
			$data = sprintf("%05d", $last_no+1); 
		}else{
			$data = '00001';
		}

		return $data;
	}

	public function drop_budget(){ 
		$rek1 = $_REQUEST['rek1'];
		$rek2 = $_REQUEST['rek2'];
		$data['dropdown'] = $this->anggarans->drop_rek2($rek1,$rek2); 
		echo json_encode($data);
	}

	public function proses($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Proses Integrasi');
		$this->data['title'] = 'Proses Integrasi';  
		$field = $this->transaksis->get_data($id)[0];   
		if($field->debet!=0){
			$rek = 1;
			$this->data['rek1'] = 1;
		}else{
			$rek = 2;
			$this->data['rek1'] = 2;
		}
		
		$this->data['drop_rek'] = $this->rekenings2->dropdown($rek); 
		$this->data['data'] = $field;  
		$this->load->view('keuangan/form_integrasi',$this->data);
	}
 
	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true); 
 
		$item['id_budget'] = $data['id_budget']; 
		$item['user_id'] = userinfo('id');
		  
		$save = $this->transaksis->update($item,['id'=>$data['id']]); 
		 
		if($save){ 
			$return['status'] = 'success';
			$return['message'] = 'Data Berhasil Tersimpan.'; 
		}else{
			$return['status'] = 'error';
         	$return['message'] = 'Data Gagal Tersimpan.'; 
		}
		echo json_encode($return);
	}

	public function delete($id){
		$delete = $this->transaksis->delete(['id'=>$id]);
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
