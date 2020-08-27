<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggarans extends MY_Model {

  public $table = 'budget';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
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
    $query = $this->db->query("select b.id,b.name from budget b inner join rekening r on b.kd_rek=r.id
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

  public function get_data($id){
    $query = $this->db->query("SELECT b.*,(cost*qty1*qty2)AS total, k.kd_rek1,k.kd_rek2,k.name AS nm_rek2, r.kd_rek3,r.name AS nm_rek3 FROM budget b 
    INNER JOIN rekening r ON b.kd_rek=r.id
    LEFT JOIN rek2 k ON r.kd_rek2=k.kd_rek2 AND r.kd_rek1=k.kd_rek1
    WHERE b.id='$id'");
    return $query->result();
  }

  public function get_list(){
    $this->db->select('b.*,kd_rek1,kd_rek2,kd_rek3');
    $this->db->from("$this->table b"); 
    $this->db->join("rekening r","b.kd_rek=r.id", "inner"); 
    $this->db->order_by("kd_rek1,kd_rek2,kd_rek3,b.id"); 
    $query = $this->db->get();
    return ($query)?$query->result():false;
  }
  
  public function get_report(){     
    $query = $this->db->query("SELECT * FROM(
      SELECT 'T'AS sts,ri.id AS kd_rek,ri.name,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS description 
      FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
      LEFT JOIN rek1 ri ON r.kd_rek1=ri.id  
      GROUP BY r.kd_rek1
      UNION		
      SELECT 'T'AS sts,CONCAT(r.kd_rek1,'.',r.kd_rek2)AS kd_rek,ri.name,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS DESCRIPTION 
      FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
      LEFT JOIN rek2 ri ON r.kd_rek1=ri.kd_rek1 AND r.kd_rek2=ri.kd_rek2
      GROUP BY r.kd_rek1,r.kd_rek2
      UNION
      SELECT 'T'AS sts,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3)AS kd_rek,r.NAME,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS DESCRIPTION 
      FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id GROUP BY r.kd_rek1,r.kd_rek2,r.kd_rek3
      UNION
      SELECT 'T'AS sts,CONCAT(r.kd_rek1,'.',r.kd_rek2,'.',r.kd_rek3,'.',sort_by)AS kd_rek,b.name,cost,
      CONCAT(qty1,' ',unit1, CASE WHEN qty2=0 THEN '' ELSE CONCAT(' / ',qty2,' ',unit2) END)AS unit,(cost*qty1*(IF(qty2>0, qty2, 1)))AS total,DESCRIPTION 
      FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id
      UNION
      SELECT 'H1'AS sts,CONCAT(r.kd_rek1,'.999')AS kd_rek,CONCAT('Total ',ri.name)AS NAME,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS DESCRIPTION 
      FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
      LEFT JOIN rek1 ri ON r.kd_rek1=ri.id  
      GROUP BY r.kd_rek1
      UNION
      SELECT 'H'AS sts,CONCAT(r.kd_rek1,'.9999')AS kd_rek,'&nbsp;'AS NAME,0 AS cost,0 AS unit,0 AS total,''AS DESCRIPTION 
      FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id GROUP BY r.kd_rek1
      union
      SELECT sts,kd_rek,NAME,cost,unit,(SUM(debet)-SUM(kredit))AS total,DESCRIPTION FROM(
        SELECT 'H1'AS sts,'8.999' AS kd_rek,'Surplus / (Defisit)'AS NAME,0 AS cost,''AS unit,
        IF(ri.id=1,SUM(cost*qty1*(IF(qty2>0, qty2, 1))),0)AS debet,
        IF(ri.id=2,SUM(cost*qty1*(IF(qty2>0, qty2, 1))),0)AS kredit,
        ''AS DESCRIPTION 
        FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
        LEFT JOIN rek1 ri ON r.kd_rek1=ri.id
        GROUP BY r.kd_rek1
      )zx
    )zx ORDER BY kd_rek");
    return ($query)?$query->result():false;
  }
  
  
}