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
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">

           

            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="number" type="text" class="form-control" name="CodC" placeholder="Codigo">
            </div>

            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYY" type="text"/>

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
                <select validate="seleccionar" class="form-control" name="TipoC">
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
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="IdProveedor">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($proveedores as $proveedor){
                      
                      echo "<option value=" .$proveedor->IdProveedor .">". $proveedor->Nombre ."</option>";
                    }?>
              </select>

            </div>


             <div class="col-md-12"></div>
          
              <h4 class="col-md-12 mi_header">Detalle de Compra</h4>
              <hr />
              <div>
                <div id="form_detalle" >
                
     

            <div class="form-group col-md-6">
            <label>Producto</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single" name="">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($productos as $producto){
                      
                      echo "<option value=" .$producto->IdProducto .">". $producto->Nombre ."</option>";
                    }?>
              </select>

            </div>


                 
                  <div class="form-group col-md-6">
                    <label>Cantidad</label>
            
                    <input validate="number" type="text" class="form-control" name="cantidad_add_detalle" placeholder="Cantidad">
                  
                  </div>

                  <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha de Vencimiento</label>
                <input validate="date" class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYY" type="text"/>

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
               
                  <div class="form-group col-md-12">
                    <a href="" id="agregar_detalle" class="btn btn-primary">Agregar Detalle </a>
                  </div>
                 </div>
                <div class="table" id="table_detalle">
                  <table class="table table_arreglar">
                    <thead>
                      <tr class="arreglar">
                        <th>Nombre Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Algo que falte</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_detalle">
                    
                    </tbody>
                  </table>
                </div>
              

            <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value="2">

              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>
</div>

<script type="text/javascript">

  $("#js-example-basic-single2").select2();
  $("#js-example-basic-single").select2();


  $agregar_detalle = document.getElementById("agregar_detalle");
  $form_detalle = document.getElementById("form_detalle");
  $tbody_detalle = document.getElementById("tbody_detalle");


  var nodo_push = "";
  var acumulado = [];
  $agregar_detalle.onclick = (event)=>{
   event.preventDefault();
   acumulado = [];
    $form_detalle.childNodes.forEach( e=> {
        e.childNodes.forEach( k=> {
            if(k.tagName == "SELECT"){
               let select_name = k.options[k.options.selectedIndex].text;
               acumulado.push(select_name);
               acumulado.push(k.value);
               }
              else if (  k.tagName == "INPUT") 
                acumulado.push(k.value);
        })
    })

    console.log(acumulado);

    $tbody_detalle.innerHTML += `<tr>
      <td> ${acumulado[0]}<input type="hidden" name="nombre_detalle[]" value="${acumulado[1]}" /> </td>
      <td> <input name="cantidad_detalle[]" value="${acumulado[2]}"/> </td>
      <td> <input name="fecha[]" value="${acumulado[3]}" /> </td>
      <td>x</td>
      <td> <span id="delete_row" class="glyphicon glyphicon-trash"> </span> </td>
    </tr>`;

  };

  $tbody_detalle.onclick = (e)=>{
    if(e.target.id == "delete_row"){
        e.target.closest("tr").remove();
    }
  }
 
</script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     