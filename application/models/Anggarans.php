<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggarans extends MY_Model {

  public $table = 'budget';
  public $primary_key = 'id'; 

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
    $this->thn_ang = userinfo('tahun');
  } 

  public function nm_rek($kd,$jns){
    $this->db->select('rs.*');
    $this->db->from("$this->table rd");
    if($jns==1){
      $this->db->join("rek1 rs","rd.kd_rek1=rs.id","inner");
    }else{
      $this->db->join("rek2 rs","rd.kd_rek2=rs.kd_rek2","inner");
    }
     
    $this->db->where(['rd.id'=>$kd]);
    $query = $this->db->get()->row('name');
    return $query;
  }

  public function drop_rek2($rek1,$rek2){
    $query = $this->db->query("select b.id,b.name from budget b inner join rekening3 r on b.kd_rek=r.id
    where r.kd_rek1='$rek1' and r.kd_rek2='$rek2'");
    return $query->result();
  }

  public function get_rek($kd1,$kd2){
    $this->db->select('IFNULL((MAX(kd_rek3)+1),1)AS new_rek');
    $this->db->from($this->table); 
    $this->db->where(['kd_rek1'=>$kd1,'kd_rek2'=>$kd2]); 
    $query = $this->db->get()->row('new_rek');
    return $query;
  }

  public function get_sort($id){
    $this->db->select("IFNULL(MAX(sort_by)+1,1)AS sort");
    $this->db->from($this->table);
    $this->db->where(['kd_rek'=>$id]);
    $query = $this->db->get();
    return $query->result()[0]->sort;
  }

  public function get_data($rekening){ 
    $query = $this->db->query("SELECT b.tahun,b.kd_rek,b.cost,replace(b.qty1,'.00','') qty1,b.unit1,replace(b.qty2,'.00','')qty2,b.unit2,b.description,(cost*qty1*qty2)AS total  FROM budget b
    WHERE kd_rek='$rekening' and tahun='$this->thn_ang'");
    return $query->result();
  } 

  public function get_data_rak($rekening){ 
    $query = $this->db->query("SELECT *  FROM ang_kas b
    WHERE kd_rek='$rekening' and tahun='$this->thn_ang'");
    return $query->result();
  } 

  public function cek_save($rekening,$tahun,$tabel){ 
    $query = $this->db->query("SELECT count(*) hasil  FROM $tabel WHERE kd_rek='$rekening' and tahun='$tahun'")->row('hasil');
    return $query;
  } 
 
  function getListData($postData=null){
    $response = array(); 
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; 
    $columnIndex = $postData['order'][0]['column'];
    $columnName = $postData['columns'][1]['data'];
    $columnSortOrder = $postData['order'][0]['dir'];
    $searchValue = $postData['search']['value'];
 
    ## Pencarian 
    $searchQuery = " ";
    if($searchValue != ''){
       $searchQuery = " where (z.kode like '%".$searchValue."%' or z.nm_rek like '%".$searchValue."%' ) ";
    }
      
    ## Total Data 
    $records = $this->db->query("SELECT count(*) allcount from(
      SELECT id,kd_rek1 kode, name nm_rek from rekening1
      union
      SELECT id,CONCAT(kd_rek1,'.',kd_rek2) kode, name nm_rek from rekening2
      union
      SELECT id,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode, name nm_rek from rekening3
    )z order by kode")->result();
    $totalRecords = $records[0]->allcount;

    ## Total Data Yang Difilter 
    if($searchQuery != '') 
      $records = $this->db->query("SELECT count(*) allcount from(
        SELECT id,kd_rek1 kode, name nm_rek from rekening1
        union
        SELECT id,CONCAT(kd_rek1,'.',kd_rek2) kode, name nm_rek from rekening2
        union
        SELECT id,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode, name nm_rek from rekening3
      )z $searchQuery order by kode")->result();
      $totalRecordwithFilter = $records[0]->allcount;

    ## Fetch Data 
      $records = $this->db->query("SELECT z.id,z.kd_rek,z.kode,z.nm_rek,sum(b.total) nilai from(
                      SELECT id,kd_rek1 kd_rek,kd_rek1 kode, name nm_rek from rekening1
                      union
                      SELECT id,CONCAT(kd_rek1,kd_rek2) kd_rek,CONCAT(kd_rek1,'.',kd_rek2) kode, name nm_rek from rekening2
                      union
                      SELECT id,CONCAT(kd_rek1,kd_rek2,kd_rek3) kd_rek,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode, name nm_rek from rekening3 
                )z  
                  left join budget b on z.kd_rek=left(b.kd_rek,length(z.kd_rek)) and tahun='$this->thn_ang'
                  $searchQuery 
                  GROUP BY z.kd_rek
                order by $columnName $columnSortOrder limit $start,$rowperpage")->result();

    $data = array();
    $no=0;
    foreach($records as $record ){
      $no++;
      if(strlen($record->kode)>3){
        $nom = $no;
        $kode = $record->kode;
        $nm_rek = $record->nm_rek;
        $nilai = number_format($record->nilai);
        $btn="<a href=". site_url('anggaran').'/update/'.$record->kode ." class='btn btn-icon btn-outline-primary btn-sm' data-toggle='tooltip' data-original-title='Ubah Data'> <i class='feather icon-edit'></i></a>";
      }else{
        $kode = '<b>'.$record->kode.'</b>';
        $nm_rek = '<b>'.$record->nm_rek.'</b>';
        $nilai = '<b>'.number_format($record->nilai).'</b>';
        $nom = '<b>'.$no.'</b>';
        $btn='';
      }
       
        $data[] = array( 
          "kode"=>$kode,
          "nm_rek"=>$nm_rek, 
          "nilai"=> $nilai,
          "nom"=>$nom, 
          "action"=>$btn
       ); 
    }
 
    $response = array(
       "draw" => intval($draw),
       "iTotalRecords" => $totalRecords,
       "iTotalDisplayRecords" => $totalRecordwithFilter,
       "aaData" => $data
    );

    return $response; 
  }
 
  function getListDataRak($postData=null){
    $response = array(); 
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; 
    $columnIndex = $postData['order'][0]['column'];
    $columnName = $postData['columns'][1]['data'];
    $columnSortOrder = $postData['order'][0]['dir'];
    $searchValue = $postData['search']['value'];
 
    ## Pencarian 
    $searchQuery = " ";
    if($searchValue != ''){
       $searchQuery = " where (z.kode like '%".$searchValue."%' or z.nm_rek like '%".$searchValue."%' ) ";
    }
      
    ## Total Data 
    $records = $this->db->query("SELECT count(*) allcount from(
      SELECT id,kd_rek1 kode, name nm_rek from rekening1
      union
      SELECT id,CONCAT(kd_rek1,'.',kd_rek2) kode, name nm_rek from rekening2
      union
      SELECT id,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode, name nm_rek from rekening3
    )z order by kode")->result();
    $totalRecords = $records[0]->allcount;

    ## Total Data Yang Difilter 
    if($searchQuery != '') 
      $records = $this->db->query("SELECT count(*) allcount from(
        SELECT id,kd_rek1 kode, name nm_rek from rekening1
        union
        SELECT id,CONCAT(kd_rek1,'.',kd_rek2) kode, name nm_rek from rekening2
        union
        SELECT id,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode, name nm_rek from rekening3
      )z $searchQuery order by kode")->result();
      $totalRecordwithFilter = $records[0]->allcount;

    ## Fetch Data 
      $records = $this->db->query("SELECT z.id,z.kd_rek,z.kode,z.nm_rek,sum(b.total) nilai from(
                      SELECT id,kd_rek1 kd_rek,kd_rek1 kode, name nm_rek from rekening1
                      union
                      SELECT id,CONCAT(kd_rek1,kd_rek2) kd_rek,CONCAT(kd_rek1,'.',kd_rek2) kode, name nm_rek from rekening2
                      union
                      SELECT id,CONCAT(kd_rek1,kd_rek2,kd_rek3) kd_rek,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode, name nm_rek from rekening3 
                )z  
                  left join ang_kas b on z.kd_rek=left(b.kd_rek,length(z.kd_rek)) and tahun='$this->thn_ang'
                  $searchQuery 
                  GROUP BY z.kd_rek
                order by $columnName $columnSortOrder limit $start,$rowperpage")->result();

    $data = array();
    $no=0;
    foreach($records as $record ){
      $no++;
      if(strlen($record->kode)>3){
        $nom = $no;
        $kode = $record->kode;
        $nm_rek = $record->nm_rek;
        $nilai = number_format($record->nilai);
        $btn="<a href=". site_url('anggaran').'/updateRak/'.$record->kode ." class='btn btn-icon btn-outline-primary btn-sm' data-toggle='tooltip' data-original-title='Ubah Data'> <i class='feather icon-edit'></i></a>";
      }else{
        $kode = '<b>'.$record->kode.'</b>';
        $nm_rek = '<b>'.$record->nm_rek.'</b>';
        $nilai = '<b>'.number_format($record->nilai).'</b>';
        $nom = '<b>'.$no.'</b>';
        $btn='';
      }
       
        $data[] = array( 
          "kode"=>$kode,
          "nm_rek"=>$nm_rek, 
          "nilai"=> $nilai,
          "nom"=>$nom, 
          "action"=>$btn
       ); 
    }
 
    $response = array(
       "draw" => intval($draw),
       "iTotalRecords" => $totalRecords,
       "iTotalDisplayRecords" => $totalRecordwithFilter,
       "aaData" => $data
    );

    return $response; 
  }
  
  public function get_report(){     
    $query = $this->db->query("SELECT * from(
      SELECT '1' style,kd_rek1 kode,name,'' satuan,0 nilai,
      (SELECT ifnull(sum(jumlah),0) jumlah from(
      SELECT left(kd_rek,1) rek,(if(qty1>0,qty1,1)*if(qty2>0,qty2,1)*if(cost>0,cost,0)) jumlah from budget
      )v where rek=r.kd_rek1) jumlah
      from rekening1 r
      left join budget b on r.kd_rek1=left(b.kd_rek,1)
      where b.tahun='$this->thn_ang'
      GROUP BY r.kd_rek1
      
      union
      SELECT '2' style,concat(kd_rek1,'.',kd_rek2) kode,name,'' satuan,0 nilai,
      (SELECT ifnull(sum(jumlah),0) jumlah from(
        SELECT left(kd_rek,2) rek,(if(qty1>0,qty1,1)*if(qty2>0,qty2,1)*if(cost>0,cost,0)) jumlah from budget
      )v where left(rek,1)=r.kd_rek1 and SUBSTR(rek,2,1)=r.kd_rek2) jumlah
      from rekening2 r
      left join budget b on r.kd_rek1=left(b.kd_rek,1) and r.kd_rek2=substr(b.kd_rek,2,1)
      where b.tahun='$this->thn_ang'
      GROUP BY r.kd_rek1,r.kd_rek2
      
      union
      SELECT '3' style,concat(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode,name,
      concat(REPLACE(qty1,'.00',''),' ',unit1, IF(qty2>0,concat(' / ',REPLACE(qty2,'.00',''),' ',unit2),'')) satuan,
      ifnull(cost,0) nilai, (if(qty1>0,qty1,1)*if(qty2>0,qty2,1)*if(cost>0,cost,0))jumlah  
      from rekening3 r
      left join budget b on r.kd_rek1=left(b.kd_rek,1) and r.kd_rek2=substr(b.kd_rek,2,1) and r.kd_rek3=substr(b.kd_rek,3,1)
      where b.tahun='$this->thn_ang'
      GROUP BY r.kd_rek1,r.kd_rek2,r.kd_rek3
      
      union
      -- Hitung Total	
      SELECT '4' style,concat(kd_rek1,'x') kode,concat('Total ',name) name,'' satuan,0 nilai,
      (SELECT ifnull(sum(jumlah),0) jumlah from(
      SELECT left(kd_rek,1) rek,(if(qty1>0,qty1,1)*if(qty2>0,qty2,1)*if(cost>0,cost,0)) jumlah from budget
      )v where rek=r.kd_rek1) jumlah
      from rekening1 r
      left join budget b on r.kd_rek1=left(b.kd_rek,1)
      where b.tahun='$this->thn_ang'
      GROUP BY r.kd_rek1
      union 
      SELECT '5' style,concat(kd_rek1,'xx') kode,'' name,'' satuan,0 nilai,0 jumlah from rekening1 
      
      union
      -- Hitung Surplus/Defisit
      SELECT '6' style,'9x' kode,'Surplus / Defisit' name,'' satuan,0 nilai,(sum(debet)-sum(kredit)) jumlah from(	
        SELECT ifnull(sum(jumlah),0) debet,0 kredit from(
          SELECT left(kd_rek,1) rek,total jumlah from budget where tahun='$this->thn_ang'
        )v where left(rek,1)=1	
        union
        SELECT 0 debet,ifnull(sum(jumlah),0) kredit from(
          SELECT left(kd_rek,2) rek,total jumlah from budget where tahun='$this->thn_ang'
        )v where left(rek,1)=2
      )sd
      
    )mr order by kode");
    return ($query)?$query->result():false;
  }
  
  public function get_report_rak(){     
    $query = $this->db->query("SELECT * from(
      SELECT '1' style,kd_rek1 kode,name,ifnull(sum(total),0) total,ifnull(sum(januari),0) januari,ifnull(sum(februari),0) februari,ifnull(sum(maret),0) maret,ifnull(sum(april),0) april,ifnull(sum(mei),0) mei,ifnull(sum(juni),0) juni,ifnull(sum(juli),0) juli,ifnull(sum(agustus),0) agustus,ifnull(sum(september),0) september,ifnull(sum(oktober),0) oktober,ifnull(sum(november),0) november,ifnull(sum(desember),0) desember
      from rekening1 r
      left join ang_kas b on r.kd_rek1=left(b.kd_rek,1)
      where b.tahun='$this->thn_ang'
      GROUP BY r.kd_rek1
      
      union
      SELECT '2' style,concat(kd_rek1,'.',kd_rek2) kode,name,ifnull(sum(total),0) total,ifnull(sum(januari),0) januari,ifnull(sum(februari),0) februari,ifnull(sum(maret),0) maret,ifnull(sum(april),0) april,ifnull(sum(mei),0) mei,ifnull(sum(juni),0) juni,ifnull(sum(juli),0) juli,ifnull(sum(agustus),0) agustus,ifnull(sum(september),0) september,ifnull(sum(oktober),0) oktober,ifnull(sum(november),0) november,ifnull(sum(desember),0) desember
      from rekening2 r
      left join ang_kas b on r.kd_rek1=left(b.kd_rek,1) and r.kd_rek2=substr(b.kd_rek,2,1)
      where b.tahun='$this->thn_ang'
      GROUP BY  r.kd_rek1,r.kd_rek2
      
      union
      SELECT '3' style,concat(kd_rek1,'.',kd_rek2,'.',kd_rek3) kode,name,ifnull(sum(total),0) total,ifnull(sum(januari),0) januari,ifnull(sum(februari),0) februari,ifnull(sum(maret),0) maret,ifnull(sum(april),0) april,ifnull(sum(mei),0) mei,ifnull(sum(juni),0) juni,ifnull(sum(juli),0) juli,ifnull(sum(agustus),0) agustus,ifnull(sum(september),0) september,ifnull(sum(oktober),0) oktober,ifnull(sum(november),0) november,ifnull(sum(desember),0) desember
      from rekening3 r
      left join ang_kas b on r.kd_rek1=left(b.kd_rek,1) and r.kd_rek2=substr(b.kd_rek,2,1) and r.kd_rek3=substr(b.kd_rek,3,1)
      where b.tahun='$this->thn_ang'
      GROUP BY  r.kd_rek1,r.kd_rek2,r.kd_rek3
      
      union	
      SELECT '4' style,concat(kd_rek1,'x') kode,'' name,0 total,0 januari,0 februari,0 maret,0 april,0 mei,0 juni,0 juli,0 agustus,0 september,0 oktober,0 november,0 desember
      from rekening1  r
      GROUP BY r.kd_rek1
      
      -- Total
      union	
      SELECT '5' style,concat(kd_rek1,'xx') kode,concat('Total ',name) name,ifnull(sum(total),0) total,ifnull(sum(januari),0) januari,ifnull(sum(februari),0) februari,ifnull(sum(maret),0) maret,ifnull(sum(april),0) april,ifnull(sum(mei),0) mei,ifnull(sum(juni),0) juni,ifnull(sum(juli),0) juli,ifnull(sum(agustus),0) agustus,ifnull(sum(september),0) september,ifnull(sum(oktober),0) oktober,ifnull(sum(november),0) november,ifnull(sum(desember),0) desember
      from rekening1 r
      left join ang_kas b on r.kd_rek1=left(b.kd_rek,1)
      where b.tahun='$this->thn_ang'
      GROUP BY r.kd_rek1
      
      union	
      SELECT '4' style,concat(kd_rek1,'xxx') kode,'' name,0 total,0 januari,0 februari,0 maret,0 april,0 mei,0 juni,0 juli,0 agustus,0 september,0 oktober,0 november,0 desember
      from rekening1  r
      GROUP BY r.kd_rek1
      
      union
      -- Surplus Defisit
      SELECT '1' style,'9' kode,'Surplus/Defisit',
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(total) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(total) ELSE 0 END))  as total,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(januari) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(januari) ELSE 0 END)) januari,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(februari) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(februari) ELSE 0 END)) februari,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(maret) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(maret) ELSE 0 END)) maret,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(april) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(april) ELSE 0 END)) april,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(mei) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(mei) ELSE 0 END)) mei,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(juni) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(juni) ELSE 0 END)) juni,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(juli) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(juli) ELSE 0 END)) juli,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(agustus) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(agustus) ELSE 0 END)) agustus,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(september) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(september) ELSE 0 END)) september,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(oktober) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(oktober) ELSE 0 END)) oktober,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(november) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(november) ELSE 0 END)) november,
      ((CASE left(b.kd_rek,1) WHEN 1 THEN sum(desember) ELSE 0 END)-(CASE left(b.kd_rek,1) WHEN 2 THEN sum(desember) ELSE 0 END)) desember
      from  ang_kas b  
      where b.tahun='$this->thn_ang'
    )zx order by kode");
    return ($query)?$query->result():false;
  }
  
  
}