<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Tipo Cita</h3>
          </div>
          <div class="panel-body">

            <form class="row" action="store" method="POST" onsubmit="return validar(this);">

                <div class="form-group col-md-6">
                <label>Nombre</label>
                <input validate="texto" type="text" class="form-control" name="Nombre" maxlength="20" placeholder="Nombre">
                </div>

                <div class="form-group col-md-6">
                <label>Precio</label>
                <input validate="number" type="text" class="form-control" name="Precio" maxlength="5" placeholder="Precio">
                </div>

                <div class="form-group col-md-6">
                <label>Porcentaje</label>
                <input validate="number" type="text" class="form-control" name="Porcentaje" maxlength="5" placeholder="%">
                </div>


                <div class="form-group col-md-6">
                <label>Descripcion</label>
                <input validate="text" type="text" class="form-control" name="Descripcion" maxlength="50" placeholder="Descripcion">
                </div>


            <div class="col-md-12">
              <button type="submit" class="btn btn-primary ">Agregar</button>
            
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
     