<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo site_url('master/kategori/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" placeholder="Nama Kategori" value="<?php echo ($action=='update')?$data->name:'';?>" required data-validation-required-message="Nama Kategori Harus Diisi">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <select name="type" id="type" class="form-control" placeholder="Type Kategori" required data-validation-required-message="Type Kategori Harus Diisi">
                                                <option value=""></option>
                                                <option value="P">Pendapatan</option>
                                                <option value="B">Belanja</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                 
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <button type="button" id="back" class="btn btn-outline-warning">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/extensions/toastr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/extensions/toastr.min.css"> -->

<script src="<?php echo base_url('assets/js/scripts/extensions/toastr.min.js'); ?>"></script>

<script type="text/javascript"> 
    var url = "<?php echo $url;?>";
    <?php if($action=='update'){;?>      
        $("#type").val("<?php echo $data->type;?>");
    <?php }?>

    $("#back").on('click',function(){
        window.location.replace(url);
    });
    $(function() {       
        $("#form").validate({
        errorElement: "span",
        errorClass: 'help-block',
        highlight: function (element) {
            $(element).parent().addClass('error');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error');
        },
        submitHandler: function (form) {
            
            $(form).ajaxSubmit({ 
            success: function (response) {
                response = JSON.parse(response); 
                if (response.status === 'success') {
                toastr.success(response.message, 'Success', {"closeButton": true}); 
                } else {
                toastr.error(response.message, 'Error', {"closeButton": true});
                }
            
            },
            error: function (data) { 

            }
            });
        }
        });
    });

   
</script>