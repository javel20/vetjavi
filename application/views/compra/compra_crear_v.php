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
            <h3 class="panel-title">Registrar Compra</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST">

           

            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input type="text" class="form-control" name="CodC" placeholder="Codigo">
            </div>

            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYY" type="text"/>

                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="Fecha"]'); //our date input has the name "date"
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
              <label>Tipo Compra</label>
            <select class="form-control" name="TipoC">
                <option>Factura</option>
                <option>Boleta</option>
             </select>
            </div>


            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>



             <div class="form-group col-md-6">
            <label>Proveedor</label><br>
              <select class="form-control" id="js-example-basic-single2" name="IdProveedor">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($proveedores as $proveedor){
                      
                      echo "<option value=" .$proveedor->IdProveedor .">". $proveedor->Nombre ."</option>";
                    }?>
              </select>

            </div>

            <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value="2">

              <button type="submit" class="btn btn-primary ">Agregar</button>
            </div>
          </form>

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
<?php  $this->load->view('layouts/footer.php');?>       
     