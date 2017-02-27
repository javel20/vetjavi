<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/permisotrab/update/'.$dato_permiso[0]->IdPermiso); ?>" 
              method="POST" onsubmit="return validar(this);">



            <div class="form-group col-md-6">
            <label>Trabajador</label><br>
              <select  validate="selecbus" class="js-example-basic-single form-control" name="SelectTrab">
                <?php
                    
                    foreach($trabajadores as $trabajador){
                      $faiId=($trabajador->IdTrabajador==$dato_permiso[0]->IdTrabajador)? "selected":"";
                      echo "<option value=". $trabajador->IdTrabajador ." ". $faiId .">". $trabajador->NombreT ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

            </div>


          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input type="text" class="form-control" name="CodigoP" readonly="readonly" placeholder="Codigo" maxlength="8" value="<?php echo $dato_permiso[0]->CodigoP?>">
          </div>


          <div class="form-group col-md-6">
                
                <label class="control-label" for="date">Fecha Inicio</label>
                <input validate="date" class="form-control" id="date" name="FechaInicioP" placeholder="MM/DD/YYY" maxlength="10" type="text" value= "<?php echo $dato_permiso[0]->FechaInicioP?>" />


                  <script>
                    $(document).ready(function(){

                       var fecha= "<?php echo trim($dato_permiso[0]->FechaInicioP) ?>"

                      var anio = Number(fecha.split("/")[0]);
                      var mes = Number(fecha.split("/")[1]);
                      var dia = Number(fecha.split("/")[2]);


                      var date_input=$('input[name="FechaInicioP"]'); //our date input has the name "date"
                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                        var options={
                          format: 'mm/dd/yyyy',
                          defaultViewDate: {year:anio,month:mes,day:dia},
                          container: container,
                          todayHighlight: true,
                          autoclose: true,
                        };
                        date_input.datepicker(options);
                      })
                  </script>
           
          </div>



           <div class="form-group col-md-6">
                
                <label class="control-label" for="date">Fecha Termino</label>
                <input validate="date" class="form-control" id="date" name="FechaTerminoP" placeholder="MM/DD/YYY" maxlength="10" type="text" value= "<?php echo $dato_permiso[0]->FechaTerminoP?>" />


                  <script>
                    $(document).ready(function(){

                       var fecha= "<?php echo trim($dato_permiso[0]->FechaTerminoP) ?>"

                      var anio = Number(fecha.split("/")[0]);
                      var mes = Number(fecha.split("/")[1]);
                      var dia = Number(fecha.split("/")[2]);


                      var date_input=$('input[name="FechaTerminoP"]'); //our date input has the name "date"
                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                        var options={
                          format: 'mm/dd/yyyy',
                          defaultViewDate: {year:anio,month:mes,day:dia},
                          container: container,
                          todayHighlight: true,
                          autoclose: true,
                        };
                        date_input.datepicker(options);
                      })
                  </script>
           
          </div>


          <div class="form-group col-md-6">
            <label>Estado</label>

            <select validate="seleccionar" type="text" class="form-control" name="EstadoP" placeholder="Estado">
                <option>--seleccionar--</option>

                <?php if ($dato_permiso[0]->EstadoP=="Con permiso"){
                ?>

                  <option value="Con permiso" selected>Con permiso</option>    
                  <option value="De regreso">De regreso</option>


                <?php }elseif($dato_permiso[0]->EstadoP=="De regreso"){
                ?>

                  <option value="Con permiso">Con permiso</option>    
                  <option value="De regreso" selected>De regreso</option>
                  <?php }
            ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="DescripcionP" placeholder="Descripcion" maxlength="50" value="<?php echo $dato_permiso[0]->DescripcionP?>">
          </div>

        
            

            
            
            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


          <div class="col-md-12">
        
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>



   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     