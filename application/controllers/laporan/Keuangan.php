<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('keuangan/transaksis');  
		$this->load->model('mosques');  
		$this->load->library('mpdf');  
		$this->data['url'] = site_url('laporan/keuangan');  
		// $this->mpdf = new \Mpdf\Mpdf();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}

	}
	public function index() { 
		 
	}

	public function jumat() { 
		$this->output->set_template('template');
		$this->output->set_title("Laporan Jum'at Masjid");
		  
		$this->data['title'] = "Laporan Jum'at Masjid";  
		$this->load->view('laporan/jumatan',$this->data);
	}

	public function rekap_jumat() { 
		$this->output->set_template('template');
		$this->output->set_title("Laporan Rekap Jum'at Masjid");
		  
		$this->data['title'] = "Laporan Rekap Jum'at Masjid";  
		$this->load->view('laporan/rekap_jumat',$this->data);
	}

	public function buku_kas() { 
		$this->output->set_template('template');
		$this->output->set_title('Buku Kas Masjid');
		  
		$this->data['title'] = 'Buku Kas Masjid';  
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
						<td align='center' width='60%'><b>BUKU KAS DEWAN KEMAKMURAN MASJID (DKM)</b></td>
						<td align='center' width='20%' rowspan='3'></td>
					</tr>
					<tr>
						<td align='center'><b>MASJID ".strtoupper($mosque->name)."</b></td>  
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
							<th bgcolor='#93f784' width='45%'>Keterangan</th> 
							<th bgcolor='#93f784' width='15%'>Debet</th>      
							<th bgcolor='#93f784' width='15%'>Kredit</th>      
						</tr>
					</thead>
		";
		$list = $this->transaksis->buku_kas($bln);
		$tot_debet = 0;
		$tot_kredit = 0;
		foreach($list as $row){  
			$tot_debet = $tot_debet+$row->debet;
			$tot_kredit = $tot_kredit+$row->kredit;
			$cRet .="<tr> 
						<td >$row->no_kas </td> 
						<td >".date_indo($row->DATE)." </td>    
						<td >$row->DESCRIPTION </td>  
						<td align='right' >".number_format($row->debet,"0",",",".")." </td>      
						<td align='right' >".number_format($row->kredit,"0",",",".")." </td>      
					</tr>";
		  	 
		}
			$cRet .="<tr> 
						<td></td> 
						<td></td> 
						<td align='left'><b>Total</b> </td> 
						<td align='right'><b>".number_format($tot_debet,"0",",",".")."</b> </td>      
						<td align='right'><b>".number_format($tot_kredit,"0",",",".")."</b></td>       
					</tr>";
			$cRet .="<tr> 
						<td></td> 
						<td></td> 
						<td align='left'><b>Sisa Kas Bulan ".get_month($bln)."</b> </td> 
						<td align='right' colspan='2'><b>".number_format($tot_debet-$tot_kredit,"0",",",".")."</b> </td>        
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
		$this->mpdf->mpdf_vertical($cRet); 
	 }

	 public function jumat_get(){
		$month = $this->input->get('month');
		$data = $this->transaksis->get_jumat_month($month); 
		echo json_encode($data);
	 }

	 public function laporan_jumat($bln,$jum){
		$date_ttd = mysql_date($_REQUEST['date']);
		$type = $_REQUEST['type'];
		$data_jum = $this->transaksis->get_jum($bln,$jum)[0];
		
		$cRet='';
		$mosque = $this->mosques->get(['id'=>userinfo('mosque_id')]);
		$cRet .="<table width='100%' style='font-size:14px; border-collapse:collapse; font-family:arial;' border='0'>
					 <tr>
						 <td align='right' width='20%' rowspan='3'>
						 <img src='".base_url()."assets/images/logo/masjid.png'  height='65' width='65' />
						 </td>
						 <td align='center' colspan='3' width='60%'><b>LAPORAN KAS PER JUM'AT</b></td>
						 <td align='center' width='20%' rowspan='3'></td>
					 </tr>
					 <tr>
						 <td align='center' colspan='3'><b> JUM'AT KE $jum BULAN ".strtoupper(get_month($bln))." 2020</b></td>  
					 </tr>
					 <tr>
						 <td align='center' colspan='3'><b>DKM MASJID ".strtoupper($mosque->name)."</b></td>  
					 </tr>
					 <tr>
						 <td colspan='3'>&nbsp;</td>  
					 </tr>
				 </table>";
		 $cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial;' border='1'>
					 <thead>
						 <tr>   
							 <th bgcolor='#93f784' width='15%'>Tanggal</th> 
							 <th bgcolor='#93f784' width='40%'>Keterangan</th> 
							 <th bgcolor='#93f784' width='15%'>Pemasukan</th>      
							 <th bgcolor='#93f784' width='15%'>Pengeluaran</th>      
							 <th bgcolor='#93f784' width='15%'>Saldo</th>      
						 </tr>
					 </thead>
		 ";

		 $list = $this->transaksis->lap_jumat($data_jum->date_start,$data_jum->date_end,$data_jum->date_start_be,$data_jum->date_end_be);
		$saldo = 0;
		 foreach($list as $row){   
			$debet = ($row->debet)?number_format($row->debet,"0",",","."):'';
			$kredit = ($row->kredit)?number_format($row->kredit,"0",",","."):'';
			
			if($row->date !='h'){ 
				$saldo = $saldo+$row->debet-$row->kredit;
			}
			if($row->date == 'h'){ 
				$tsaldo = ($row->debet - $row->kredit);
				($tsaldo<0)? $hsaldo = '('.number_format($tsaldo*-1,"0",",",".").')': $hsaldo = number_format($tsaldo,"0",",",".");
				$cRet .="<tr bgcolor='#93f784'>     
							<td align='center' colspan='2'><b> $row->description </b></td>  
							<td align='center' align='right' ><b> $debet </b></td>      
							<td align='center' align='right' ><b> $kredit </b></td>      
							<td align='center' align='right' ><b>  $hsaldo </b></td>      
						</tr>";
			}else if($row->date == '' && $row->kredit =='0'){ //Saldo awal
				$cRet .="<tr>  
							<td > </td>    
							<td >$row->description </td>  
							<td align='right' >   </td>      
							<td align='right' ></td>      
							<td align='right' >$debet</td>      
						</tr>";
			}else{
				
				$cRet .="<tr>  
							<td >".date_indo($row->date)." </td>    
							<td >$row->description </td>  
							<td align='right' > $debet  </td>      
							<td align='right' >$kredit </td>      
							<td align='right' >".number_format($saldo,"0",",",".")." </td>      
						</tr>";
			}
			 
				
		 } 
		 $cRet .="</table>";
 
		 $cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial;' border='0'>
					 <tr> 
						 <td colspan='2'>&nbsp;</td> 
					 </tr>  
					 <tr> 
						 <td align='center'></td>
						 <td align='center'></td>
						 <td align='center'>Cikalong, ".date_indo($date_ttd)."</td>
					 </tr> 
					 <tr> 
						 <td align='center' width='30%'></td>
						 <td align='center' width='40%'></td>
						 <td align='center' width='30%'>Ketua DKM</td>
					 </tr>  
					 <tr>
						 <td height='70px'>&nbsp;</td>  
						 <td height='70px'>&nbsp;</td>  
						 <td>&nbsp;</td>  
					 </tr>
					 <tr>
					 	<td align='center'></td>
						 <td>&nbsp;</td>    
						 <td align='center'>".$mosque->ketua_dkm."</td>  
					 </tr>
				 </table>";
		$data['prev']= $cRet; 
		if($type=='1'){ 
			$this->mpdf->mpdf_vertical($cRet); 
		}else{
			header("Cache-Control: no-cache, no-store, must-revalidate");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename= Laporan_Jumat.xls");
			$this->load->view('laporan/excel',$data);
		}
		 
	  }
	  
	 public function laporan_rekap_jumat(){ 
		$bln= $_REQUEST['month'];
		$type= $_REQUEST['type'];
		$date= mysql_date($_REQUEST['date']);
		
		$cRet='';
		$mosque = $this->mosques->get(['id'=>userinfo('mosque_id')]);
		$cRet .="<table width='100%' style='font-size:18px; border-collapse:collapse; font-family:arial;' border='0'>
					 <tr>
						 <td align='right' width='20%' rowspan='3'>
						 <img src='".base_url()."assets/images/logo/masjid.png'  height='75' width='75' />
						 </td>
						 <td align='center' colspan='3' width='60%'><b>LAPORAN REKAP JUM'AT</b></td>
						 <td align='center' width='20%' rowspan='3'></td>
					 </tr>
					 <tr>
						 <td align='center' colspan='3'><b> BULAN ".strtoupper(get_month($bln))." 2020</b></td>  
					 </tr>
					 <tr>
						 <td align='center' colspan='3'><b>DKM MASJID ".strtoupper($mosque->name)."</b></td>  
					 </tr>
					 <tr>
						 <td colspan='3'>&nbsp;</td>  
					 </tr>
				 </table>";
		 $cRet .="<table width='100%' style='font-size:14px; border-collapse:collapse; font-family:arial;' border='1'>
					 <thead>
						 <tr>   
							 <th bgcolor='#93f784' width='20%'>Nama</th> 
							 <th bgcolor='#93f784' width='15%'>Pemasukan</th>      
							 <th bgcolor='#93f784' width='15%'>Pengeluaran</th> 
							 <th bgcolor='#93f784' width='15%'>Saldo</th> 
							 <th bgcolor='#93f784' width='35%'>Keterangan</th>      
						 </tr>
					 </thead>
		 ";

		$list = $this->transaksis->get_rekap_jumat($bln);
		$saldo = 0; 
		  
		$tdebet = 0;
		$tkredit = 0;
		foreach($list as $row){   
			$debet = ($row->debet && $row->id!=0)?number_format($row->debet,"0",",","."):'';
			$kredit = ($row->kredit && $row->id!=0)?number_format($row->kredit,"0",",","."):'';
			 
			$saldo = $saldo+$row->debet - $row->kredit;
			$tdebet = $tdebet+(($row->debet && $row->id!=0)?$row->debet:0);
			$tkredit = $tkredit+(($row->kredit && $row->id!=0)?$row->kredit:0);
			
			$cRet .="<tr>  
						<td>&nbsp; $row->name </td>  
						<td align='right' > $debet  </td>      
						<td align='right' >$kredit </td>
						<td align='right'>".number_format($saldo,"0",",",".")."</td>     
						<td > </td>     
					</tr>"; 
		} 
			$cRet .="<tr>  
						<td align='center'><b>Total</b></td>  
						<td align='right'><b>".number_format($tdebet,"0",",",".")."</b></td>      
						<td align='right'><b>".number_format($tkredit,"0",",",".")."</b></td>						
						<td align='right'><b>".number_format($saldo,"0",",",".")."</b></td>     
						<td > </td>     
					</tr>";
		 $cRet .="</table>";
 
		 $cRet .="<table width='100%' style='font-size:14px; border-collapse:collapse; font-family:arial;' border='0'>
					 <tr> 
						 <td colspan='2'>&nbsp;</td> 
					 </tr>  
					 <tr> 
						 <td align='center' colspan='2'></td>
						 <td align='center'></td>
						 <td align='center' colspan='2'>Cikalong, ".date_indo($date)."</td>
					 </tr> 
					 <tr> 
						 <td align='center' width='30%' colspan='2'></td>
						 <td align='center' width='40%'></td>
						 <td align='center' width='30%' colspan='2'>Ketua DKM</td>
					 </tr>  
					 <tr>
						 <td height='70px'>&nbsp;</td>  
						 <td height='70px'>&nbsp;</td>  
						 <td>&nbsp;</td>  
					 </tr>
					 <tr>
					 	<td align='center' colspan='2'></td>
						 <td>&nbsp;</td>    
						 <td align='center' colspan='2'>".$mosque->ketua_dkm."</td>  
					 </tr>
				 </table>";
				 
		$data['prev']= $cRet; 
		if($type=='1'){ 
			$this->mpdf->mpdf_horizontal($cRet); 
		}else{
			header("Cache-Control: no-cache, no-store, must-revalidate");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename= Rekap_Jumat.xls");
			$this->load->view('laporan/excel',$data);
		}
	}
}
