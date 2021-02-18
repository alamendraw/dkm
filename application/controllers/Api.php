<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 		 

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
		header('Content-Type: application/json');

		$this->load->model('keuangan/pendapatans'); 
	}

	private function get_kas(){
		$last_no = $this->pendapatans->get_last_kas();
		if($last_no){  
			$data = sprintf("%05d", $last_no+1); 
		}else{
			$data = '00001';
		}

		return $data;
	}

	public function pemasukan_get() {
		$item=[];
		$sql = $this->db->query("SELECT id,date tanggal, debet nilai, description keterangan from transaction where debet !=0 order by no_kas desc");
		$data = $sql->result_array();
		foreach($data as $row){
			array_push($item,array(
				'id' => date_indo($row['id']),
				'tanggal' => date_indo($row['tanggal']),
				'nilai' => number_format($row['nilai']),
				'keterangan' => $row['keterangan']

			));
		}
		
		echo json_encode($item);
	}

	public function sisa_saldo_get() { 
		$item=[];
		$sql = $this->db->query("SELECT (sum(debet)-sum(kredit)) saldo from transaction");
		$data = $sql->result_array();
		foreach($data as $row){ 
			array_push($item,array(
				'saldo'=>number_format($row['saldo'])
			));
		}
		echo json_encode($item);
	}

	public function pemasukan_post(){
		$request = json_decode(file_get_contents('php://input'));
		$field['no_kas'] = $this->get_kas();
		$field['date'] = $request->tanggal;
		$field['debet'] = $request->nilai;
		$field['description'] = $request->keterangan;
		$save = $this->pendapatans->insert($field); 
		$result['message'] = 'Data Tersimpan';
		
		echo json_encode($result);
	}
}
