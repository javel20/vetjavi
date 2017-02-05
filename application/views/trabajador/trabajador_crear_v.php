<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Trabajador</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">


            <div class="form-group col-md-6">
            <label>Tipo Trabajador</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="SelectTipo">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($tipos as $tipo){
                      
                      echo "<option value=" .$tipo->IdTipoTrab .">". $tipo->NombreTP ."</option>";
                    }?>
              </select>

            </div>
            

            <div class="form-group col-md-6">
              <label>Nombres</label>
              <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Paterno</label>
              <input validate="texto" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno"maxlength="20">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Materno</label>
              <input validate="texto" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno"maxlength="20">
            </div>
            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input validate="direccion" type="text" class="form-control" name="Direccion" placeholder="Dirección" maxlength="30">
            </div>
            <div class="form-group col-md-3">
              <label>Celular</label>
              <input validate="number" type="text" class="form-control" name="Telefono" placeholder="Celular" maxlength="9">
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
              <input validate="email" type="text" id="email" class="form-control" name="Email" placeholder="Email" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label>Password</label>
              <input validate="pass" type="PASSWORD" class="form-control" name="Password" placeholder="****" maxlength="15">
            </div>



            

            <div class="form-group col-md-6">
            <label>Local</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single" name="SelectLocal">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($local as $tipo){
                      
                      echo "<option value=" .$tipo->IdLocal .">". $tipo->NombreL ."</option>";
                    }?>
              </select>

            </div>

            <div class="form-group col-md-12">
             <label>Permisos</label>
                <select name="permisos[]" id="js-example-tags" class="js-example-tags form-control select2-hidden-accessible" multiple tabindex="-1" aria-hidden="true">
                    <?php foreach($permisos as $permiso)
                        echo "<option value=" .$permiso->IdPermisos .">". $permiso->NombreP ."</option>";
                    ?>
                </select>
            
            </div>


                <br><br>
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

<script >
$("#js-example-tags").select2({
  tags: true
})
</script>

            <script type="text/javascript">
              $(document).ready(function() {
              $("#js-example-basic-single2").select2();

              });

            </script>

            <script type="text/javascript">
              $(document).ready(function() {
              $("#js-example-basic-single").select2();

              });

            </script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     