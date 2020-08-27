<form id="form" action="<?php echo site_url('content/update_profile'); ?>" method="post" enctype="multipart/form-data">
  <div class="row">

  <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
            <div class="form-row w-100">
                <div class="col-auto">
                <h5  ><?php echo $title; ?></h5>
                </div> 
            </div>
        </div>

        <div class="card-body">
            <div id="form-alert"><?php echo ($this->session->flashdata('message')) ? $this->session->flashdata('message') : ''; ?></div>   
                <div class="form-group">
                    <label>&nbsp;</label>
                    <input type="file" name="image" class="form-control dropify" data-height="150" data-default-file="<?php echo $list->image?>">
                </div> 
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $list->name?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $list->email?>">
                </div> 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $list->username?>">
                </div> 
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control">
                </div> 
              
        </div>
        <div class="card-footer" align="center">
          <button type="submit" class="btn btn-outline-primary">Simpan</button>
        </div>
      </div>
    </div>
     
    
  </div>

</form>
 
<script type="text/javascript"> 
  
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
      $('#loading').show();
      $(form).ajaxSubmit({
        success: function (response) {
          response = JSON.parse(response);
          if (response.status === 'success') {
            toastr.success(response.message, 'Success', {"closeButton": true}); 
          } else {
            toastr.error(response.message, 'Error', {"closeButton": true});
          }
          $('#loading').hide();
        },
        error: function (data) {
          $('#loading').hide();
        }
      });
    }
  });
});
 
</script>