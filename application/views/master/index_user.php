 
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                    <div style="float:right;"> 
                        <a href="<?php echo site_url('master/user/add');?>" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="tooltip" data-original-title="Tambah"> <i class="feather icon-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">username</th>
                                        <th width="30%">Nama</th> 
                                        <th width="20%">Email</th> 
                                        <th width="10%">Foto</th> 
                                        <th width="15%">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach($list as $row){?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $row->username;?></td>  
                                        <td><?php echo $row->name;?></td>  
                                        <td><?php echo $row->email;?></td>  
                                        <td>
                                            <img class="round" src="<?php echo $row->image;?>" alt="" width="40" height="40">
                                        </td>  
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
    
 