<?php  $this->load->view('layouts/header-login');?>


<form action="<?php echo base_url(); ?>index.php/login/acceso" method="POST" class="form-horizontal col-md-12" onsubmit="return validar(this);">


  <br><br>
  <p class="titulologin">Inicie Sesión</p>

<div class="col-md-6 col-sm-7 col-xs-9 col-md-offset-3 col-sm-offset-2 col-xs-offset-1 well login">

  <div class="form-group">
    <label validate="email" for="email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-7">
      <input type="email" name="correo" class="loginlabel" id="email" placeholder="Email" value=<?php echo $this->session->flashdata('email');?>>
    </div>

  </div>
  <div class="form-group">
    <label validate="" for="inputPassword3" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-7">
      <input type="password" name="pass" class="loginlabel" id="inputPassword3" placeholder="Password">
    </div>
  </div>

  <div>

    <span><center><?php echo $this->session->flashdata('error');?></center></span>
    
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
    
      <button type="submit" class="btn btn-default botoningresar" >Ingresar</button>
    </div>
  </div>

  </div>
</form>


                   <?php
                        // echo var_dump($_SESSION);
                    ?>


<script src="<?php echo base_url('public/main.js'); ?>"></script>
