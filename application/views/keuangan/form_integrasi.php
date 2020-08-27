<section class="simple-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <form id="form" action="<?php echo site_url('keuangan/integrasi/save')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                             
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $data->id?>" >
                                      
                                     <div class="form-group">
                                        <label>Rekening</label>
                                        <div class="controls">
                                            <select class="form-control" name="kd_rek" id="kd_rek" required>
                                                <option value=""></option>
                                            <?php foreach($drop_rek as $dr_rek){;?>
                                                <option value="<?php echo $dr_rek->kd_rek2;?>"><?php echo $dr_rek->name;?></option>
                                            <?php };?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Anggaran</label>
                                        <div class="controls">
                                            <select class="form-control" name="id_budget" id="id_budget" required>
                                                <option value=""></option>
                                            
                                            </select>
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
                    <h4 class="card-title">Data Transaksi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <table border='0' width="100%">       
                            <tr>
                                <td width="20%"></td>
                                <td width="80%"> </td>
                            </tr>          
                            <tr>
                                <td>No Kas</td>
                                <td>: <?php echo $data->no_kas;?></td>
                            </tr>     
                            <tr>
                                <td>Tanggal</td>
                                <td>: <?php echo date_indo($data->date);?></td>
                            </tr>  
                            <tr>
                                <td>Nilai</td>
                                <td>: Rp.<?php echo ($data->debet!=0)?number_format($data->debet):number_format($data->kredit);?></td>
                            </tr>  
                            <tr>
                                <td>Keterangan</td>
                                <td>: <?php echo $data->description;?></td>
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

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css"> 
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
  
<script type="text/javascript"> 
    var vurl = "<?php echo $url;?>";
    var vrek1 = "<?php echo $rek1;?>";
  
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
            url:vurl+'/drop_budget?rek1='+vrek1+'&rek2='+rek,
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