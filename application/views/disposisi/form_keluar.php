
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/multiselect/google-code-prettify/prettify.css'); ?>"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/multiselect/style.css'); ?>"> 
<section class="simple-validation"> 
<form id="form" action="<?php echo $url.'/save'?>" method="post" enctype="multipart/form-data"  autocomplete="off">
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
                                    <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>  
                                    

                                    <div class="form-group">
                                        <label>Nomor Surat</label>
                                        <div class="input-group"> 
                                            <div class="input-group-prepend">  
                                                <input type="text" name="no_mail" id="no_mail" class="form-control col-sm-2" value="<?php echo ($action=='update')?$data->no_mail:'';?>" readonly >      
                                                <input type="text" class="form-control col-sm-1" id="no_type" value="<?php echo ($action=='update')?$data->type:'';?>" readonly> 
                                                <input type="text" class="form-control col-sm-2" id="no_code" value="<?php echo strtoupper($mosque->code);?>" readonly>
                                                <input type="text" class="form-control col-sm-1" id="no_month" value="<?php echo ($action=='update')?month_romawi(substr($data->date,5,2)):'';?>" readonly> 
                                                <input type="text" class="form-control col-sm-2" id="no_year" value="<?php echo ($action=='update')?substr($data->date,0,4):'';?>" readonly>      
                                            </div> 
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
                                            <select name="type" id="type" class="form-control">
                                                <option value="<?php echo ($action=='update')?$data->type:'';?>"><?php echo ($action=='update')?$type->name:'';?></option>
                                                <?php foreach($mail_type as $rType){;?>
                                                <option value="<?php echo $rType->no;?>"><?php echo $rType->name;?></option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <div class="controls">
                                            <select name="day" id="day" class="form-control">
                                                <option value="<?php echo ($action=='update')?$data->day:'';?>"><?php echo ($action=='update')?$data->day:'';?></option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Ahad">Ahad</option>
                                            </select>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <label>Jam</label>
                                        <div class="input-group"> 
                                            <div class="controls">     
                                                <div class="input-group-prepend">   
                                                    <input type="text" name="hour" maxlength="2" value="<?php echo ($action=='update')?substr($data->time,0,2):'';?>" class="form-control col-sm-2" data-validation-regex-regex="([^a-z]*[A-Z]*)*" data-validation-containsnumber-regex="([^0-9]*[0-9]+)+" data-validation-containsnumber-message="" min="00" max="24" required=""  aria-invalid="false">
                                                    
                                                    &nbsp;<span style="padding-top: 0.7rem;font-weight: bold;">:</span>&nbsp;
                                                    
                                                    <input type="text" name="minute" maxlength="2" value="<?php echo ($action=='update')?substr($data->time,3,2):'';?>" class="form-control col-sm-2" data-validation-regex-regex="([^a-z]*[A-Z]*)*" data-validation-containsnumber-regex="([^0-9]*[0-9]+)+" data-validation-containsnumber-message="" min="00" max="59" required=""  aria-invalid="false">
                                                    &nbsp; &nbsp; &nbsp; 
                                                    <input type="text" name="time_desc" value="<?php echo ($action=='update')?$data->time_desc:'';?>" class="form-control col-sm-7" placeholder="ex: Ba'da Sholat Isya">
                                                </div>  
                                            </div> 
                                        </div>  
                                    </div>
                                       
                                    <div class="form-group"> 
                                        <label>Lokasi</label>
                                        <div class="controls">
                                            <input type="text" name="location" id="location" class="form-control" placeholder="Lokasi" value="<?php echo ($action=='update')?$data->location:'';?>" required>
                                        </div>
                                    </div>                                         
                                </div> 
                            </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Batas -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Isi Surat</h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="form-group">
                            <label>Header 1</label>
                            <div class="controls">
                                <textarea name="header1" id="header1" class="form-control" required><?php echo ($action=='update')?$data->header1:'';?></textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label>Header 2</label>
                            <div class="controls">
                                <textarea name="header2" id="header2" class="form-control" required><?php echo ($action=='update')?$data->header2:'';?></textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label>Footer</label>
                            <div class="controls">
                                <textarea name="footer1" id="footer1" class="form-control" required><?php echo ($action=='update')?$data->footer1:'';?></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

<!-- Batas Tamu Undangan -->
        
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tamu Undangan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="row">

                            <div class="col-5">
                                <label><b>Daftar Tamu</b></label>
                                <div class="controls">
                                    <select name="from_guest[]" id="guest" class="form-control" size="10" multiple="multiple">
                                    <?php if($action == 'update'){ $available_guest = $guest_available; }else{ $available_guest = $guest; }
                                        foreach($available_guest->result() as $value){?>
                                        <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option> 
                                    <?php };?>
                                    </select>
                                </div>  
                            </div>  

                            <div class="col-1" style="padding-top: 20px;"> 
                                <button type="button" id="guest_rightSelected" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light" title="Don't Share Selected Vechile Data"><i class="feather icon-chevron-right"></i></button>
                            
                                <button type="button" id="guest_leftSelected" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light" title="Share Selected Vechile Data"><i class="feather icon-chevron-left"></i></button>

                                <button type="button" id="guest_rightAll" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-chevrons-right"></i></button>
                                <button type="button" id="guest_leftAll" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-chevrons-left"></i></button>
                        
                            </div>
    
                            <div class="col-5"> 
                                <label><b>Tamu Yang Diundang</b></label>
                                <select name="to_guest[]" id="guest_to" class="form-control" size="10" multiple="multiple">
                                <?php if($action == 'update' && $guest_selected!=''){ 
                                    foreach($guest_selected->result() as $value_guest){?>
                                    <option value="<?php echo $value_guest->id;?>"><?php echo $value_guest->name;?></option> 
                                <?php }};?>
                                
                                </select>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Batas Tombol-->
        <div class="col-12">
            <div class="card"><div class="card-content">
                    <div class="card-body"> 
                        <div align="center">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <button type="button" id="back" class="btn btn-outline-warning">Kembali</button>
                        </div>
                    
                    </div>
                </div>
            
            </div>
        </div> 
    </div>

 
        
    </form>
</section> 

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/multiselect/js/multiselect.min.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css"> 
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
  
<script type="text/javascript"> 
    var vurl = "<?php echo $url;?>";
    jQuery(document).ready(function($) { 
        $('#guest').multiselect({});
    });
 
    $( "#date" ).datepicker({
        dateFormat: "dd-mm-yy",
        altFormat: "yy-mm-dd",  
        inline:true,
        onSelect :  function(dateText, inst){
            var tol = new Date(dateText);
            var v_month = month_romawi(dateText.substring(3,5));
            var v_year = dateText.substring(6);
            $("#no_month").val(v_month);
            $("#no_year").val(v_year);
        }
    });
  
    $("#back").on('click',function(){
        back();
    });
        
    $("#type").on('change',function(){ 
        var noty = this.value;
        $("#no_type").val(noty);
        get_no(noty);
        $.ajax({
            type:'post',
            url:vurl+'/get_type/'+noty,
            dataType:'json',
            success : function(data){
                $("#header1").val(data.header1);
                $("#header2").val(data.header2);
                $("#footer1").val(data.footer1);
            }
        });
    });
  
    function get_no(noty){
        $.ajax({
            type:'post',
            url:vurl+'/get_last/'+noty,
            dataType:'json',
            success : function(data){
                $("#no_mail").val(data);
            }
        });
    }

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