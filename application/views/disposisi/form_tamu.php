<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo $url.'/save'?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>  

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="controls">
                                            <input type="text" name="name" id="name" class="form-control col-sm-6" placeholder="Nama" value="<?php echo ($action=='update')?$data->name:'';?>" >
                                        </div>
                                    </div>
                                 
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="controls">
                                            <textarea name="address" class="form-control" required><?php echo ($action=='update')?$data->address:'';?></textarea>
                                        </div>
                                    </div>                                  
                                </div>

                            </div>
                            <div align="center">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <button type="button" id="back" class="btn btn-outline-warning">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
</section> 


<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css"> 
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
  
<script type="text/javascript"> 
    var vurl = "<?php echo $url;?>";
  
    $("#back").on('click',function(){
        back();
    });
        

    function back(){
        window.location.replace(vurl);
    }

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
                location.reload();
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