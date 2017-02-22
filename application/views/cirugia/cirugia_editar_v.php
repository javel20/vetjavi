<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/cirugia/update/'.$dato_cirugia[0]->IdCirugia); ?>" 
              method="POST" onsubmit="return validar(this);">
              
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="NombreC" placeholder="Nombres" maxlength="30"value="<?php echo $dato_cirugia[0]->NombreC?>">
          </div>

          <!--<div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="FechaC" placeholder="MM/DD/YYYY" type="text" value="<?php echo $dato_cirugia[0]->FechaC?>" />


                  <script>
                    $(document).ready(function(){


                      var fecha= "<php echo trim($dato_cirugia[0]->FechaC) ?>"

                      var anio = Number(fecha.split("/")[0]);
                      var mes = Number(fecha.split("/")[1]);
                      var dia = Number(fecha.split("/")[2]);


                      var date_input=$('input[name="FechaC"]'); //our date input has the name "date"
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

            </div>-->

          <div class="form-group col-md-6 ">
            <label>Precio</label>
            <input validate="Number" type="text" class="form-control" name="PrecioC" placeholder="PrecioC" maxlength="7"value="<?php echo $dato_cirugia[0]->PrecioC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Porcentaje</label>
            <input validate="Number" type="text" class="form-control" name="PorcentajeC" placeholder="%" maxlength="7"value="<?php echo $dato_cirugia[0]->PorcentajeC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Descripcion</label>
            <input validate="text" type="text" class="form-control" name="DescripcionC" placeholder="Descripcion" maxlength="50"value="<?php echo $dato_cirugia[0]->DescripcionC?>">
          </div>
  
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     