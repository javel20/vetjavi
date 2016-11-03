<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


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
 
              <label>Proveedor</label>
              <input class="form-control" list="proveedores" id="listProveedor">
              <datalist id="proveedores"><?php foreach($proveedores as $proveedor){
                    echo "<option data=".$proveedor->IdProveedor ." value=". $proveedor->Nombre ."></option>";
                  }?></datalist>
            </div>

            <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value="2">
                <input type="hidden" name="IdProveedor" id="IdProveedor">
              <button type="submit" class="btn btn-primary ">Agregar</button>
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>

<script>
  var listProveedor = document.getElementById("listProveedor");
  var optionsProveedor = document.getElementById("proveedores");
  var insertIdProveedor = document.getElementById("IdProveedor");
  listProveedor.onchange = function(e){
    optionsProveedor.childNodes.forEach(function(e){
        if(e.value == listProveedor.value){
          insertIdProveedor.value = e.getAttribute("data"); 
        }
      });
  }
</script>
<?php  $this->load->view('layouts/footer.php');?>       
     