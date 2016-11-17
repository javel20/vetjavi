<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Analisis</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST">



            <div class="form-group col-md-6">
            <label>Paciente</label><br>
              <select class="form-control" id="js-example-basic-single2" name="SelectPaciente">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($pacientes as $paciente){
                      
                      echo "<option value=" .$paciente->IdPaciente .">". $paciente->Nombre ."</option>";
                    }?>
              </select>

            </div>


            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input type="text" class="form-control" name="Codigo" placeholder="Codigo">
            </div>
            <div class="form-group col-md-6">
              <label>Tipo</label>
              <input type="text" class="form-control" name="Tipo" placeholder="Tipo">
            </div>
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
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


            <script type="text/javascript">
            $(document).ready(function() {
             $("#js-example-basic-single2").select2();

            });

            </script>

<?php  $this->load->view('layouts/footer.php');?>       
     