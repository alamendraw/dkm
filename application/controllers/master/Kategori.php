<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('master/kategoris');  
		$this->data['url'] = site_url('master/kategori');

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('kategori');
		  
		$this->data['title'] = 'Kelola Data Kategori';
		$this->data['list'] = $this->kategoris->get_list();
		$this->load->view('master/index_kategori',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		$this->output->set_title('Tambah Kategori');

		$this->data['action'] = 'create'; 
		$this->data['title'] = 'Tambah Data Kategori';  
		$this->load->view('master/form_kategori',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		$this->output->set_title('Tambah Kategori');

		$this->data['action'] = 'update'; 
		$this->data['title'] = 'Tambah Data Kategori'; 
		$this->data['data'] = $this->kategoris->get($id); 
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('master/form_kategori',$this->data);
	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		 
		$item['name'] = $data['name']; 
		$item['type'] = $data['type'];

		if($data['action']=='create'){
			$save = $this->kategoris->insert($item); 
		}else{
			$save = $this->kategoris->update($item,['id'=>$data['id']]); 
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
		$delete = $this->kategoris->delete(['id'=>$id]);
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
