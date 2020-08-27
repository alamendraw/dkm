<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('keuangan/pendapatans');  
		$this->load->model('mosques');  
		$this->data['url'] = site_url('laporan/pendapatan');  
		 
		$this->mpdf = new \Mpdf\Mpdf();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}

	}
	public function index() { 
		$this->output->set_template('template');
		$this->output->set_title('Pendapatan');
		  
		$this->data['title'] = 'Laporan Pendapatan Masjid';  
		$this->load->view('laporan/bulanan',$this->data);
	}

	 
 
	 public function report($bln){
		$cRet='';
		$mosque = $this->mosques->get(['id'=>userinfo('mosque_id')]);
		$cRet .="<table width='100%' style='font-size:14px; border-collapse:collapse; font-family:arial;' border='0'>
					<tr>
						<td align='right' width='20%' rowspan='3'>
						<img src='".base_url()."assets/images/logo/masjid.png'  height='65' width='65' />
						</td>
						<td align='center' width='60%'><b>PENDAPATAN MASJID</b></td>
						<td align='center' width='20%' rowspan='3'></td>
					</tr>
					<tr>
						<td align='center'><b>".strtoupper($mosque->name)."</b></td>  
					</tr>
					<tr>
						<td align='center'><b>Bulan ".get_month($bln)." 2020</b></td>  
					</tr>
					<tr>
						<td colspan='3'>&nbsp;</td>  
					</tr>
				</table>";
		$cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial;' border='1'>
					<thead>
						<tr> 
							<th bgcolor='#93f784' width='10%'>No Kas</th> 
							<th bgcolor='#93f784' width='15%'>Tanggal</th> 
							<th bgcolor='#93f784' width='25%'>Nilai</th>    
							<th bgcolor='#93f784' width='50%'>Keterangan</th>   
						</tr>
					</thead>
		";
		$list = $this->pendapatans->get_report($bln);
		$total = 0;
		foreach($list as $row){ 
			$cost = number_format($row->debet);
			$total = $total+$row->debet;
			$cRet .="<tr> 
						<td >$row->no_kas </td> 
						<td >$row->date </td> 
						<td align='right' >$cost </td>    
						<td >$row->description </td>       
					</tr>";
		  	 
		}
			$cRet .="<tr> 
						<td align='center' colspan='2'><b>Total</b> </td> 
						<td align='right'><b>".number_format($total)."</b> </td>      
						<td>  </td>       
					</tr>";
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
		//  echo $cRet;
		$this->mpdf->WriteHTML($cRet);
		$this->mpdf->Output();
	 }
}
