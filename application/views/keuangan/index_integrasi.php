  
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" width="100%">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th> 
                                        <th width="10%">Tanggal</th>  
                                        <th width="47%">Keterangan</th>  
                                        <th width="15%">Pemasukan</th>        
                                        <th width="15%">Pengeluran</th>        
                                        <th width="10%">Proses</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach($list as $row){?>
                                    <tr>
                                        <td><?php echo $no++;?></td> 
                                        <td><?php echo date_simple($row->date);?></td>  
                                        <td><?php echo $row->description;?></td> 
                                        <td align='right'><?php echo number_format($row->debet);?></td>  
                                        <td align='right'><?php echo number_format($row->kredit);?></td>  
                                        <td> 
                                            <a href="<?php echo $url.'/proses/'.$row->id;?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Ubah Data"> <i class="feather icon-edit"></i></a>
                                        </td> 
                                    </tr> 
                                    <?php };?>
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
    
 