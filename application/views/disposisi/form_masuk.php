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
                                        <label>Nomor Surat</label>
                                        <div class="controls">
                                            <input type="text" name="no_mail" id="no_mail" class="form-control col-sm-6" placeholder="Nomor Surat" value="<?php echo ($action=='update')?$data->no_mail:'';?>" >
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="controls">
                                            <input type="text" name="date" id="date" class="form-control" placeholder="Tanggal Surat" value="<?php echo ($action=='update')?date_simple($data->date):'';?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Janis Surat</label>
                                        <div class="controls">
                                            <input type="text" name="type" id="type" class="form-control" placeholder="ex : Undangan / Himbauan / Pemberitahuan" value="<?php echo ($action=='update')?$data->type:'';?>" required>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="controls">
                                            <textarea name="address" class="form-control" required><?php echo ($action=='update')?$data->address:'';?></textarea>
                                        </div>
                                    </div>      
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <div class="controls">
                                            <textarea name="description" class="form-control" required><?php echo ($action=='update')?$data->description:'';?></textarea>
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

        <!-- Batas -->
        <!-- <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Preview pengeluaran</h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <table border='0' width="100%">
                            <tr>
                                <td width="20%">Anggaran</td>
                                <td width="80%">: <span id="pre_rek1"></span></td>
                            </tr>          
                            <tr>
                                <td>Rekening</td>
                                <td>: </span></td>
                            </tr> 
                            <tr>
                                <td>Rincian</td>
                                <td>: <span id="pre_name"></span></td>
                            </tr> 
                                <td>&nbsp;</td>
                            </tr> 
                                                                                
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section> 


<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css"> 
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
  
<script type="text/javascript"> 
    var vurl = "<?php echo $url;?>";
 
    $( "#date" ).datepicker({
        dateFormat: "dd-mm-yy",
        altFormat: "yy-mm-dd",  
    });
  
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