<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/analisis/update/'.$dato_analisis[0]->IdAnalisis); ?>" 
              method="POST" onsubmit="return validar(this);">


          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input validate="number" type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo" value="<?php echo $dato_analisis[0]->Codigo?>" required>
          </div>

          <div class="form-group col-md-6 ">
            <label>Nombre</label>
            <input validate="text" type="text" class="form-control" id="NombreA" name="NombreA" placeholder="Nombre" value="<?php echo $dato_analisis[0]->NombreA?>" required>
          </div>


          <div class="form-group col-md-6">
            <label>Tipo</label>
            <select validate="seleccionar" type="text" class="form-control" name="Tipo" placeholder="Tipo">

                 <option value="Hemograma Completo" <?php echo ($dato_analisis[0]->Tipo=="Hemograma Completo" ? 'selected="selected"' : '');?>>Hemograma Completo</option>
                 <option value="Urianálisis" <?php echo ($dato_analisis[0]->Tipo=="Urianálisis" ? 'selected="selected"' : '');?>>Urianálisis Completo</option>
                 <option value="Perfil Hepático" <?php echo ($dato_analisis[0]->Tipo=="Perfil Hepático" ? 'selected="selected"' : '');?>>Perfil Hepático</option>
                 <option value="Perfil Renal" <?php echo ($dato_analisis[0]->Tipo=="Perfil Renal" ? 'selected="selected"' : '');?>>Perfil Renal</option>
                 <option value="Perfil Completo" <?php echo ($dato_analisis[0]->Tipo=="Perfil Completo" ? 'selected="selected"' : '');?>>Perfil Hepático</option>
                
            </select>
          </div>


          <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha Reserva</label>
                <input validate="date" class="form-control" id="date" name="FechaA" placeholder="MM/DD/YYY" type="text" value= "<?php echo $dato_analisis[0]->FechaA?>" />


                  <script>
                    $(document).ready(function(){


                      var fecha= "<?php echo trim($dato_cita[0]->FechaA) ?>"

                      var anio = Number(fecha.split("/")[0]);
                      var mes = Number(fecha.split("/")[1]);
                      var dia = Number(fecha.split("/")[2]);


                      var date_input=$('input[name="FechaA"]'); //our date input has the name "date"
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
              <label>Precio</label>
              <input validate="number" type="text"class="form-control" name="PrecioAnalisis"  value="<?php echo $dato_analisis[0]->PrecioAnalisis?>">
            </div>

            <div class="form-group col-md-6">
              <label>Porcentaje</label>
              <input validate="number" type="text"class="form-control" name="PorcentajeA"  value="<?php echo $dato_analisis[0]->PorcentajeA?>">
            </div>


          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_analisis[0]->Descripcion?>">
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
     