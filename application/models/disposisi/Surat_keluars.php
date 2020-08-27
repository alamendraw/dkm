<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluars extends MY_Model {

  public $table = 'mail_out';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  public function get_list(){
    $this->db->select("*");
    $this->db->from("$this->table"); 
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }

  function get_guest($id='',$type=''){
    $this->db->select('*');
    $this->db->from('invited_guests'); 
    if($id!=''){
      $this->db->where("id $type ($id) and deleted_at is null");
    }else{
      $this->db->where("deleted_at is null");
    }
    
    $data = $this->db->get();
    return $data;
  }
  
  function get_type($no=''){
    $this->db->select('*');
    $this->db->from('mail_type');  
    if($no!=''){
      $this->db->where(['no'=>$no]);  
    }
    $data = $this->db->get();
    return $data->result();
  }
  
  public function get_report($id,$name=''){
    if($name!=''){
      $color = 'black';
      $image = "<img src='".base_url()."assets/images/logo/masjid.png'  height='65' width='65' />";
    }else{
      $color = 'white';
      $image = "";
    }
    $cRet = '';
    $mail = $this->db->query("SELECT m.*,t.name as name_type FROM mail_out m inner join mail_type t on m.type=t.no WHERE m.id='$id'")->result()[0];
    $mosque = $this->mosques->get(['id'=>userinfo('mosque_id')]);
		$cRet .="<table width='100%' style='font-size:14px; border-collapse:collapse; font-family:arial; color:$color;' border='0'>
					<tr>
						<td align='right' width='15%' rowspan='3'>
						$image
						</td>
						<td align='center' width='70%'><b>DEWAN KEMAKMURAN</b></td>
						<td align='center' width='10%' rowspan='3'></td>
					</tr>
					<tr>
						<td align='center' style='font-size:18px;'><b> MASJID ".strtoupper($mosque->name)."</b></td>  
					</tr>
					<tr>
						<td align='center' style='font-size:12px;'>".$mosque->address."</td>  
					</tr>
					<tr>
						<td colspan='3' style='border-bottom:solid 3px $color;font-size:12px;'> </td>  
					</tr>
        </table>";

        $cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial; color:$color;' border='0'> 
              <tr>
                <td width='15%'>Nomor</td>  
                <td width='55%'>: ".$mail->no_mail.'.'.$mail->type.'/'.strtoupper($mosque->code).'/'.month_romawi(substr($mail->date,5,2)).'/'.substr($mail->date,0,4)."</td>  
                <td width='30%'>Karawang, ".date_indo($mail->date)."</td>  
              </tr> 
              <tr>
                <td>Lampiran</td>  
                <td>: -</td>  
                <td>Kepada</td>  
              </tr> 
              <tr>
                <td>Perihal</td>  
                <td>: ".$mail->name_type."</td>  
                <td>Yth. Bapak/Saudara</td>  
              </tr>
              <tr>
                <td></td>  
                <td></td>  
                <td>$name</td>  
              </tr>
              <tr>
                <td></td>  
                <td></td>  
                <td>di</td>  
              </tr> 
              <tr>
                <td></td>  
                <td></td>  
                <td>&nbsp;&nbsp; Tempat</td>  
              </tr> 
              <tr>
                <td colspan='3' style='font-size:15px;'>&nbsp;</td>
              </tr>
            </table>";

            $cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial; color:$color;' border='0'> 
                  <tr>
                    <td colspan='3'><i style='padding-top:20px;'>Assalamu'alaikum Wr.Wb</i></td>
                  </tr>
                  <tr>
                    <td colspan='3' style='font-size:5px;'>&nbsp; </td>
                  </tr>
                  <tr>
                    <td colspan='3' align='justify'><p style='text-indent:50px;'>&emsp;&emsp;&emsp;
                    ".$mail->header1."</p>
                    </td>
                  </tr> 
                  <tr>
                    <td colspan='3' align='justify'>&emsp;&emsp;&emsp;
                    ".$mail->header2."
                    </td>
                  </tr>
                  <tr>
                    <td colspan='3' >&nbsp; </td>
                  </tr>
                  <tr>
                    <td width='6%'></td>  
                    <td width='15%'>Hari</td>  
                    <td width='79%'>: ".$mail->day."</td>  
                  </tr>   
                  <tr>
                    <td></td>  
                    <td>Tanggal</td>  
                    <td>: ".date_indo($mail->date)."</td>  
                  </tr> 
                  <tr>
                    <td></td>  
                    <td>Tempat</td>  
                    <td>: ".$mail->location."</td>  
                  </tr> 
                  <tr>
                    <td></td>  
                    <td>Waktu</td>  
                    <td>: ".substr($mail->time,0,5).' '.$mail->time_desc."</td>  
                  </tr> 
                  <tr>
                    <td colspan='3' >&nbsp; </td>
                  </tr>
                  <tr>
                    <td colspan='3' align='justify'>&emsp;&emsp;&emsp;
                    ".$mail->footer1."
                    </td>
                  </tr>    
                  <tr>
                    <td colspan='3' style='font-size:5px;'>&nbsp; </td>
                  </tr>
                  <tr>
                    <td colspan='3'><i>Wassalamu'alaikum Wr.Wb</i></td>
                  </tr>
                </table>";
                
      // if($name==''){ 
        $cRet .="<table width='100%' style='font-size:12px; border-collapse:collapse; font-family:arial; ' border='0'> 
                  <tr>
                    <td width='70%' style='font-size:50px;'>&nbsp;</td>
                    <td width='30%'></td>
                  </tr>
                  
                  <tr>
                    <td></td>
                    <td align='center'>Ketua DKM</td>
                  </tr>
                  
                  <tr>
                    <td colspan='2' style='font-size:50px;'>&nbsp;</td> 
                  </tr>
                  
                  <tr>
                    <td></td>
                    <td align='center'>".$mosque->ketua_dkm."</td>
                  </tr>
                
                </table>";
      // }
    return $cRet;
  }
  
  // public function get_data($id){
  //   $this->db->select("t.*");
  //   $this->db->from("$this->table t");
  //   $this->db->where(['id'=>$id]);
  //   $query = $this->db->get();
  //   return ($query)?$query->result():false;
  // }
  
  public function get_last_no($type){
    $this->db->select("IFNULL((MAX(no_mail)*1),0)AS no");
    $this->db->from($this->table);
    $this->db->where(['type'=>$type]);
    $query = $this->db->get()->result()[0]->no;
    return sprintf("%03d", $query+1);;
  }
  
}