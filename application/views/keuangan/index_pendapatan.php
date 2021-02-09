  
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        <a href="<?php echo $url.'/add';?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Tambah Pendapatan"> <i class="feather icon-plus"></i> Tambah</a> 
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" width="100%">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th> 
                                        <th width="12%">Tanggal</th>  
                                        <th width="55%">Keterangan</th>  
                                        <th width="20%">Nilai</th>        
                                        <th width="10%">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach($list as $row){?>
                                    <tr>
                                        <td><?php echo $no++;?></td> 
                                        <td><?php echo date_simple($row->date);?></td>  
                                        <td><?php echo $row->description;?></td> 
                                        <td align='right'><?php echo number_format($row->debet);?></td>  
                                        <td> 
                                        <a href="<?php echo $url.'/update/'.$row->id;?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Ubah Data"> <i class="feather icon-edit"></i></a>
                                        <a href="javascript:void(0);" onclick="huda_delete('<?php echo $url.'/delete/'.$row->id;?>')" class="btn btn-icon btn-delete btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Hapus"> <i class="feather icon-trash"></i></a> 
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
    
 