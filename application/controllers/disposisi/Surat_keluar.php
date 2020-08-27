<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();  
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		} 
		   
		$this->load->model('mosques');  
		$this->load->model('disposisi/surat_keluars');  
		$this->data['url'] = site_url('disposisi/surat_keluar');	
		$this->data['mosque'] = $this->mosques->get(['id'=>userinfo('mosque_id')]); 
		$this->data['mail_type'] = $this->surat_keluars->get_type(); 
		$this->mpdf = new \Mpdf\Mpdf();
		$this->mpdf->shrink_tables_to_fit = 1;
		$this->mpdf->AddPageByArray(array(
			'format' => 'A4',
			'orientation' => 'P',
			'mgl' => '25',
			'mgr' => '25',
			'mgt' => '20',
			'mgb' => '50',
			'mgh' => '10',
			'mgf' => '10',
		));

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Disposisi');
		  
		$this->data['title'] = 'Surat Keluar';
		$this->data['list'] = $this->surat_keluars->get_list();
		$this->load->view('disposisi/index_keluar',$this->data);
	}

	public function add(){ 
		$this->output->set_template('template');
		 
		$this->output->set_title('Tambah Surat Keluar');
		$this->data['title'] = 'Tambah Data Surat Keluar';  
		$this->data['action'] = 'create';
		$this->data['guest'] = $this->surat_keluars->get_guest();
		
		$this->load->view('disposisi/form_keluar',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Ubah Surat Keluar');
		$this->data['title'] = 'Ubah Data Surat Keluar';  
		$field = $this->surat_keluars->get($id);   
		$this->data['guest_available'] = $this->surat_keluars->get_guest($field->guest,'not in');
		$this->data['guest_selected'] = $this->surat_keluars->get_guest($field->guest,'in');
		$this->data['type'] = $this->surat_keluars->get_type($field->type)[0];;   
		$this->data['action'] = 'update';   
		$this->data['data'] = $field;  
		$this->load->view('disposisi/form_keluar',$this->data);
	}
 
	public function report($id){
		$mail = $this->surat_keluars->get($id);
		$guest = $this->surat_keluars->get_guest($mail->guest,'in');
		$i=0;
		$o= $guest->num_rows();
		foreach($guest->result() as $row){ 
			$i++;
			$data = $this->surat_keluars->get_report($id,$row->name); 
			$this->mpdf->WriteHTML($data);
			if($i!=$o){
				$this->mpdf->AddPage();
			}			
		}
		 
		$this->mpdf->setTitle('Surat');
		$this->mpdf->Output();
	}

	public function blangko($id){		
		$data = $this->surat_keluars->get_report($id); 
		// echo $data;
		$this->mpdf->setTitle('Blangko');
		$this->mpdf->WriteHTML($data);
		$this->mpdf->Output();
	}


	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true); 
		if(isset($data['to_guest'])){
            $to_guest = $data['to_guest'];
            if(count($to_guest)>0){   
				$guest='';
                foreach($to_guest as $val){    
                    $guest.=$val.', '; 
                }            
            }
        }

		$item['date'] = mysql_date($data['date']);
		$item['type'] = $data['type'];
		$item['day'] = $data['day'];
		$item['time'] = $data['hour'].':'.$data['minute'];
		$item['time_desc'] = $data['time_desc'];
		$item['location'] = $data['location'];  
		$item['header1'] = $data['header1'];  
		$item['header2'] = $data['header2'];  
		$item['footer1'] = $data['footer1'];  
		$item['guest'] = rtrim($guest,', ');
     
		if($data['action']=='create'){ 
			$item['no_mail'] = $data['no_mail'];
			$save = $this->surat_keluars->insert($item); 
		}else{
			$save = $this->surat_keluars->update($item,['id'=>$data['id']]); 
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
		$delete = $this->surat_keluars->delete(['id'=>$id]);
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

	public function get_type($no){
		$data = $this->surat_keluars->get_type($no)[0];
		echo json_encode($data);
	}
	public function get_last($type){ 
		$data = $this->surat_keluars->get_last_no($type);
		echo json_encode($data);
	}
	 
}
