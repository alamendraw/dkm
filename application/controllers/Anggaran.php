<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('master/rekenings1','rekening1');  
		$this->load->model('master/rekenings2', 'rekening2');  
		$this->load->model('master/rekenings3', 'rekening3');  
		$this->load->model('anggarans');  
		$this->load->model('master/satuans');  
		$this->data['url'] = site_url('anggaran'); 
		$this->data['unit'] = $this->satuans->get_all(); 
		$this->thn_ang = userinfo('tahun'); 
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}

	}
	public function rapb() { 
		$this->output->set_template('template');
		$this->output->set_title('Anggaran');
		$this->data = [
			'url' 	=> site_url('anggaran')
		];
		$this->data['title'] = 'Rencana Anggaran Pendapatan dan Belanja';
		$this->load->view('anggaran/index_rapb',$this->data);
	}

	public function anggaran_kas() { 
		$this->output->set_template('template');
		$this->output->set_title('Anggaran');
		$this->data = [
			'url' 	=> site_url('anggaran')
		];
		$this->data['title'] = 'Rencana Anggaran Kas';
		$this->load->view('anggaran/index_rak',$this->data);
	}

	public function getListData(){ 
		$postData = $this->input->post();  
		$data = $this->anggarans->getListData($postData); 
		echo json_encode($data);
	}

	public function getListDataRak(){ 
		$postData = $this->input->post();  
		$data = $this->anggarans->getListDataRak($postData); 
		echo json_encode($data);
	}

	public function add($jns){ 
		$this->output->set_template('template');
		 
		$this->output->set_title('Tambah Anggaran');
		$this->data['title'] = 'Tambah Data Anggaran';  
		 
		$this->data['rek2'] = $this->rekenings2->dropdown($jns);
		$this->data['rek1'] = $jns;
		$this->data['val_rek2'] =[];
		$this->data['action'] = 'create'; 
		
		$this->load->view('anggaran/form_rapb',$this->data); 
	}

	public function update($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Anggaran');
		$this->data['title'] = 'Data Anggaran'; 
		$rek = explode('.',$id);
		$rekening = $rek[0].$rek[1].$rek[2]; 
		$field = $this->anggarans->get_data($rekening); 
		 
		$rek1 = $this->rekening1->get(['kd_rek1'=>$rek[0]]);
		$rek2 = $this->rekening2->get(['kd_rek1'=>$rek[0],'kd_rek2'=>$rek[1]]);
		$rek3 = $this->rekening3->get(['kd_rek1'=>$rek[0],'kd_rek2'=>$rek[1],'kd_rek3'=>$rek[2]]);
		$drek = '';
		$drek .="<table width='100%' border='0'>
					<tr>
						<td width='10%'><b>".$rek1->kd_rek1."</b></td>
						<td width='90%'><b>".$rek1->name."</b></td>
					</tr>
					<tr>
						<td><b>".$rek2->kd_rek1.'.'.$rek2->kd_rek2."</b></td>
						<td><b>".$rek2->name."</b></td>
					</tr>
					<tr>
						<td>".$rek3->kd_rek1.'.'.$rek3->kd_rek2.'.'.$rek3->kd_rek3."</td>
						<td>".$rek3->name."</td>
					</tr>
				</table>";
		$this->data['det_rek'] = $drek;
		$this->data['rekening'] = $id;   
		$this->data['action'] = 'update';   
		$this->data['data'] = (count($field)>0)?$field[0]:[];  
		$this->load->view('anggaran/form_rapb',$this->data);
	}

	public function updateRak($id){ 
		$this->output->set_template('template');
		
		$this->output->set_title('Anggaran Kas');
		$this->data['title'] = 'Rencana Anggaran Kas'; 
		$rek = explode('.',$id);
		$rekening = $rek[0].$rek[1].$rek[2]; 
		$field = $this->anggarans->get_data_rak($rekening);  
		$rek3 = $this->rekening3->get(['kd_rek1'=>$rek[0],'kd_rek2'=>$rek[1],'kd_rek3'=>$rek[2]]); 
		$budget = $this->anggarans->get(['kd_rek'=>$rekening]); 
  
		$this->data['budget'] = $budget;   
		$this->data['arry_rek'] = $rek3;   
		$this->data['rekening'] = $rekening;   
		$this->data['action'] = 'update';   
		$this->data['data'] = (count($field)>0)?$field[0]:[];  
		$this->load->view('anggaran/form_rak',$this->data);
	}

	public function saveRak(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true); 
		$item['tahun'] = $this->thn_ang; 
		$item['kd_rek'] = $data['rekening'];
		$item['total'] = $data['total'];
		$item['januari'] = str_replace(',','',$data['januari']);
		$item['februari'] = str_replace(',','',$data['februari']);
		$item['maret'] = str_replace(',','',$data['maret']);
		$item['april'] = str_replace(',','',$data['april']);
		$item['mei'] = str_replace(',','',$data['mei']);
		$item['juni'] = str_replace(',','',$data['juni']);
		$item['juli'] = str_replace(',','',$data['juli']);
		$item['agustus'] = str_replace(',','',$data['agustus']);
		$item['september'] = str_replace(',','',$data['september']);
		$item['oktober'] = str_replace(',','',$data['oktober']);
		$item['november'] = str_replace(',','',$data['november']);
		$item['desember'] = str_replace(',','',$data['desember']);

		if($data['sisa'] == 0) { 
			$cek = $this->anggarans->cek_save($data['rekening'],$this->thn_ang,'ang_kas');
			if($cek>0){
				unset($item['tahun']);
				unset($item['kd_rek']);
				$save = $this->db->update('ang_kas',$item,['kd_rek'=>$data['rekening'],'tahun'=>$this->thn_ang]);
			}else{
				$save = $this->db->insert('ang_kas',$item);
			}

			$return['status'] = 'success';
			$return['message'] = 'Data Berhasil Tersimpan.';
		}elseif($data['sisa'] > 0){
			$return['status'] = 'error';
			$return['message'] = 'Masih ada sisa Anggaran Rp.'.number_format($data['sisa']); 
		}else{
			$return['status'] = 'error';
			$return['message'] = 'Nilai Melebihi Anggaran';
		}
		   
		echo json_encode($return);

	}

	public function save(){
		$this->input->is_ajax_request() or exit('No direct script access allowed!');
		$data = $this->input->post(null, true);
		$rek = explode('.',$data['rekening']);
		$rekening = $rek[0].$rek[1].$rek[2]; 
		$tahun = $this->thn_ang;
		$item['cost'] = str_replace(",","",$data['cost']);
		$item['qty1'] = $data['qty1'];
		$item['unit1'] = $data['unit1'];
		$item['qty2'] = $data['qty2'];
		$item['unit2'] = $data['unit2'];
		$item['total'] = str_replace(",","",$data['total']);
		$item['description'] = $data['description']; 
		$item['tahun'] = $tahun; 
		$item['kd_rek'] = $rekening; 
 
	 
		$cek = $this->anggarans->cek_save($rekening,$tahun,'budget');
		if($cek>0){
			unset($item['tahun']);
			unset($item['kd_rek']);
			$save = $this->anggarans->update($item,['kd_rek'=>$rekening,'tahun'=>$tahun]);
		}else{
			$save = $this->anggarans->insert($item);
		}
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
