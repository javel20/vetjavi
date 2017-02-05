<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Cirugia</h3>
          </div>
          <div class="panel-body">

            <form class="row" action="store" method="POST" onsubmit="return validar(this);">

                <div class="form-group col-md-6">
                <label>Nombre</label>
                <input validate="texto" type="text" class="form-control" name="NombreC" placeholder=" Nombre"maxlength="30" >
                </div>

                <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="FechaC" placeholder="MM/DD/YYYY" type="text" maxlength="10"  />


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaC"]'); //our date input has the name "date"
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
                <input validate="number" type="text" class="form-control" name="PrecioC" placeholder="Precio"maxlength="7">
                </div>

                <div class="form-group col-md-6">
                <label>Porcentaje</label>
                <input validate="number" type="text" class="form-control" name="PorcentajeC" placeholder="%"maxlength="7">
                </div>


                <div class="form-group col-md-6">
                <label>Descripcion</label>
                <input validate="text" type="text" class="form-control" name="DescripcionC" placeholder="Descripcion" maxlength="50">
                </div>


            <div class="col-md-12">
              <button type="submit" class="btn btn-primary ">Agregar</button>
            
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>
</div>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     