<?php  $this->load->view('layouts/header');?>


<form action="<?php echo base_url(); ?>signin" method="POST" class="form-horizontal col-md-12" onsubmit="return validar(this);">
<div class="col-md-4 col-md-offset-4 well">

  <div class="form-group">
    <label validate="email" for="email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="correo" class="form-control" id="email" placeholder="Email">
    </div>

  </div>
  <div class="form-group">
    <label validate="" for="inputPassword3" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Ingresar</button>
    </div>
  </div>
  </div>
</form>


<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>      