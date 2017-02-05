<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Local</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">
            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input validate="texto" type="text" class="form-control" name="Nombre" maxlength="30" placeholder="Nombres">
            </div>

            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input validate="direccion" type="text" class="form-control" name="Direccion" maxlength="30" placeholder="Dirección">
            </div>
            <div class="form-group col-md-6">
              <label>Telefono</label>
              <input validate="number" type="text" class="form-control" name="Telefono" maxlength="9" placeholder="Telefono">
            </div>
            <!--<div class="form-group col-md-6">
              <label>Estado</label>
              <input type="text" class="form-control" name="Estado" placeholder="Estado">
            </div>-->
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary ">Guardar</button>
            
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>
</div>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     