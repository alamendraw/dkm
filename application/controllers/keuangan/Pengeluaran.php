<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();   
		$this->load->model('master/rekenings3');  
		$this->load->model('keuangan/pengeluarans');  
		$this->load->model('anggarans');  
		$this->data['url'] = site_url('keuangan/pengeluaran'); 
		$this->data['drop_rek'] = $this->rekenings3->dropdown(2); 
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Pengeluaran');
		  
		$this->data['title'] = 'Pengeluaran Masjid';
		$this->data['list'] = $this->pengeluarans->get_list();
		$this->load->view('keuangan/index_pengeluaran',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		 
		$this->output->set_title('Tambah Pengeluaran');
		$this->data['title'] = 'Tambah Data Pengeluaran';  
		 
		$this->data['no_kas'] = $this->get_kas(); 
		$this->data['action'] = 'create'; 
		
		$this->load->view('keuangan/form_pengeluaran',$this->data); 
	}

	private function get_kas(){
		$last_no = $this->pengeluarans->get_last_kas();
		if($last_no){  
			$data = sprintf("%05d", $last_no+1); 
		}else{
			$data = '00001';
		}

		return $data;
	}

	public function drop_budget($rek){ 
		$data['dropdown'] = $this->anggarans->get_all(['kd_rek'=>$rek]); 
		echo json_encode($data);
	}

	public function update($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Ubah Pengeluaran');
		$this->data['title'] = 'Ubah Data Pengeluaran';  
		$field = $this->pengeluarans->get_data($id)[0];  
		// $this->data['val_ang'] = $this->anggarans->get(['id'=>$field->id_budget]);
		// $this->data['val_rek'] = $this->rekenings3->get(['id'=>$field->kd_rek]);
		$this->data['action'] = 'update';   
		$this->data['data'] = $field;  
		$this->load->view('keuangan/form_pengeluaran',$this->data);
	}
 
	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true); 

		$item['no_kas'] = $data['no_kas'];
		$item['date'] = mysql_date($data['date']);
		// $item['kd_rek'] = $data['kd_rek'];
		// $item['id_budget'] = $data['id_budget'];
		$item['kredit'] = str_replace(",","",$data['cost']);
		$item['description'] = $data['description'];
		$item['user_id'] = userinfo('id');
		 
		if($data['action']=='create'){ 
			$save = $this->pengeluarans->insert($item); 
		}else{
			$save = $this->pengeluarans->update($item,['id'=>$data['id']]); 
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
		$delete = $this->pengeluarans->delete(['id'=>$id]);
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
