<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Proveedor</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" onsubmit="return validar(this)" method="POST" >
            <div class="form-group col-md-6">
              <label>Nombre del distribuidor</label>
              <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Paterno</label>
              <input  validate="texto" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" maxlength="20">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Materno</label>
              <input  validate="texto" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" maxlength="20">
            </div>
            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input validate="direccion" type="text" class="form-control" name="Direccion" placeholder="Dirección" maxlength="30">
            </div>
            <div class="form-group col-md-3">
              <label>Celular</label>
              <input  validate="number" type="text" class="form-control" name="Celular" placeholder="Celular" maxlength="9">
            </div>

            <div class="form-group col-md-3">
              <label>Operador</label>
              <select validate="seleccionar" class="form-control" id="Operador" name="Operador">
                <option>--seleccionar--</option>
                <option >Rpm</option>
                <option>Movistar</option>
                <option>Rpc</option>
                <option>Claro</option>
                <option>Bitel</option>
                <option>Entel</option>
                <option>Virgin</option>
             </select>
            </div>


            <div class="form-group col-md-6">
              <label>Email</label>
              <input  validate="email" type="email" class="form-control" name="Email" placeholder="Email" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label>Nombre de la empresa</label>
              <input  validate="texto" type="text" class="form-control" name="Empresa" placeholder="Empresa" maxlength="25">
            </div>
            <div class="col-md-12">
              <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
              <input type="submit" class="btn btn-primary" value="Guardar">
            
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
     