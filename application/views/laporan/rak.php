  
<section id="basic-datatable">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        <a target="_blank" href="<?php echo $url.'/report_rak?type=1';?>" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Cetak PDF"> <i class="feather icon-printer"></i> Cetak PDF</a> 
                        <a target="_blank" href="<?php echo $url.'/report_rak?type=2';?>" class="btn btn-icon btn-outline-success btn-sm" data-toggle="tooltip" data-original-title="Cetak"> <i class="feather icon-printer"></i> Cetak Excel</a> 
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive"> 
                            <table class="table" width="100%" border="1">
                                <thead class="thead-dark">
                                    <tr> 
                                        <th width="5%">Rekening</th> 
                                        <th width="30%">Nama</th>    
                                        <th width="10%">Total</th>       
                                        <th width="10%">Januari</th>    
                                        <th width="10%">Februari</th>    
                                        <th width="10%">Maret</th>    
                                        <th width="10%">April</th>    
                                        <th width="10%">Mei</th>    
                                        <th width="10%">Juni</th>    
                                        <th width="10%">Juli</th>    
                                        <th width="10%">Agustus</th>    
                                        <th width="10%">September</th>    
                                        <th width="10%">Oktober</th>    
                                        <th width="10%">November</th>    
                                        <th width="10%">Desember</th>    
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach($list as $row){
                                        $vs = $row->style;
                                        if($vs=='3'){
                                            $style= "";
                                        }else{
                                            $style= "font-weight:bold;";
                                        }
                                    ;?>

                                    <tr> 
                                        <td style="<?= $style;?>"><?=($vs<'4')?$row->kode:'';?></td>  
                                        <td style="<?= $style;?>"><?= $row->name;?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->total==0)?'':number_format($row->total);?></td>   
                                        <td style="<?= $style;?>" align="right"><?= ($row->januari==0)?'':number_format($row->januari);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->februari==0)?'':number_format($row->februari);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->maret==0)?'':number_format($row->maret);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->april==0)?'':number_format($row->april);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->mei==0)?'':number_format($row->mei);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->juni==0)?'':number_format($row->juni);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->juli==0)?'':number_format($row->juli);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->agustus==0)?'':number_format($row->agustus);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->september==0)?'':number_format($row->september);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->oktober==0)?'':number_format($row->oktober);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->november==0)?'':number_format($row->november);?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->desember==0)?'':number_format($row->desember);?></td>  
                                    </tr> 
                                    <?php };?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<script type="text/javascript"> 

</script>
    
 