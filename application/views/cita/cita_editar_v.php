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
      <div class="page-header">

        <form class="row mrb-30 well"
              action="<?php echo base_url('index.php/cita/update/'.$dato_cita[0]->IdCita); ?>" 
              method="POST" onsubmit="return validar(this);">



          <div class="form-group col-md-6">
            <label>Paciente</label><br>
              <select validate="selecbus" class="js-example-basic-single form-control" name="listPaciente">
                <?php
                    foreach($pacientes as $Paciente){
                      $faiId=($Paciente->IdPaciente==$dato_cita[0]->IdPaciente)? "selected":"";
                      echo "<option value=". $Paciente->IdPaciente ." ". $faiId .">". $Paciente->Nombre ."</option>";
                    }?>
              </select>

            </div>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


            <div class="form-group col-md-6">
            <label>Tipo Cita</label><br>
              <select validate="selecbus" class="js-example-basic-single2 form-control" name="listTipo">
              <?php 
                $faiId_a = "";
                $faiId_c = "";
                 if( $tipo_de_cita == "Analisis")
                        $faiId_a = "selected";
                  if( $tipo_de_cita == "Cirugia")
                        $faiId_c = "selected";
              ?>
              <option value='cirugia' <?php echo $faiId_c ?> >Cirugia</option>
              <option value='analisis'  <?php echo $faiId_a ?>  >Analisis</option>
                <?php
                    foreach($tipocitas as $Cita){
                         $faiId=($Cita->IdTipoCita==$dato_cita[0]->IdTipoCita )? "selected":"";
                     
                      echo "<option value=". $Cita->IdTipoCita ." ". $faiId .">". $Cita->NombreTC ."</option>";
                    }?>
              </select>

            </div>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single2").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>

            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="text" type="text" id="Codigo" class="form-control" name="CodigoC" placeholder="Codigo" value="<?php echo $dato_cita[0]->CodigoC?>">
            </div>


            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha Reserva</label>
                <input validate="date" class="form-control" id="date" name="FechaReserva" placeholder="MM/DD/YYY" type="text" value="<?php echo $dato_cita[0]->FechaReserva?>" />


                  <script>
                    $(document).ready(function(){


                      var fecha= "<?php echo trim($dato_cita[0]->FechaReserva) ?>"

                      var anio = Number(fecha.split("/")[0]);
                      var mes = Number(fecha.split("/")[1]);
                      var dia = Number(fecha.split("/")[2]);


                      var date_input=$('input[name="FechaReserva"]'); //our date input has the name "date"
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
                <label class="control-label" for="date">Hora Reserva</label><br>
                <div class="input-group bootstrap-timepicker timepicker">
                    <input id="timepicker1" type="text" class="form-control input-small" name="HoraC" value="<?php echo $dato_cita[0]->HoraC?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>

            </div>



            <div class="form-group col-md-6">
              <label>Peso</label>
              <input validate="number" type="text" class="form-control" name="Peso" placeholder="Peso" value="<?php echo $dato_cita[0]->Peso?>">
            </div>
            <div class="form-group col-md-6">
              <label>Frecuencia Cardiaca</label>
              <input validate="number" type="text" class="form-control" name="FrecuenciaCardiaca" placeholder="Frecuencia Cardiaca" value="<?php echo $dato_cita[0]->FrecuenciaCardiaca?>">
            </div>
            <div class="form-group col-md-6">
              <label>Frecuencia Respiratoria</label>
              <input validate="number" type="text" class="form-control" name="FrecuenciaRespiratoria" placeholder="Frecuencia Respiratoria" value="<?php echo $dato_cita[0]->FrecuenciaRespiratoria?>">
            </div>
  
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_cita[0]->Descripcion?>">
            </div>


            <div class="form-group col-md-6 cirugia" id="capa_cirugia" >
            <label>Cirugia</label>
              <select  validate="" id="select_cirugia" class="form-control" name="listCirugia">
              <option>--seleccionar--</option>
                <?php
                    
                    foreach($cirugias as $cirugia){

                      $faiId=($cirugia->IdCirugia==$dato_cita[0]->IdCirugia)? "selected":"";  
                      echo "<option value=". $cirugia->PorcentajeC ." precio=". $cirugia->PrecioC." ". $faiId .">". $cirugia->NombreC ."</option>";
                      
                      
                    }?>
              </select>

            </div>

            <div class="form-group col-md-6 analisis" id="capa_analisis" >
            <label>Analisis</label>
              <select  validate="" id="select_analisis" class="form-control" name="listAnalisis">
              <option>--seleccionar--</option>
                <?php
                    
                    foreach($analisis as $analisi){

                      $faiId=($analisi->IdAnalisis==$dato_cita[0]->IdAnalisis)? "selected":"";  
                      echo "<option porcentaje =". $analisi->PorcentajeA ." precio=". $analisi->PrecioAnalisis."  ".$faiId .">". $analisi->NombreA ."</option>";
                    }?>
              </select>

            </div>



            <div class="col-md-12">
      
              <input validate="decimal" type="hidden" class="form-control" name="PrecioTotal" placeholder="Precio" value="<?php echo $dato_cita[0]->PrecioTotal?>">
              <button type="submit" class="btn btn-primary ">Actualizar</button>
            
            </div>


        </form>

		</div>
	</div>
</div>
   
<script type="text/javascript">
      $('#timepicker1').timepicker({
                minuteStep: 10
      });

      var tipo_cita = "<?php echo $tipo_de_cita; ?>"

      if(tipo_cita == "Cirugia")
       $('#capa_cirugia').css("display","inline-block")

       if(tipo_cita == "Analisis")
       $('#capa_analisis').css("display","inline-block")


       $("#select_cita").on("change", function(event){
      if(event.target.value == "cirugia"){
// console.log(event.target);
          $('#capa_cirugia').css("display","inline-block")
          $('#capa_analisis').css("display","none")
            console.log("estoy en cirugia");
            $('#select_cirugia')[0].setAttribute("validate","selecbus")//attr para modificar propiedades

        }else if(event.target.value == "analisis"){

             $('#capa_analisis').css("display","inline-block")
             $('#capa_cirugia').css("display","none")
            console.log("estoy en analisis");
            $('#select_analisis')[0].setAttribute("validate","selecbus")//attr para modificar propiedades

        }
          else{


              $('#capa_cirugia').css("display","none")
              $('#capa_analisis').css("display","none")
              $('#select_cirugia')[0].setAttribute("validate","")
               console.log("estoy en tipo cita");



        }
          // console.log(event.target.value);

       })

      $("#select_cirugia").on("change", function(event){
      

  
      })





</script>



<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     
     