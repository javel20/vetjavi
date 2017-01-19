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
            <label>Presentacion - Stock</label>
              <select validate="selec" class="form-control" id="selecpresent" name="">
                  <option>--seleccionar--</option>
              
              </select>

            </div>


                 
                  <div class="form-group col-md-6">
                    <label>Cantidad</label>
            
                    <input validate="number" type="text" class="form-control" name="cantidad_add_detalle" placeholder="Cantidad">
                  
                  </div>

                  <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha de Vencimiento</label>
                <input validate="date" class="form-control" id="dateV" name="FechaV" placeholder="MM/DD/YYYY" type="text"/>

                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaV"]'); //our date input has the name "date"
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
                    <label>Marque la casilla si es necesario</label>

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="casillapreciou" name="preg_precio_add_detalle"> ¿Desea cambiar el precio unitario?
                      </label>
                    </div>

  
                  </div>

              
            <div class="form-group col-md-6">
                    <label>Precio unitario</label>
            
                    <input validate="number" type="text" id="preciounitario" class="form-control" name="precio_add_detalle" placeholder="Precio" disabled/>
                  
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
                        <th>Cantidad</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Precio de Compra</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_detalle">
                    
                    </tbody>
                  </table>
                </div>
              

            <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value=<?php echo $_SESSION["IdTrabajador"] ?>>

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

  $('#casillapreciou').click(function(e){
    
    if($("#casillapreciou").prop("checked")){

      $('#preciounitario').attr("disabled",false)
      
        
      //  console.log("habilitado");

    }
    else
    {
      $('#preciounitario').attr("disabled",true)
        $('#preciounitario').val(precio);
    }
  })

  $("#js-example-basic-single2").select2();
  $("#js-example-basic-single").select2();
    $("#selecpresent").on("change", function(event){//changue evento para seleccionar una opcion

  // var option = $(e).find('option:selected');
  //   console.log(e.target.value);
  //   console.log(option);

     

        event.target.childNodes.forEach(function(e){ //event.target trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
          if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
            precio = e.getAttribute('precio');//e.get... traigo el atributo precio y lo asigno a precio

            $('#preciounitario').val(precio);

          }
        });

  })

  var porcentaje='';
var precio='';
   $("#js-example-basic-single").on("change", function (event){
    
      $.ajax({
      url:"http://localhost/vetjavi/index.php/producto/presen/" +event.target.value,
      dataType: 'text',
      cache:false,
      type:'GET',
     
      success:function(response){

        // let js=JSON.stringify(response);
        // let js2=JSON.parse(response+ '\'');
        // console.log(js2);
      
        // console.log(JSON.parse(response).dato_presen);

        var tipo='';

        event.target.childNodes.forEach(function(e){
          if(e.value==event.target.value){
            tipo = e.getAttribute('tipo')
          }
        });

console.log(porc);
        
        porc.forEach(function(e){
         
            if(e.IdTipoProducto == tipo){
              console.log(e.Porcentaje);
              porcentaje = e.Porcentaje;
            }
          

        })

        let acumulador="<option>--seleccionar--</option>";
          console.log(JSON.parse(response));

        JSON.parse(response).dato_presen.map( //map iterar un array
          function(e){ //e representa un objeto
          acumulador += "<option precio=" +e.Precio +" value="+ e.IdStockPresen +">" + e.Presentacion +" - " + e.StockReal + "</option>" 
            
        
          }

        );


        $("#selecpresent").html(acumulador);

  

        console.log("exito")
      },
     
        error:function(response){

        console.log("error")
      }

    });


   })



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
               acumulado.push(k.value); //push agrega un valor mas
               }
              else if (  k.tagName == "INPUT") 
                acumulado.push(k.value);
        })
    })


  //  precioT=precioV*acumulado[4];

     console.log(acumulado);




    console.log(acumulado);

    $tbody_detalle.innerHTML += `<tr>
      <td> ${acumulado[0]}<input type="hidden" name="nombre_detalle[]" value="${acumulado[1]}" /> </td>
       <td> ${acumulado[2]}<input type="hidden" name="presentacion_detalle[]" value="${acumulado[3]}" /> </td>  

      <td> <input name="cantidad_detalle[]" value="${acumulado[4]}"/> </td>
      <td> <input name="fecha[]" value="${acumulado[5]}"/> </td>
      <td> <input name="precio_detalle[]" value="${acumulado[6]}"/> </td>
      <td> <span id="delete_row" class="glyphicon glyphicon-trash"> </span> </td>
    </tr>`;

  };

  $tbody_detalle.onclick = (e)=>{
    if(e.target.id == "delete_row"){
        e.target.closest("tr").remove();
    }
  }

    var porc = JSON.parse('<?php echo json_encode($tipoproductos);?>'.toString());
 
</script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     