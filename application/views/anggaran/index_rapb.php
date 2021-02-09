  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/toastr.css">
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4> 
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard"> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="ListTable" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="11%">Rekening</th> 
                                        <th width="43%">Nama</th> 
                                        <th width="15%">Nilai</th>    
                                        <th width="5%">Action</th> 
                                    </tr>
                                </thead>

                                <tbody id="list_data">  
                                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<script src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>

<script type="text/javascript"> 
      
    $(document).ready(function(){
           
        tableList = $('#ListTable').DataTable({
            'processing': true,
            'serverSide': true, 
            'serverMethod': 'post', 
            'ajax': {
                'url':'<?= $url;?>/getListData',
                'data' : {tahun:''}
            },
            'columns': [
                { data: 'nom' },
                { data: 'kode' },
                { data: 'nm_rek' },
                { data: 'nilai' },
                { data: 'action' },
            ],
            'columnDefs': [ // Properties
                {
                    "targets": [0,4], 
                    "className": "text-center", 
                },
                {
                    "targets": 3,
                    "className": "text-right",
                }
            ],
        });
         

    });


</script>