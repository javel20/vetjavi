<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-xs-12 col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Venta</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST">
            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input type="text" class="form-control" name="CodV" placeholder="Codigo">
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
              <label>Tipo Venta</label>
            <select class="form-control" name="TipoV">
              
               
                <option>Factura</option>
                <option>Boleta</option>
                </select>
            </div>


            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>


            <div class="form-group col-md-6">
            <label>Cliente</label><br>
              <select class="form-control" id="js-example-basic-single2" name="IdCliente">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($clientes as $cliente){
                      
                      echo "<option value=" .$cliente->IdCliente .">". $cliente->Nombre ."</option>";
                    }?>
              </select>

            </div>
            

            <div class="col-md-12">
              <h4>Detalle de venta</h4>
              <hr>
              <div>
                <div id="form_detalle" >
                
     

            <div class="form-group col-md-6">
            <label>Producto</label><br>
              <select class="form-control" id="js-example-basic-single" name="">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($productos as $producto){
                      
                      echo "<option value=" .$producto->IdProducto .">". $producto->Nombre ."</option>";
                    }?>
              </select>

            </div>


            <div class="form-group col-md-6">
            <label>Presentacion</label><br>
              <select class="form-control" id="js-example-basic-single3" name="">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($presentacion as $presen){
                      
                      echo "<option value=" .$presen->IdStockPresen .">". $presen->Presentacion ."</option>";
                    }?>
              </select>

            </div>
                 
                 
                  <div class="form-group col-md-6">
                    <label>Cantidad</label>
            
                    <input type="text" class="form-control" name="cantidad_add_detalle" placeholder="Cantidad">
                  
                  </div>
                  <div class="form-group col-md-6">
                    <label>Precio</label>
                    <input type="text" class="form-control" name="precio_add_detalle" placeholder="Precio">
                  
                  </div>
               
                  <div class="form-group col-md-12">
                    <a href="" id="agregar_detalle" class="btn btn-primary">Agregar Detalle </a>
                  </div>
                 </div>
                <div class="table" id="table_detalle">
                  <table class="table table_arreglar">
                    <thead>
                      <tr class="arreglar">
                        <th>Nombre Producto</th>
                        <th>Presentacion</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Cantidad Total</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_detalle">
                    
                    </tbody>
                  </table>
                </div>
              </div>
            
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
</div>


            <script type="text/javascript">

              $(document).ready(function() {
              
              $("#js-example-basic-single2").select2();

              });

            </script>

            <script type="text/javascript">

              $(document).ready(function() {
              
              $("#js-example-basic-single").select2();

              });

            </script>

            <script type="text/javascript">

              $(document).ready(function() {
              
              $("#js-example-basic-single3").select2();

              });

            </script>

<?php  $this->load->view('layouts/footer.php');?>       
     