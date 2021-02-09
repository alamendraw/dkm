  
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
                            <table class="table" width="100%" border="1">
                                <thead class="thead-dark">
                                    <tr> 
                                        <th width="5%">Rekening</th> 
                                        <th width="50%">Nama</th> 
                                        <th width="13%">Nilai</th>    
                                        <th width="19%">Satuan</th>    
                                        <th width="13%">Jumlah</th>    
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
                                        <td style="<?= $style;?>" align="right"><?= ($row->nilai==0)?'':number_format($row->nilai);?></td>  
                                        <td style="<?= $style;?>"><?= $row->satuan;?></td>  
                                        <td style="<?= $style;?>" align="right"><?= ($row->jumlah==0)?'':number_format($row->jumlah);?></td>  
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
    
 