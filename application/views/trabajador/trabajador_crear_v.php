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
            <form class="row" action="store" method="POST">


            <div class="form-group col-md-6">
            <label>Tipo Trabajador</label><br>
              <select class="form-control" id="js-example-basic-single2" name="SelectTipo">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($tipos as $tipo){
                      
                      echo "<option value=" .$tipo->IdTipoTrab .">". $tipo->Nombre ."</option>";
                    }?>
              </select>

            </div>
            

            <div class="form-group col-md-6">
              <label>Nombres</label>
              <input type="text" class="form-control" name="Nombre" placeholder="Nombres">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Paterno</label>
              <input type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Materno</label>
              <input type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno">
            </div>
            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input type="text" class="form-control" name="Direccion" placeholder="Dirección">
            </div>
            <div class="form-group col-md-6">
              <label>Telefono</label>
              <input type="text" class="form-control" name="Telefono" placeholder="Telefono">
            </div>



            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="text" class="form-control" name="Email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label>Password</label>
              <input type="PASSWORD" class="form-control" name="Password" placeholder="****">
            </div>



            

            <div class="form-group col-md-6">
            <label>Local</label>
              <select class="form-control" id="js-example-basic-single" name="SelectLocal">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($local as $tipo){
                      
                      echo "<option value=" .$tipo->IdLocal .">". $tipo->Nombre ."</option>";
                    }?>
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

<?php  $this->load->view('layouts/footer.php');?>       
     