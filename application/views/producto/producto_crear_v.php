<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Producto</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">
            <div class="form-group col-md-6">
              <label>Nombres</label>
              <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres">
            </div>
            <div class="form-group col-md-6">
              <label>Tipo de Producto</label>
              <select validate="seleccionar" class="form-control" id="Sexo" name="TipoProd">
                <option>--seleccionar--</option>
                <option>Medicamento</option>
                <option>Comida</option>
                <option>Accesorio</option>
                <option>Ropa</option>
             </select>
            </div>
            <div class="form-group col-md-6">
              <label>Precio</label>
              <input validate="number" type="text" class="form-control" name="Precio" placeholder="Precio">
            </div>
            <div class="form-group col-md-6">
              <label>Descripción</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>
            
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
     