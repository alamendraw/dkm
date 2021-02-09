<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends MY_Model {

  public $table = 'mosque';
  public $primary_key = 'id';

  public function __construct()
  {
    parent::__construct();
    $this->soft_deletes = FALSE;
  } 

  public function get_dash(){
    $query = $this->db->query("SELECT sum(debet)as debet,sum(kredit)as kredit,sum(all_debet)as all_debet,sum(debet_lalu)as debet_lalu,sum(kredit_lalu)as kredit_lalu,sum(all_kredit)as all_kredit,(sum(all_debet)-sum(all_kredit))as saldo,sum(ang_in)as ang_in,sum(ang_out)as ang_out, (sum(all_debet)/sum(ang_in)*100)as persen_debet,(sum(all_kredit)/sum(ang_out)*100)as persen_kredit
    from(
      SELECT sum(debet)as debet, sum(kredit)as kredit, 0 as all_debet, 0 as debet_lalu, 0 as kredit_lalu, 0 as all_kredit,0 as ang_in,0 as ang_out
      from transaction where month(date) = MONTH(now())
      union
      SELECT 0, 0, 0, sum(debet), sum(kredit), 0,0,0
      from transaction where month(date) = MONTH(now())-1
      union
      SELECT 0, 0, sum(debet), 0, 0, sum(kredit),0,0
      from transaction
      union
      SELECT 0, 0, 0, 0, 0, 0,SUM(cost*qty1*(IF(qty2>0, qty2, 1))), 0 from budget b inner JOIN rekening3 r on b.kd_rek=r.id where r.kd_rek1=1
      union
      SELECT 0, 0, 0, 0, 0, 0,0,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) from budget b inner JOIN rekening3 r on b.kd_rek=r.id where r.kd_rek1=2
    )zx");   
    return $query->result();
  }
  
  public function get_profile(){
    $id = userinfo('id');
    $this->db->select("*");
    $this->db->from("user");
    $this->db->where(['id'=>$id]);
    $query = $this->db->get();
    return $query->result()[0];
  }
  
}