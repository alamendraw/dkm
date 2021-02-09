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
                                
                                <input type="hidden" name="total" id="total" class="form-control" value="" >
                                <input type="hidden" name="rekening" id="rekening" class="form-control" value="<?= $rekening;?>" >
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah <span style="color:red;">*</span> </label>
                                        <div class="controls">
                                            <input type="text" name="qty1" id="qty1" value="<?= (!empty($data->qty1))?$data->qty1:'';?>" class="form-control" placeholder="Jumlah">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Satuan <span style="color:red;">*</span></label>
                                        <div class="controls">                                        
                                            <select class="form-control" name="unit1" id="unit1" value="<?= (!empty($data->unit1))?$data->unit1:'';?>" required>
                                                <option value="<?= (!empty($data->unit1))?$data->unit1:'';?>"><?= (!empty($data->unit1))?$data->unit1:'';?></option>
                                                
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
                                            <input type="text" name="qty2" id="qty2" value="<?= (!empty($data->qty2))?$data->qty2:'';?>" class="form-control" placeholder="Jumlah">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <div class="controls">
                                            <select class="form-control" name="unit2" id="unit2" value="<?= (!empty($data->unit2))?$data->unit2:'';?>" >
                                                <option value="<?= (!empty($data->unit2))?$data->unit2:'';?>"><?= (!empty($data->unit2))?$data->unit2:'';?></option>
                                                
                                                <?php foreach($unit as $dr_unt2){;?>
                                                <option value="<?php echo $dr_unt2->name;?>"><?php echo $dr_unt2->name;?></option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>                                
                                </div>

                                <div class="col-sm-12"> 
                                    <div class="form-group">
                                        <label>Nilai Satuan <span style="color:red;">*</span></label>
                                        <div class="controls">
                                            <input type="text" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="cost" class="form-control" id="cost" value="<?= (!empty($data->cost))?$data->cost:'';?>" placeholder="Nilai Satuan" required data-validation-required-message="Nilai Satuan Harus Diisi">
                                        </div>
                                    </div>
                                     
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <div class="controls">
                                            <textarea name="description" class="form-control"><?= (!empty($data->description))?$data->description:'';?></textarea>
                                        </div>
                                    </div>                                     
                                </div>
                                <div class="col-sm-12"> 
                                        <p style="font-size:12px;">Note : Tanda (<span style="color:red;">*</span>) Harus Diisi.</p>                                
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
                        <div>
                            <?= $det_rek;?>
                        </div>
                    <br>
                        <table width="100%" border="0">
                            <tr>
                                <td style="border-bottom:solid 1px #626262;" width="27%"><b>Nilai</b></td>
                                <td style="border-bottom:solid 1px #626262;" width="43%"><b>Jumlah / Satuan</b></td>
                                <td style="border-bottom:solid 1px #626262;" width="30%"><b>Total</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <span id="pre_cost"></span>
                                </td>
                                <td>
                                    <span id="pre_qty1"></span>
                                    <span id="pre_unit1"></span>
                                    <span id="pre_qty2"> </span>
                                    <span id="pre_unit2"></span>
                                </td>
                                <td><span id="pre_total"> </span></td>
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
     $(document).ready(function(){
        $("#pre_cost").html("<?= (!empty($data->cost))? number_format($data->cost):0;?>");
        $("#pre_qty1").html(<?= (!empty($data->qty1))?$data->qty1:'';?>);
        $("#pre_unit1").html(' '+"<?= (!empty($data->unit1))?' '.$data->unit1:'';?>"+' ');
        $("#pre_qty2").html("<?= (!empty($data->qty2))?' / '.$data->qty2:'';?>");
        $("#pre_unit2").html("<?= (!empty($data->unit2))?' '.$data->unit2:'';?>");
        hitung();
     });
     
    $("#back").on('click',function(){
        back();
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
         
        $("#pre_total").html(v_total.toLocaleString()); 
        $("#total").val(v_total.toLocaleString());  
    }

    function back(){
        window.location.replace(vurl+'/rapb');
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