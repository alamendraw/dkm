<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo site_url('keuangan/pengeluaran/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="action" class="form-control" value="<?php echo $action;?>" >
                                    <?php if($action=='update'){;?>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo ($action=='update')?$data->id:'';?>" >
                                    <?php };?>  

                                    <div class="form-group">
                                        <label>Nomor Kas</label>
                                        <div class="controls">
                                            <input type="text" name="no_kas" id="no_kas" class="form-control col-sm-3" placeholder="Nomor Kas" value="<?php echo ($action=='update')?$data->no_kas:$no_kas;?>" readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="controls">
                                            <input type="text" name="date" id="date" class="form-control" placeholder="Tanggal Kas" value="<?php echo ($action=='update')?date_simple($data->date):'';?>" required>
                                        </div>
                                    </div>
<!--                                      
                                    <div class="form-group">
                                        <label>Rekening</label>
                                        <div class="controls">
                                            <select class="form-control" name="kd_rek" id="kd_rek" required>
                                                <option value="<?php echo ($action=='update')?$data->kd_rek:'';?>"><?php echo ($action=='update')?$val_rek->name:'';?></option>
                                            <?php foreach($drop_rek as $dr_rek){;?>
                                                <option value="<?php echo $dr_rek->id;?>"><?php echo $dr_rek->name;?></option>
                                            <?php };?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Anggaran</label>
                                        <div class="controls">
                                            <select class="form-control" name="id_budget" id="id_budget" required>
                                                <option value="<?php echo ($action=='update')?$data->id_budget:'';?>"><?php echo ($action=='update')?$val_ang->name:'';?></option>
                                            
                                            </select>
                                        </div>
                                    </div> -->
                                     
                                    <div class="form-group">
                                        <label>Nilai pengeluaran</label>
                                        <div class="controls">
                                            <input type="text" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="cost" class="form-control" id="cost" placeholder="Nilai Pengeluaran" value="<?php echo ($action=='update')?$data->kredit:'';?>" required data-validation-required-message="Nilai Pengeluaran Harus Diisi">
                                        </div>
                                    </div>
                                     
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <div class="controls">
                                            <textarea name="description" class="form-control" ><?php echo ($action=='update')?$data->description:'';?></textarea>
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
     
    $("#kd_rek").on("change", function(){
        rek = this.value;
        drop_budget(rek);
    });

    function drop_budget(rek){
        $.ajax({
            type : 'post',
            url:vurl+'/drop_budget/'+rek,
            dataType:'json',
            success : function(data){  
                var i;
                var html_drop3='<option value=""></option>';
                for(i=0; i<data['dropdown'].length; i++){ 
                    html_drop3 += '<option value="'+data['dropdown'][i].id+'">'+data['dropdown'][i].name+'</option>';
                }
                $("#id_budget").html(html_drop3);
            }
        });
    }

    // function hitung(){
    //     var v_c1 = $("#cost").val().replace(',','');
    //     if($("#qty1").val()!=''){
    //         v_qty1 = $("#qty1").val();
    //     }else{
    //         v_qty1 = 1;
    //     };
    //     if($("#qty2").val()!=''){
    //         v_qty2 = $("#qty2").val();
    //     }else{
    //         v_qty2 = 1;
    //     };
    //     v_c2 =  v_c1.replace(',','');
    //     v_cost =  v_c2.replace(',','');
    //     v_total = v_cost*v_qty1*v_qty2; 
    //     $("#total").html(v_total.toLocaleString()); 
    //     // $("#total").html(numberFormat(v_cost*v_qty1*v_qty2)); 
    // }

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