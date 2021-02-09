<section class="simple-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <h6>Rekening <span style="float:right;">:</span></h6>
                                </div>
                                <div class="col-md-9" style="float:left;">
                                    <h6><?= $arry_rek->name;?></h6>
                                </div> 
                                <div class="col-md-3">
                                    <h6>Nilai Anggaran <span style="float:right;">:</span></h6>
                                </div>
                                <div class="col-md-9" style="float:left;">
                                    <h6>Rp. <span id="nil_anggaran"></span></h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Nilai Anggaran Kas<span style="float:right;">:</span></h6>
                                </div>
                                <div class="col-md-9" style="float:left;">
                                    <h6>Rp. <span id="nil_angkas"></span></h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Sisa Anggaran<span style="float:right;">:</span></h6>
                                </div>
                                <div class="col-md-5" style="float:left;">
                                    <h6>Rp. <span id="nil_sisa"></span></h6>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" style="float:right;" class="btn bg-gradient-warning mr-1 mb-1 waves-effect waves-light" onClick="reset()">Atur Ulang</button>
                                    <button type="button" style="float:right;" class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light" onClick="bagi_rata()">Bagi Rata</button>
                                </div>
                                
                            </div>
                        </div>
                        <form id="form" action="<?php echo site_url('anggaran/saveRak')?>" method="post" enctype="multipart/form-data"  autocomplete="off">
                            <div class="row">
                                <input type="hidden" name="sisa" id="sisa" class="form-control" value="0" >
                                <input type="hidden" name="total" id="total" class="form-control" value="0" >
                                <input type="hidden" name="rekening" id="rekening" class="form-control" value="<?= $rekening;?>" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Januari</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="januari" class="form-control" value="<?= (!empty($data->januari))?$data->januari:0;?>" id="januari"  >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">Februari</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="februari" class="form-control" value="<?= (!empty($data->februari))?$data->februari:0;?>" id="februari"  >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">Maret</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="maret" class="form-control" value="<?= (!empty($data->maret))?$data->maret:0;?>" id="maret"  >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">April</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="april" class="form-control" value="<?= (!empty($data->april))?$data->april:0;?>" id="april" >
                                    </div>

                                    <div class="form-group">
                                        <label for="first-name-vertical">Mei</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="mei" class="form-control" value="<?= (!empty($data->mei))?$data->mei:0;?>" id="mei" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">Juni</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="juni" class="form-control" value="<?= (!empty($data->juni))?$data->juni:0;?>" id="juni" >
                                    </div>
                                </div>

                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="first-name-vertical">Juli</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="juli" class="form-control" value="<?= (!empty($data->juli))?$data->juli:0;?>" id="juli" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">Agustus</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="agustus" class="form-control" value="<?= (!empty($data->agustus))?$data->agustus:0;?>" id="agustus" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">September</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="september" class="form-control" value="<?= (!empty($data->september))?$data->september:0;?>" id="september" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">Oktober</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="oktober" class="form-control" value="<?= (!empty($data->oktober))?$data->oktober:0;?>" id="oktober" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">November</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="november" class="form-control" value="<?= (!empty($data->november))?$data->november:0;?>" id="november" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="first-name-vertical">Desember</label>
                                        <input type="text" onKeyup="hitung()" data-inputmask="'alias': 'decimal', 'groupSeparator': ','"  name="desember" class="form-control" value="<?= (!empty($data->desember))?$data->desember:0;?>" id="desember" >
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
 
    </div>
</section> 

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>
  
<script type="text/javascript"> 
    var vurl = "<?php echo $url;?>"; 
    var nil_ang = "<?= (!empty($budget->total))?number_format($budget->total):0;?>";
    nil_kas = "<?= (!empty($data->total))?number_format($data->total):0;?>";
    sisa = 0;

     $(document).ready(function(){
        $("#nil_anggaran").html(nil_ang);
        $("#nil_angkas").html(nil_kas);
     });
     
    $("#back").on('click',function(){
        back();
    });
    
    function hitung(){
        v_januari = parseInt($("#januari").val().replace(',','').replace(',','').replace(',','')); 
        v_februari = parseInt($("#februari").val().replace(',','').replace(',','').replace(',',''));
        v_maret = parseInt($("#maret").val().replace(',','').replace(',','').replace(',',''));
        v_april = parseInt($("#april").val().replace(',','').replace(',','').replace(',',''));
        v_mei = parseInt($("#mei").val().replace(',','').replace(',','').replace(',',''));
        v_juni = parseInt($("#juni").val().replace(',','').replace(',','').replace(',',''));
        v_juli = parseInt($("#juli").val().replace(',','').replace(',','').replace(',',''));
        v_agustus = parseInt($("#agustus").val().replace(',','').replace(',','').replace(',',''));
        v_september = parseInt($("#september").val().replace(',','').replace(',','').replace(',',''));
        v_oktober = parseInt($("#oktober").val().replace(',','').replace(',','').replace(',',''));
        v_november = parseInt($("#november").val().replace(',','').replace(',','').replace(',',''));
        v_desember = parseInt($("#desember").val().replace(',','').replace(',','').replace(',',''));
        v_total = v_januari+v_februari+v_maret+v_april+v_mei+v_juni+v_juli+v_agustus+v_september+v_oktober+v_november+v_desember;

        sisa = nil_ang.replace(',','').replace(',','').replace(',','') - v_total;
        $("#nil_angkas").html(formatNumber(v_total));
        $("#nil_sisa").html(formatNumber(sisa));        
        $("#sisa").val(sisa);        
        $("#total").val(v_total);        
    }

    function bagi_rata(){
        v_rata = nil_ang.replace(',','').replace(',','').replace(',','')/12;
        $("#januari").val(v_rata);
        $("#februari").val(v_rata);
        $("#maret").val(v_rata);
        $("#april").val(v_rata);
        $("#mei").val(v_rata);
        $("#juni").val(v_rata);
        $("#juli").val(v_rata);
        $("#agustus").val(v_rata);
        $("#september").val(v_rata);
        $("#oktober").val(v_rata);
        $("#november").val(v_rata);
        $("#desember").val(v_rata);
        hitung();
    }

    function reset(){ 
        $("#januari").val(0);
        $("#februari").val(0);
        $("#maret").val(0);
        $("#april").val(0);
        $("#mei").val(0);
        $("#juni").val(0);
        $("#juli").val(0);
        $("#agustus").val(0);
        $("#september").val(0);
        $("#oktober").val(0);
        $("#november").val(0);
        $("#desember").val(0);
        hitung();
    }

    function formatNumber(nStr){
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function back(){
        window.location.replace(vurl+'/anggaran_kas');
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