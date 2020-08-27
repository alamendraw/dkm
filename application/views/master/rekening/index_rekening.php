  
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        <a href="<?php echo $url.'/add/1';?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Tambah Pendapatan"> <i class="feather icon-corner-right-down"></i> Tambah Pendapatan</a>
                        <a href="<?php echo $url.'/add/2';?>" class="btn btn-icon btn-outline-success btn-sm" data-toggle="tooltip" data-original-title="Tambah Pengeluaran"> <i class="feather icon-corner-left-up"></i> Tambah Pengeluaran</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="47%">Nama</th>
                                        <th width="11%">Rekening 1</th>  
                                        <th width="11%">Rekening 2</th>  
                                        <th width="11%">Rekening 3</th>  
                                        <th width="15%">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach($list as $row){?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $row->name;?></td> 
                                        <td><?php echo $row->kd_rek1;?></td> 
                                        <td><?php echo $row->kd_rek2;?></td> 
                                        <td><?php echo $row->kd_rek3;?></td> 
                                        <td> 
                                        <a href="<?php echo $url.'/update/'.$row->id.'/'.$row->kd_rek1;?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Ubah Data"> <i class="feather icon-edit"></i></a>
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
 
<!-- <script src="<?php echo base_url();?>assets/js/script/datatables/datatables.js"></script>
<script src="<?php echo base_url();?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url();?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>  -->

<script type="text/javascript"> 
    // function delete_f(id){
    //     Swal.fire({
    //     title: 'Peringatan?',
    //     text: "Data akan di hapus?",
    //     type: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Iya, Hapus',
    //     cancelButtonText: 'Batal',
    //     confirmButtonClass: 'btn btn-primary',
    //     cancelButtonClass: 'btn btn-danger ml-1',
    //     buttonsStyling: false,
    //     }).then(function (result) {
    //     if (result.value) {
    //         $.ajax({
    //             type:'post',
    //             url:'<?php echo $url;?>/delete/'+id,
    //             dataType:'json',
    //             success: function(data){
    //                 Swal.fire({
    //                     type: data.status,
    //                     title: data.title,
    //                     text: data.message,  
    //                 });
    //                 location.reload();
    //             }
    //         });
            
    //     }
    //     });
    // }
    
</script>
    
 