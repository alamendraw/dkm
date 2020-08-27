  
<section id="basic-datatable">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                     
                    
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 

                    <div class="form-group">
                            <label>Pilih Bulan</label>
                            <div class="controls">
                                <select class="form-control" id="month">
                                    <option value=""></option>
                                    <option value="1">Januari</option>
                                    <option value="2">Febuari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Juma'at Ke</label>
                            <div class="controls">
                                <select class="form-control" id="jumat">
                                    <option value=""></option> 
                                </select>    
                            </div>
                            
                        </div>

                        <div class="form-group">
                        <span id="desc" style="font-weight: bold;color: seagreen;"></span>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Tandatangan</label>
                            <div class="controls">
                                <input type="text" name="date" id="date" class="form-control" placeholder="Tanggal Tandatangan"  required>
                            </div>
                        </div>

                        <div class="form-group" align="center">
                            <a href="javascript:void(0);" onClick="print(1);" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Cetak PDF"> <i class="feather icon-printer"></i> Cetak PDF</a>
                            <a href="javascript:void(0);" onClick="print(2);" class="btn btn-icon btn-outline-success btn-sm" data-toggle="tooltip" data-original-title="Cetak Excel"> <i class="feather icon-printer"></i> Cetak Excel</a>
                        </div>
                        
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
<script src="<?php echo base_url();?>assets/vendors/js/extensions/sweetalert2.all.min.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/extensions/sweetalert2.css">
<script type="text/javascript"> 
    url = "<?php echo $url.'/laporan_jumat/';?>";
    var pil_jum = [];

    $( "#date" ).datepicker({
        dateFormat: "dd-mm-yy",
        altFormat: "yy-mm-dd",  
    });

    $("#month").on('change', function(){
        month_val = this.value;
        html='';
        $.ajax({
            type:'get',
            url: "<?php echo $url.'/jumat_get';?>",
            data:({month:month_val}),
            dataType: 'json',
            success : function(data){
                for(i=0; i<data.length; i++){ 
                    indo_start = dateindo(data[i]['date_start']); 
                    indo_end = dateindo(data[i]['date_end']); 
                    judul = nomor(data[i]['no']);

                    pil_jum[i] = {
                        no: data[i]['no'],
                        start: indo_start,
                        end: indo_end,
                    };
                    html += "<option value='"+data[i]['no']+"' >Jum'at "+judul+"</option>";
                }
                $("#jumat").html(html);
            }

        });
    });

    $("#jumat").on('change', function(){
        console.log(this.value);
        for (i =0; i<pil_jum.length; i++) {            
            if(pil_jum[i].no == this.value){ 
                $("#desc").html(pil_jum[i].start+' Sampai '+pil_jum[i].end);
            }
        }
    });

    
    function dateindo(tgl){
        year = tgl.substr(0,4);
        month = tgl.substr(5,2);
        day = tgl.substr(8,2);
        result = '"'+day+' '+monthindo(month)+' '+year+'"';
        return String(result);
    }

    function monthindo(mth){
        switch (mth) {
            case '01':
                return "Januari";
                break;
            case '02':
                return "Februari";
                break;
            case '03':
                return "Maret";
                break;
            case '04':
                return "April";
                break;
            case '05':
                return "Mei";
                break;
            case '06':
                return "Juni";
                break;
            case '07':
                return "Juli";
                break;
            case '08':
                return "Agustus";
                break;
            case '09':
                return "September";
                break;
            case '10':
                return "Oktober";
                break;
            case '11':
                return "November";
                break;
        
            default:
                return "Desember";
                break;
        }
    }

    function nomor(nom){
        if(nom==1){
            return "Pertama";
        }else if(nom==2){
            return "Kedua";
        }else if(nom==3){
            return "Ketiga";
        }else if(nom==4){
            return "Keempat";
        }else if(nom==5){
            return "Kelima";
        }
    }
    function print(type){
        month = $("#month").val();
        jumat = $("#jumat").val();
        date = $("#date").val();
        if(month == '' || jumat == ''){
            swal("Bulan dan Jum'at harus dipilih","","error");
        }else{
            param = month+'/'+jumat+'?date='+date+'&type='+type;
            window.open(url+param,'_blank');
        }
    }
</script>
    
 