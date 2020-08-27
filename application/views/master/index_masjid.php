<form id="form" action="<?php echo site_url('master/masjid/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                            <div class="row">
                                <div class="col-sm-12"> 
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $data->id;?>" >
                                   
                                    <div class="form-group">
                                        <div class="controls"> 
                                            <label>Nama Masjid *</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nama Masjid" value="<?php echo $data->name;?>" required data-validation-required-message="Nama Masjid Harus Diisi">
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <div class="controls"> 
                                            <label>Ketua DKM *</label>
                                            <input type="text" name="ketua_dkm" class="form-control" placeholder="Ketua DKM" value="<?php echo $data->ketua_dkm;?>" required data-validation-required-message="Ketua DKM Harus Diisi">
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <div class="controls"> 
                                            <label>Sekertaris *</label>
                                            <input type="text" name="sekertaris" class="form-control" placeholder="Sekertaris" value="<?php echo $data->sekertaris;?>" required data-validation-required-message="Sekertaris Harus Diisi">
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <div class="controls"> 
                                            <label>Bendahara *</label>
                                            <input type="text" name="bendahara" class="form-control" placeholder="Bendahara" value="<?php echo $data->bendahara;?>" required data-validation-required-message="Bendahara Harus Diisi">
                                        </div>
                                    </div>
                                    
                                    
                                <div class="form-group">
                                    <div class="controls"> 
                                        <label>Telepon</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Telepon" value="<?php echo $data->phone;?>">
                                    </div>
                                </div> 
                                      
                                </div>
                                 
                            </div>
                             
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">  
                        <div class="row">
                            <div class="col-sm-12">
 
                            <div class="form-group">
                                <div class="controls"> 
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="address"><?php echo $data->address;?></textarea>
                                </div>
                            </div>
                            
                                <div class="form-group">
                                    <div class="controls"> 
                                        <label>Fax</label>
                                        <input type="text" name="fax" class="form-control" placeholder="Fax" value="<?php echo $data->fax;?>">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div class="controls"> 
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data->email;?>">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div class="controls"> 
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $data->website;?>">
                                    </div>
                                </div> 

                            </div>                                 
                        </div>                             
                    </div>
                </div>
            </div>
        </div>
 
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body" align="center"> 
                        <button type="submit" class="btn btn-outline-primary">Simpan</button> 
                    </div>
                </div>
            </div>
        </div>


    </div>
</section> 
</form>

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