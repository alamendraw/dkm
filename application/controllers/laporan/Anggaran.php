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
		  
		$this->data['title'] = 'Laporan Rencana Anggaran Pendapatan dan Biaya Masjid'; 
		$this->data['list'] = $this->anggarans->get_report();
		$this->load->view('laporan/apbm',$this->data);
	}
 
	public function rak() { 
		$this->output->set_template('template');
		$this->output->set_title('RAK');
		  
		$this->data['title'] = 'Laporan Rencana Anggaran Kas Masjid'; 
		$this->data['list'] = $this->anggarans->get_report_rak();
		$this->load->view('laporan/rak',$this->data);
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
						<th bgcolor='#93f784' width='38%'>Nama</th> 
						<th bgcolor='#93f784' width='17%'>Nilai</th>    
						<th bgcolor='#93f784' width='18%'>Satuan</th>    
						<th bgcolor='#93f784' width='17%'>Jumlah</th>    
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
			$vs = $row->style;
			if($vs=='3'){
				$style= "";
			}else{
				$style= "font-weight:bold;";
			}
			if($row->nilai>0){
				$nilai = number_format($row->nilai,2);
			}else{
				$nilai='';
			}
			if($row->jumlah>0){
				$jumlah = number_format($row->jumlah,2);
			}else{
				$jumlah='';
			}
			if($vs<4){
				$kode = $row->kode;
			}else{
				$kode='&nbsp;';
			}
			$cRet .="<tr> 
						<td style='$style' >$kode</td> 
						<td style='$style' >$row->name</td> 
						<td style='$style' align='right' >$nilai</td>    
						<td style='$style' align='right'>$row->satuan</td>    
						<td style='$style' align='right' >$jumlah</td>    
					</tr>";
			 
			 
			 
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

	
	public function report_rak(){
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
						<th width='5%'>Rekening</th> 
						<th width='30%'>Nama</th>    
						<th width='10%'>Total</th>       
						<th width='10%'>Januari</th>    
						<th width='10%'>Februari</th>    
						<th width='10%'>Maret</th>    
						<th width='10%'>April</th>    
						<th width='10%'>Mei</th>    
						<th width='10%'>Juni</th>    
						<th width='10%'>Juli</th>    
						<th width='10%'>Agustus</th>    
						<th width='10%'>September</th>    
						<th width='10%'>Oktober</th>    
						<th width='10%'>November</th>    
						<th width='10%'>Desember</th>    
					</tr>
					<tr> 
						<th bgcolor='#93f784'>1</th> 
						<th bgcolor='#93f784'>2</th> 
						<th bgcolor='#93f784'>3</th>    
						<th bgcolor='#93f784'>4</th>    
						<th bgcolor='#93f784'>5</th>   
						<th bgcolor='#93f784'>6</th> 
						<th bgcolor='#93f784'>7</th> 
						<th bgcolor='#93f784'>8</th>    
						<th bgcolor='#93f784'>9</th>    
						<th bgcolor='#93f784'>10</th>   
						<th bgcolor='#93f784'>11</th> 
						<th bgcolor='#93f784'>12</th> 
						<th bgcolor='#93f784'>13</th>    
						<th bgcolor='#93f784'>14</th>    
						<th bgcolor='#93f784'>15</th>    
					</tr>
					</thead>
		";
		$list = $this->anggarans->get_report_rak();
		foreach($list as $row){
			$vs = $row->style;
			if($vs=='3'){
				$style= "";
			}else{
				$style= "font-weight:bold;";
			}
			if($row->total>0){
				$total = number_format($row->total,2);
			}else{
				$total='';
			} 
			
			if($row->januari>0){
				$januari = number_format($row->januari,2);
			}else{
				$januari = '';
			}
			if($row->februari>0){
				$februari = number_format($row->februari,2);
			}else{
				$februari = '';
			}
			if($row->maret>0){
				$maret = number_format($row->maret,2);
			}else{
				$maret = '';
			}
			if($row->april>0){
				$april = number_format($row->april,2);
			}else{
				$april = '';
			}
			if($row->mei>0){
				$mei = number_format($row->mei,2);
			}else{
				$mei = '';
			}
			if($row->juni>0){
				$juni = number_format($row->juni,2);
			}else{
				$juni = '';
			}
			if($row->juli>0){
				$juli = number_format($row->juli,2);
			}else{
				$juli = '';
			}
			if($row->agustus>0){
				$agustus = number_format($row->agustus,2);
			}else{
				$agustus = '';
			}
			if($row->september>0){
				$september = number_format($row->september,2);
			}else{
				$september = '';
			}
			if($row->oktober>0){
				$oktober = number_format($row->oktober,2);
			}else{
				$oktober = '';
			}
			if($row->november>0){
				$november = number_format($row->november,2);
			}else{
				$november = '';
			}
			if($row->desember>0){
				$desember = number_format($row->desember,2);
			}else{
				$desember = '';
			}


			if($vs<4){
				$kode = $row->kode;
			}else{
				$kode='&nbsp;';
			}
			$cRet .="<tr> 
						<td style='$style' >$kode</td> 
						<td style='$style' >$row->name</td> 
						<td style='$style' align='right' >$total</td>      
						<td style='$style' align='right' >$januari</td>    
						<td style='$style' align='right' >$februari</td>    
						<td style='$style' align='right' >$maret</td>    
						<td style='$style' align='right' >$april</td>    
						<td style='$style' align='right' >$mei</td>    
						<td style='$style' align='right' >$juni</td>    
						<td style='$style' align='right' >$juli</td>    
						<td style='$style' align='right' >$agustus</td>    
						<td style='$style' align='right' >$september</td>    
						<td style='$style' align='right' >$oktober</td>    
						<td style='$style' align='right' >$november</td>    
						<td style='$style' align='right' >$desember</td>    
					</tr>";
			 
			 
			 
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
					$this->mpdf->AddPage('L');
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
