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
            <h3 class="panel-title">Registrar Salida</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">



            <div class="form-group col-md-6">
            <label>Cita</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="SelectCita">
                  <option>--seleccionar--</option>
                <?php
                     
                    foreach($citas as $cita){
                     
                             echo "<option value=" .$cita->IdCita .">". $cita->CodigoC ."</option>";
                     
                    }?>
              </select>

            </div>


            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="number" type="text" class="form-control" id="CodigoS" name="CodigoS" maxlength="8" placeholder="Codigo">
            </div>

            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input validate="texto" type="text" class="form-control" id="NombreS" name="NombreS" maxlength="8" placeholder="Nombre">
            </div>

            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="FechaS" placeholder="MM/DD/YYYY" type="text" maxlength="10"  />


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaS"]'); //our date input has the name "date"
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
              <label>Precio</label>
              <input validate="number" type="text" class="form-control" id="PrecioS" name="PrecioS" maxlength="8" placeholder="S/.">
            </div>
         
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" id="Descripcion"name="DescripcionS" maxlength="50" placeholder="Descripcion">
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
     