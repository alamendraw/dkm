  
<section id="basic-datatable">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        <a target="_blank" href="<?php echo $url.'/report_apbm?type=1';?>" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Cetak PDF"> <i class="feather icon-printer"></i> Cetak PDF</a> 
                        <a target="_blank" href="<?php echo $url.'/report_apbm?type=2';?>" class="btn btn-icon btn-outline-success btn-sm" data-toggle="tooltip" data-original-title="Cetak"> <i class="feather icon-printer"></i> Cetak Excel</a> 
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive"> 
                            <table class="table" width="100%">
                                <thead class="thead-dark">
                                    <tr> 
                                        <th >Rekening</th> 
                                        <th >Nama</th> 
                                        <th >Nilai</th>    
                                        <th >Satuan</th>    
                                        <th >Total</th>    
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach($list as $row){
                                        if(strlen($row->kd_rek)<7){
                                            $b = '<b> '; $bt = ' </b>';
                                        }else{
                                            $b = ''; $bt = '';
                                        }
                                        if($row->sts=='H1'){
                                            $cls = 'table-primary'; 
                                        }else{
                                            $cls = ''; 
                                        }
                                    ;?>

                                    <tr class="<?php echo $cls;?>"> 
                                        <td><?php echo $b; echo ($row->sts!='T')?'':$row->kd_rek;?><?php echo $bt; ?></td>  
                                        <td><?php echo $b; echo $row->name;?><?php echo $bt; ?></td>  
                                        <td align="right"><?php echo $b; echo ($row->cost==0)?'':number_format($row->cost);?><?php echo $bt; ?></td>  
                                        <td><?php echo $b; echo ($row->unit==0)?'':$row->unit;?><?php echo $bt; ?></td>  
                                        <td align="right"><?php echo $b; echo ($row->total==0)?'':number_format($row->total);?><?php echo $bt; ?></td>  
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
    
 