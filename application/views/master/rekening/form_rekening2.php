<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo site_url('master/rekening/rekening2/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>
                                    
                                    <div class="form-group">
                                        <label>Rekening 1</label>
                                        <div class="controls">
                                            <select class="form-control" name="kd_rek1" required>
                                                <option value="<?php echo ($action=='update')?$data->kd_rek1:'';?>"><?php echo ($action=='update')?$val_rek:'';?></option>
                                                 
                                                <?php foreach($rek1 as $drop1){;?>
                                                <option value="<?php echo $drop1->id;?>"><?php echo $drop1->name;?></option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" placeholder="Nama Rekening" value="<?php echo ($action=='update')?$data->name:'';?>" required data-validation-required-message="Nama Rekening Harus Diisi">
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
 
  
<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript"> 
    var url = "<?php echo $url;?>";
     
    $("#back").on('click',function(){
        back();
    });

    function back(){
        window.location.replace(url);
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
                back();
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