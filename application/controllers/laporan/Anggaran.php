<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('anggarans');  
		$this->load->model('mosques');  
		$this->data['url'] = site_url('laporan/anggaran');  
		$this->mpdf = new \Mpdf\Mpdf();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}

	}
	public function index() { 
		 
	}

	public function apbm() { 
		$this->output->set_template('template');
		$this->output->set_title('APBM');
		  
		$this->data['title'] = 'Laporan Anggaran Pendapatan dan Biaya Masjid'; 
		$this->data['list'] = $this->anggarans->get_report();
		$this->load->view('laporan/apbm',$this->data);
	}
 
	 public function report_apbm(){
		$type = $_REQUEST['type'];
		$cRet='';
		$mosque = $this->mosques->get(['id'=>userinfo('mosque_id')]);
		$cRet .="<table width='100%' style='font-size:14px; border-collapse:collapse; font-family:arial;' border='0'>
					<tr>
						<td align='right' width='20%' rowspan='3'>
						<img src='".base_url()."assets/images/logo/masjid.png'  height='65' width='65' />
						</td>
						<td align='center' width='60%'><b>ANGGARAN PENDAPATAN DAN BIAYA</b></td>
						<td align='center' width='20%' rowspan='3'></td>
					</tr>
					<tr>
						<td align='center'><b>MASJID ".strtoupper($mosque->name)."</b></td>  
					</tr>
					<tr>
						<td align='center'><b>Periode 2020</b></td>  
					</tr>
					<tr>
						<td colspan='3'>&nbsp;</td>  
					</tr>
				</table>";
		$cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial;' border='1'>
					<thead>
					<tr> 
						<th bgcolor='#93f784' width='10%'>Rekening</th> 
						<th bgcolor='#93f784' width='40%'>Nama</th> 
						<th bgcolor='#93f784' width='15%'>Nilai</th>    
						<th bgcolor='#93f784' width='20%'>Satuan</th>    
						<th bgcolor='#93f784' width='15%'>Total</th>    
					</tr>
					<tr> 
						<th bgcolor='#93f784'>1</th> 
						<th bgcolor='#93f784'>2</th> 
						<th bgcolor='#93f784'>3</th>    
						<th bgcolor='#93f784'>4</th>    
						<th bgcolor='#93f784'>5</th>    
					</tr>
					</thead>
		";
		$list = $this->anggarans->get_report();
		foreach($list as $row){
			if($row->sts=='T') { 
				$kd_rek = $row->kd_rek;
			}else{
				$kd_rek = '';
			}

			if($row->cost!=0) { 
				$cost = number_format($row->cost,"0",",",".");
			}else{
				$cost = '';
			}
			if($row->unit!=0) { 
				$unit = $row->unit;
			}else{
				$unit = '';
			}
			if($row->total!=0) { 
				$total = number_format($row->total,"0",",",".");
			}else{
				$total = '';
			}
			if(strlen($row->kd_rek)<7){
				$b = '<b> '; $bt = ' </b>';
			}else{
				$b = ''; $bt = '';
			}
			if($row->sts=='H') { 
				$cRet .="<tr> 
						<td colspan='5'>&nbsp;</td>     
					</tr>";
			}else{
				$cRet .="<tr> 
						<td >$b $kd_rek $bt</td> 
						<td >$b $row->name $bt</td> 
						<td align='right' >$b $cost $bt</td>    
						<td align='right'>$b $unit $bt</td>    
						<td align='right' >$b $total $bt</td>    
					</tr>";
			}
			 
			 
		}
		$cRet .="</table>";

		$cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial;' border='0'>
					<tr> 
						<td colspan='2'>&nbsp;</td> 
					</tr>  
					<tr> 
						<td align='center' width='70%'></td>
						<td align='center' width='30%'>Ketua DKM</td>
					</tr>  
					<tr>
						<td height='70px'>&nbsp;</td>  
						<td>&nbsp;</td>  
					</tr>
					<tr>
						<td>&nbsp;</td>  
						<td align='center'>".$mosque->ketua_dkm."</td>  
					</tr>
				</table>";
				$data['prev']= $cRet; 
				if($type=='1'){
					$this->mpdf->WriteHTML($cRet);
					$this->mpdf->Output();
				}else{
					header("Cache-Control: no-cache, no-store, must-revalidate");
					header("Content-Type: application/vnd.ms-excel");
					header("Content-Disposition: attachment; filename= APBM_MJNH.xls");
					$this->load->view('laporan/excel',$data);
				}
	 }
}
