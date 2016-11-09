<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Cita</h3>
          </div>

          <div class="panel-body">
            <form class="row" action="store" method="POST">


              <div class="form-group col-md-6">
                <label>Tipo Cita</label>
                    <select class="form-control" name="listTipo">
                    
                        <option>--seleccionar--</option>
                            <?php
                        
                                foreach($citas as $cita){

                                echo "<option value=".$cita->IdTipoCita .">". $cita->Nombre ."</option>";
                                }
                        
                            ?>
                </select>
            </div>



            <div class="form-group col-md-6">
 
              <label>Paciente</label>
              <input class="form-control" list="Pacientes" id="listPaciente" >
              <datalist id="Pacientes"><?php foreach($pacientes as $Paciente){
                    echo "<option data=".$Paciente->IdPaciente ." value=". $Paciente->Nombre ."></option>";
                  }?></datalist>
            </div>



                <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha Reserva</label>
                <input class="form-control" id="date" name="FechaReserva" placeholder="MM/DD/YYY" type="text"/>


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaReserva"]'); //our date input has the name "date"
                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                        var options={
                          format: 'mm/dd/yyyy',
                          container: container,
                          todayHighlight: true,
                          autoclose: true,
                        };
                        date_input.datepicker(options);
                      })
                  </script>

            </div>



            <div class="form-group col-md-6">
              <label>Talla</label>
              <input type="text" class="form-control" name="Talla" placeholder="Talla">
            </div>
            <div class="form-group col-md-6">
              <label>Peso</label>
              <input type="text" class="form-control" name="Peso" placeholder="Raza">
            </div>
            <div class="form-group col-md-6">
              <label>Frecuencia Cardiaca</label>
              <input type="text" class="form-control" name="FrecuenciaCardiaca" placeholder="Edad">
            </div>
            <div class="form-group col-md-6">
              <label>Frecuencia Respiratoria</label>
              <input type="text" class="form-control" name="FrecuenciaRespiratoria" placeholder="Color">
            </div>
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>



          
                <br><br>
            <div class="col-md-12">
            <input type="hidden" name="listPaciente" id="IdPaciente">
              <button type="submit" class="btn btn-primary ">Guardar</button>
            
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>



<script>
  var listPaciente = document.getElementById("listPaciente");
  var optionsPaciente = document.getElementById("Pacientes");
  var insertIdPaciente = document.getElementById("IdPaciente");
  listPaciente.onchange = function(e){
    optionsPaciente.childNodes.forEach(function(e){
        if(e.value == listPaciente.value){
          insertIdPaciente.value = e.getAttribute("data"); 
        }
      });
  }
</script>


<?php  $this->load->view('layouts/footer.php');?>       
     