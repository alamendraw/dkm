
<div class="row">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-primary p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-arrow-down-circle text-primary font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25">Pendapatan</h2>
                <table width="100%">
                    <tr>
                        <td width="40%"><b>Bulan Ini</b></td>
                        <td width="60%"><b>: <span style="float:right"><?php echo number_format($dash->debet);?></span></b></td>
                    </tr>
                    <tr>
                        <td><b>Bulan Lalu</b></td>
                        <td><b>: <span style="float:right"><?php echo number_format($dash->debet_lalu);?></span></b></td>
                    </tr>
                    <tr>
                        <td><b>Keseluruhan</b></td>
                        <td><b>: <span style="float:right"><?php echo number_format($dash->all_debet);?></span></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td> 
                    </tr>
                </table> 
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-warning p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-arrow-up-circle text-warning font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25">Pengeluaran</h2>
                <table width="100%">
                    <tr>
                        <td width="40%"><b>Bulan Ini</b></td>
                        <td width="60%"><b>: <span style="float:right"><?php echo number_format($dash->kredit);?></span></b></td>
                    </tr>
                    <tr>
                        <td><b>Bulan Lalu</b></td>
                        <td><b>: <span style="float:right"><?php echo number_format($dash->kredit_lalu);?></span></b></td>
                    </tr>
                    <tr>
                        <td><b>Keseluruhan</b></td>
                        <td><b>: <span style="float:right"><?php echo number_format($dash->all_kredit);?></span></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td> 
                    </tr>
                </table> 
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-success p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-dollar-sign text-success font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1 mb-25">Saldo</h2>
                <h2 class="text-bold-700 mt-1 mb-25">Rp. <?php echo number_format($dash->saldo);?></h2>
                <h3 class="text-bold-700 mt-1 mb-25">&nbsp;</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4 class="mb-0">Realisasi Pendapatan</h4>
                <!-- <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p> -->
            </div>
            <div class="card-content">
                <div class="card-body px-0 pb-0">
                    <div id="realisasi_pendapatan" class="mt-75"></div>
                    <div class="row text-center mx-0">
                        <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                            <p class="mb-50">Anggaran</p>
                            <p class="font-large text-bold-700">Rp. <?php echo number_format($dash->ang_in);?></p>
                        </div>
                        <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                            <p class="mb-50">Realisasi</p>
                            <p class="font-large text-bold-700">Rp. <?php echo number_format($dash->all_debet);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4 class="mb-0">Realisasi Pengeluaran</h4>
                <!-- <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p> -->
            </div>
            <div class="card-content">
                <div class="card-body px-0 pb-0">
                    <div id="realisasi_pengeluaran" class="mt-75"></div>
                    <div class="row text-center mx-0">
                        <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                            <p class="mb-50">Anggaran</p>
                            <p class="font-large text-bold-700">Rp. <?php echo number_format($dash->ang_out);?></p>
                        </div>
                        <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                            <p class="mb-50">Realisasi</p>
                            <p class="font-large text-bold-700">Rp. <?php echo number_format($dash->all_kredit);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
 
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/colors.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/components.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/dashboard-ecommerce.css"> 


<!-- <script src="<?php echo base_url();?>assets/vendors/js/vendors.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/scripts/components.js"></script>  -->

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="<?php echo base_url();?>assets/js/huda.js"></script>
<script type="text/javascript">
    var per_in = <?php echo number_format($dash->persen_debet);?>;
    var per_out = <?php echo number_format($dash->persen_kredit);?>;
    get_huda_chart(per_in,'realisasi_pendapatan');
    get_huda_chart(per_out,'realisasi_pengeluaran');
</script>
