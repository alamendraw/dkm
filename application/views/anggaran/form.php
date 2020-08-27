<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo site_url('anggaran/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>
                                    <input type="hidden" name="kd_rek1" class="form-control" value="<?php echo $rek1;?>" >
                                    <div class="form-group">
                                        <label>Rekening 2</label>
                                        <div class="controls">
                                            <select class="form-control" name="kd_rek2" id="kd_rek2" required>
                                                <option value="<?php echo ($action=='update')?$data->kd_rek2:'';?>"><?php echo ($action=='update')?$val_rek2->name:'';?></option>
                                                 
                                                <?php foreach($rek2 as $drop2){;?>
                                                <option value="<?php echo $drop2->kd_rek2;?>"><?php echo $drop2->name;?></option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Rekening 3</label>
                                        <div class="controls">
                                            <select class="form-control" name="kd_rek3" id="kd_rek3" required>
                                            <option value="<?php echo ($action=='update')?$data->kd_rek:'';?>"><?php echo ($action=='update')?$val_rek3->name:'';?></option>
                                                  
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Anggaran</label>
                                        <div class="controls">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Anggaran" value="<?php echo ($action=='update')?$data->name:'';?>" required data-validation-required-message="Nama Anggaran Harus Diisi">
                                        </div>
                                    </div>
                                     
                                    <div class="form-group">
                                        <label>Nilai Satuan</label>
                                        <div class="controls">
                                            <input type="text" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="cost" class="form-control" id="cost" placeholder="Nilai Satuan" value="<?php echo ($action=='update')?$data->cost:'';?>" required data-validation-required-message="Nilai Satuan Harus Diisi">
                                        </div>
                                    </div>
                                     
                                </div>
                                
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <div class="controls">
                                            <input type="text" name="qty1" id="qty1" class="form-control" placeholder="Jumlah" value="<?php echo ($action=='update')?$data->qty1:'';?>" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <div class="controls">                                        
                                            <select class="form-control" name="unit1" id="unit1" required>
                                                <option value="<?php echo ($action=='update')?$data->unit1:'';?>"><?php echo ($action=='update')?$data->unit1:'';?></option>
                                                
                                                <?php foreach($unit as $dr_unt1){;?>
                                                <option value="<?php echo $dr_unt1->name;?>"><?php echo $dr_unt1->name;?></option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>                                
                                </div>
                                 
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <div class="controls">
                                            <input type="text" name="qty2" id="qty2" class="form-control" placeholder="Jumlah" value="<?php echo ($action=='update')?$data->qty2:'';?>" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <div class="controls">
                                            <select class="form-control" name="unit2" id="unit2" >
                                                <option value="<?php echo ($action=='update')?$data->unit2:'';?>"><?php echo ($action=='update')?$data->unit2:'';?></option>
                                                
                                                <?php foreach($unit as $dr_unt2){;?>
                                                <option value="<?php echo $dr_unt2->name;?>"><?php echo $dr_unt2->name;?></option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>                                
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <div class="controls">
                                            <textarea name="description" class="form-control"><?php echo ($action=='update')?$data->description:'';?></textarea>
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
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Preview</h4>
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
                                <td>: <span id="pre_rek2"><?php echo ($action=='update')?$val_rek2->name:'';?></span><span id="pre_rek3"><?php echo ($action=='update')?' - '.$val_rek3->name:'';?></span></td>
                            </tr> 
                            <tr>
                                <td>Rincian</td>
                                <td>: <span id="pre_name"><?php echo ($action=='update')?$data->name:'';?></span></td>
                            </tr> 
                                <td>&nbsp;</td>
                            </tr> 
                            <tr>
                                <table width="100%" border="0">
                                    <tr>
                                        <td style="border-bottom:solid 1px #626262;" width="27%"><b>Nilai</b></td>
                                        <td style="border-bottom:solid 1px #626262;" width="43%"><b>Jumlah / Satuan</b></td>
                                        <td style="border-bottom:solid 1px #626262;" width="30%"><b>Total</b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span id="pre_cost"><?php echo ($action=='update')?$data->cost:'';?></span>
                                        </td>
                                        <td>
                                            <span id="pre_qty1"><?php echo ($action=='update')?$data->qty1:'';?></span>
                                            <span id="pre_unit1"><?php echo ($action=='update')?$data->unit1:'';?></span>
                                            <span id="pre_qty2"><?php echo ($action=='update')?' / '.$data->qty2:'';?></span>
                                            <span id="pre_unit2"><?php echo ($action=='update')?$data->unit2:'';?></span>
                                        </td>
                                        <td><span id="total"><?php echo ($action=='update')?number_format($data->total):'';?></span></td>
                                    </tr>
                                </table>
                            </tr>                                                    
                        </table>
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
    var vurl = "<?php echo $url;?>";
    var vrek1 = "<?php echo $rek1?>"; 
    if(vrek1==1){
        $("#pre_rek1").html('Pendapatan');
    }else{
        $("#pre_rek1").html('Biaya');
    }
     
    $("#back").on('click',function(){
        back();
    });
     
    $("#name").on('keyup',function(){
        $("#pre_name").html(this.value);
    });
     
     $("#cost").on('keyup',function(){ 
         $("#pre_cost").html(this.value);
         hitung();
     });
     
     $("#unit1").on('change',function(){   
        $("#pre_unit1").html(' '+this.value+' ');
         hitung();
     });
     $("#qty1").on('keyup',function(){   
        $("#pre_qty1").html(this.value);
         hitung();
     });
     
     $("#qty2").on('keyup',function(){           
        $("#pre_qty2").html(' / '+this.value);
         hitung();
     });
     
     $("#unit2").on('change',function(){   
        $("#pre_unit2").html(' '+this.value);
         hitung();
     });
     
    $("#kd_rek2").on("change", function(){
        r2 = this.value;
        drop_rek3(r2);
    });

    $("#kd_rek3").on("change", function(){
        r3 = this.value;
        $.ajax({
            type : 'post',
            url:vurl+'/field3/'+r3,
            dataType:'json',
            success : function(data){ 
                $("#pre_rek3").html(' - '+data['field'].name); 
            }
        });
    });

    function drop_rek3(r2){
        $.ajax({
            type : 'post',
            url:vurl+'/dropr3/'+vrek1+'/'+r2,
            dataType:'json',
            success : function(data){ 
                $("#pre_rek2").html(data['field'].name);
                var i;
                var html_drop3='<option value=""></option>';
                for(i=0; i<data['dropdown'].length; i++){ 
                    html_drop3 += '<option value="'+data['dropdown'][i].id+'">'+data['dropdown'][i].name+'</option>';
                }
                $("#kd_rek3").html(html_drop3);
            }
        });
    }

    function hitung(){
        var v_c1 = $("#cost").val().replace(',','');
        if($("#qty1").val()!=''){
            v_qty1 = $("#qty1").val();
        }else{
            v_qty1 = 1;
        };
        if($("#qty2").val()!=''){
            v_qty2 = $("#qty2").val();
        }else{
            v_qty2 = 1;
        };
        v_c2 =  v_c1.replace(',','');
        v_cost =  v_c2.replace(',','');
        v_total = v_cost*v_qty1*v_qty2; 
        $("#total").html(v_total.toLocaleString()); 
        // $("#total").html(numberFormat(v_cost*v_qty1*v_qty2)); 
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