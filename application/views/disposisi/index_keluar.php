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
                                        <th width="5%">No</th>
                                        <th width="20%">No Surat</th> 
                                        <th width="13%">Tanggal</th> 
                                        <th width="42%">Lokasi</th>      
                                        <th width="20%">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach($list as $row){?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $row->no_mail.'.'.$row->type.'/'.strtoupper($mosque->code).'/'.month_romawi(substr($row->date,5,2)).'/'.substr($row->date,0,4);?></td> 
                                        <td><?php echo date_simple($row->date);?></td> 
                                        <td><?php echo $row->location;?></td>  
                                        <td> 
                                        <a href="<?php echo $url.'/update/'.$row->id;?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Ubah Data"> <i class="feather icon-edit"></i></a>
                                        <a href="javascript:void(0);" onclick="huda_delete('<?php echo $url.'/delete/'.$row->id;?>')" class="btn btn-icon btn-delete btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Hapus"> <i class="feather icon-trash"></i></a> 
                                        <a href="<?php echo $url.'/report/'.$row->id;?>" target="_blank" class="btn btn-icon btn-outline-success btn-sm" data-toggle="tooltip" data-original-title="Cetak"> <i class="feather icon-printer"></i></a> 
                                        <a href="<?php echo $url.'/blangko/'.$row->id;?>" target="_blank" class="btn btn-icon btn-outline-info btn-sm" data-toggle="tooltip" data-original-title="Cetak Blanko TTD"> <i class="feather icon-file"></i></a> 
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
    
 