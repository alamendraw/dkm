<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('users');  
		$this->load->model('user_groups');  
		$this->data['url'] = site_url('master/user');
		$this->data['drop_group'] = $this->user_groups->get_list();
		$this->load->library('password'); 

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('User');
		  
		$this->data['title'] = 'Kelola Data User';
		$this->data['list'] = $this->users->get_list();
		$this->load->view('master/index_user',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		$this->output->set_title('Tambah user');

		$this->data['action'] = 'create'; 
		$this->data['title'] = 'Tambah Data User';  
		$this->load->view('master/form_user',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		$this->output->set_title('Tambah user');
		$field = $this->users->get($id);
		$this->data['action'] = 'update'; 
		$this->data['title'] = 'Tambah Data User'; 
		$this->data['val_group'] = $this->user_groups->get(['id'=>$field->group_id]); 
		$this->data['data'] = $field;
		$this->load->view('js');
		$this->load->view('css');
		$this->load->view('master/form_user',$this->data);
	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		  
		$item['name'] = $data['name'];
		$item['email'] = $data['email'];
		$item['group_id'] = $data['group_id'];
		$item['username'] = $data['username'];
		$item['password'] = $this->password->hash_password($data['password']);

		if($data['action']=='create'){
			$item['mosque_id'] = userinfo('mosque_id');
			$save = $this->users->insert($item); 
		}else{
			if($data['password']==''){
				unset($item['password']);
			}
			$save = $this->users->update($item,['id'=>$data['id']]); 
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
		$delete = $this->users->delete(['id'=>$id]);
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
