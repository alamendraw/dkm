  
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
    url = "<?php echo $url.'/laporan_rekap_jumat';?>";
    $( "#date" ).datepicker({
        dateFormat: "dd-mm-yy",
        altFormat: "yy-mm-dd",  
    });
    function print(type){
        month = $("#month").val(); 
        date = $("#date").val();
        if(month == ''){
            swal("Bulan dan Jum'at harus dipilih","","error");
        }else{
            param = '?month='+month+'&date='+date+'&type='+type;
            window.open(url+param,'_blank');
        }
    }
</script>
    
 