
<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="<?php echo base_url('public/bootstrap-timepicker.min.css'); ?>" />
<script src="<?php echo base_url('public/bootstrap-timepicker.min.js'); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      
        <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">Registrar Cita</h3>
                </div>
          <div class="panel-body">
          <form class="row" action="store" method="POST" onsubmit="return validar(this);">
            

          

            <div class="form-group col-md-6">
            <label>Tipo Cita</label>
              <select validate="selecbus" class="form-control" id="select_cita" name="listTipo">
              <option>--seleccionar--</option>

                <option value='cirugia'>Cirugia</option>
                <option value='analisis'>Analisis</option>

                
                <?php
                    
                    foreach($citas as $cita){
                          $precio = isset( $cita->PrecioTC )? $cita->PrecioTC:'' ;
                      echo "<option  precio=".$precio." Porcentaje=". $cita->PorcentajeTC ." value=" .$cita->IdTipoCita .">". $cita->NombreTC ."</option>";
                    }?>
              </select>

            </div>

            <div class="form-group col-md-6 ">
              <label>Paciente</label>
                <select validate="selecbus" class="form-control" id="js-example-basic-single" name="listPaciente">
                <option>--seleccionar--</option>
                  <?php
                      foreach($pacientes as $paciente){
                        echo "<option value=" .$paciente->IdPaciente .">". $paciente->Nombre ."</option>";

                      }?>
                </select>

              </div>

           
              <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="text" type="text" id="Codigo" class="form-control" name="CodigoC" placeholder="Codigo">
            </div>
            
                <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha Reserva</label>
                <input validate="date" class="form-control" id="date" name="FechaReserva" placeholder="MM/DD/YYY" type="text"/>


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
                <label class="control-label" for="date">Hora Reserva</label><br>
                <div class="input-group bootstrap-timepicker timepicker">
                    <input id="timepicker1" type="text" class="form-control input-small" name="HoraC">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>

            </div>



            <div class="form-group col-md-6">
              <label>Peso</label>
              <input validate="number" type="text" id="Peso" class="form-control" name="Peso" placeholder="Peso">
            </div>
            <div class="form-group col-md-6">
              <label>Frecuencia Cardiaca</label>
              <input validate="number" type="text"id="FrecCard" class="form-control" name="FrecuenciaCardiaca" placeholder="Frecuencia Cardiaca">
            </div>
            <div class="form-group col-md-6">
              <label>Frecuencia Respiratoria</label>
              <input validate="number" type="text" id="FrecRes" class="form-control" name="FrecuenciaRespiratoria" placeholder="Frecuencia Respiratoria">
            </div>

            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>

            <div class="form-group col-md-6 cirugia" id="capa_cirugia" >
            <label>Cirugia</label>
              <select  validate="" id="select_cirugia" class="form-control" name="listCirugia">
              <option>--seleccionar--</option>
                <?php
                    
                    foreach($cirugias as $cirugia){

                      echo "<option porcentaje =". $cirugia->PorcentajeC ." precio=". $cirugia->PrecioC. " value=" .$cirugia->IdCirugia .">". $cirugia->NombreC ."</option>";
                    }?>
              </select>

            </div>

            <div class="form-group col-md-6 analisis" id="capa_analisis" >
            <label>Analisis</label>
              <select  validate="" id="select_analisis" class="form-control" name="listAnalisis">
              <option>--seleccionar--</option>
                <?php
                    
                    foreach($analisiss as $analisis){

                      echo "<option porcentaje =". $analisis->PorcentajeA ." precio=". $analisis->PrecioAnalisis. " value=" .$analisis->IdAnalisis .">". $analisis->NombreA ."</option>";
                    }?>
              </select>

            </div>


          
                <br><br>
            <div class="col-md-12">
              <input type="hidden" id="PrecioTotal" name="PrecioTotal" value="">
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
      $('#timepicker1').timepicker({
        defaultTime: '09:00 AM',
        minuteStep: 10
      });
      $(document).ready(function() {
      $("#js-example-basic-single").select2();
      $("#select_cita").select2();
      $("#select_cirugia").select2();


      $("#select_cita").on("change", function(event){
        
        if(event.target.value == "cirugia"){
// console.log(event.target);
          $('#capa_cirugia').css("display","inline-block")
          $('#capa_analisis').css("display","none")
            // console.log("estoy en cirugia");
            $('#select_cirugia')[0].setAttribute("validate","selecbus")//attr para modificar propiedades

        }else if(event.target.value == "analisis"){

             $('#capa_analisis').css("display","inline-block")
             $('#capa_cirugia').css("display","none")
            // console.log("estoy en cirugia");
            $('#select_analisis')[0].setAttribute("validate","selecbus")//attr para modificar propiedades

        }
          else{


              $('#capa_cirugia').css("display","none")
              $('#capa_analisis').css("display","none")
              $('#select_cirugia')[0].setAttribute("validate","")
               console.log("estoy en tipo cita");

                  var precio='';
                  var porcentaje='';
                var PrecioTotal='';
                // console.log(event.target);
                      event.target.childNodes.forEach(function(e){ //event.target haciendo click en uno trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
                      if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
                        precio = Number(e.getAttribute('precio'));//e.get... traigo el atributo precio y lo asigno a precio
                        porcentaje = Number(e.getAttribute('porcentaje'));
                        PrecioTotal=Number(precio*porcentaje)/100.0+precio;
                        console.log(precio);
                        // console.log(porcentaje);
                        console.log(PrecioTotal);
                        $("#PrecioTotal").val(PrecioTotal);

          }
        });


        }
          // console.log(event.target.value);
      })


      $("#select_cirugia").on("change", function(event){
      
        
                  var precio='';
                  var porcentaje='';
                var PrecioTotal='';
                // console.log(event.target);
                      event.target.childNodes.forEach(function(e){ //event.target haciendo click en uno trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
                      if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
                        precio = Number(e.getAttribute('precio'));//e.get... traigo el atributo precio y lo asigno a precio
                        porcentaje = Number(e.getAttribute('porcentaje'));
                        PrecioTotal=Number(precio*porcentaje)/100.0+precio;
                        console.log(precio);
                        // console.log(porcentaje);
                        console.log(PrecioTotal);
                        $("#PrecioTotal").val(PrecioTotal);

          }
        });
  
      })


            $("#select_analisis").on("change", function(event){
      
        
                  var precio='';
                  var porcentaje='';
                var PrecioTotal='';
                // console.log(event.target);
                      event.target.childNodes.forEach(function(e){ //event.target haciendo click en uno trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
                      if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
                        precio = Number(e.getAttribute('precio'));//e.get... traigo el atributo precio y lo asigno a precio
                        porcentaje = Number(e.getAttribute('porcentaje'));
                        PrecioTotal=Number(precio*porcentaje)/100.0+precio;
                        console.log(precio);
                        // console.log(porcentaje);
                        console.log(PrecioTotal);
                        $("#PrecioTotal").val(PrecioTotal);

          }
        });
  
      })





   });




</script>




<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     