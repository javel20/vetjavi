<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Permiso</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">


            <div class="form-group col-md-6">
            <label>Trabajador</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="SelectTrab" >
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($trabajadores as $trabajador){
                      
                      echo "<option value=" .$trabajador->IdTrabajador .">". $trabajador->NombreT ." ".$trabajador->ApePat." ".$trabajador->ApeMat. "</option>";
                    }?>
              </select>

            </div>


            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="number" type="text" class="form-control" name="CodigoP" placeholder="Codigo" maxlength="8">
            </div>



            <div class="form-group col-md-6">
              <label>Fecha Inicio</label>
              <input validate="date" class="form-control" id="date" name="FechaInicioP" placeholder="MM/DD/YYYY" type="text" maxlength="10"/>


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaInicioP"]'); //our date input has the name "date"
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
              <label>Fecha Termino</label>
              <input validate="date" class="form-control" id="date" name="FechaTerminoP" placeholder="MM/DD/YYYY" type="text" maxlength="10"/>


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaTerminoP"]'); //our date input has the name "date"
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
              <label>Descripcion</label>
              <input type="text" class="form-control" name="DescripcionP" placeholder="Descripcion" maxlength="50">
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

                  var data=document.getElementById("js-example-basic-single2")
             
             

              data.onchange = function(){
                 data.nextElementSibling.style.border = "none"
              }

            });

 
          
              // /^[0-9]+$/g.test("23".trim())

            </script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     