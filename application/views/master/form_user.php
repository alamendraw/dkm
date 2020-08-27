<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo site_url('master/user/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>
                                    
                                    <div class="form-group">
                                        <div class="controls"> 
                                            <label>Nama User *</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nama User" value="<?php echo ($action=='update')?$data->name:'';?>" required data-validation-required-message="Nama User Harus Diisi">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo ($action=='update')?$data->email:'';?>"  >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Hak Akses *</label>
                                            <select name="group_id" id="group_id" class="form-control" placeholder="Hak Akses" required data-validation-required-message="Hak Akses Harus Diisi">
                                                <option value="<?php echo ($action=='update')?$data->group_id:'';?>"><?php echo ($action=='update')?$val_group->name:'';?></option> 
                                                <?php foreach($drop_group as $drop){;?>
                                                <option value="<?php echo $drop->id;?>"><?php echo $drop->name;?></option>
                                                <?php };?> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Username *</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo ($action=='update')?$data->username:'';?>" required data-validation-required-message="Nama User Harus Diisi">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Password * <?php echo ($action=='update')?'<i>(Kosongkan Jika Tidak Mengubah Password)</i>':'';?></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="" <?php echo ($action=='create')?'required':'';?>>
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


<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>

<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/js/scripts/extensions/toastr.min.js'); ?>"></script>

<script type="text/javascript"> 
    var url = "<?php echo $url;?>";
  
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