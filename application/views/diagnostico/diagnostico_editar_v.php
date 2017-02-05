<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Editar Diagnostico</h3>
          </div>
          <div class="panel-body">
            <form class="row mrb-30 well"
              action="<?php echo base_url('index.php/diagnostico/update/'.$dato_diagnosticos[0]->IdDiagnostico); ?>" 
              method="POST" onsubmit="return validar(this);">



            <div class="form-group col-md-6">
            <label>Cita</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="SelectCita" >
                  <option>--seleccionar--</option>
                <?php
                     


                             foreach($citas as $cita){
                      $faiId=($cita->IdCita==$dato_diagnosticos[0]->IdCita)? "selected":"";
                      echo "<option value=". $cita->IdCita ." ". $faiId .">". $cita->IdCita ."</option>";
                     
                    }?>
              </select>

            </div>


            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="number" type="text" class="form-control" id="CodigoD" name="CodigoD" maxlength="8" placeholder="Codigo" value="<?php echo $dato_diagnosticos[0]->CodigoD?>">
            </div>
     

        
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" id="Descripcion"name="Descripcion" maxlength="50" placeholder="Descripcion" value="<?php echo $dato_diagnosticos[0]->Descripcion?>">
            </div>


          
                <br><br>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
            
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


<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     