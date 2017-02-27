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
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">


            
            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="unicoventa" type="text" class="form-control" name="CodV" placeholder="Codigo" maxlength="8">
            </div>

            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYYY" type="text" maxlength="10"/>

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
            <select validate="seleccionar" class="form-control" name="TipoV">
              
               
                <option>Boleta</option>
                <option>Factura</option>
                </select>
            </div>


            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" maxlength="50">
            </div>


            <div class="form-group col-md-6">
            <label>Cliente</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="IdCliente">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($clientes as $cliente){
                      
                      echo "<option value=" .$cliente->IdCliente .">". $cliente->Nombre ." ".$cliente->ApePat." ".$cliente->ApeMat. "</option>";
                    }?>
              </select>

            </div>
            
            <div class="col-md-12"></div>
          
              <h5 class="col-md-12 mi_header">Detalle de venta</h5>
              <hr />
              <div>
                <div id="form_detalle" >
                
     

            <div class="form-group col-md-6">
            <label>Producto</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single" name="">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($productos as $producto){
                      
                      echo "<option tipo =". $producto->IdTipoProducto." value=" .$producto->IdProducto .">". $producto->NombreP ."</option>";
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
            
                    <input validate="number" id ="cantidad" type="text" class="form-control" name="cantidad_add_detalle" placeholder="Cantidad" maxlength="7">
                  
                  </div>


               
                  <div class="form-group col-md-12">
                    <input type="hidden" value="" name="preciou" id="preciou" />
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
                        <th>Ganancia</th>
                        <th>Precio Total</th>
                        <th>Opc</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_detalle">
                    
                    </tbody>
                  </table>
                </div>
              
            
            </div>
            <div class="col-md-12">     
                  <!--con el name seteo y con el input lo envio al servidor-->
                <input type="hidden" name="IdTrabajador" value=<?php echo $_SESSION["IdTrabajador"] ?> />
                <input type="hidden" value="" name="sumatotal" id="sumatotal" />  
                <input type="hidden" value="" name="ganancia" id="ganancia" />  
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

  $("#js-example-basic-single2").select2();//recupero el nodo
  $("#js-example-basic-single").select2();

  $("#selecpresent").on("change", function(event){//changue evento para seleccionar una opcion
console.log("estoy en selecpresent")
  // var option = $(e).find('option:selected');
  //   console.log(e.target.value);
  //   console.log(option);

     
//traigo el precio
        event.target.childNodes.forEach(function(e){ //event.target haciendo click en uno trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
          if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
            precio = e.getAttribute('precio');//e.get... traigo el atributo precio y lo asigno a precio
          }
        });

        event.target.childNodes.forEach(function(e){ //event.target haciendo click en uno trae los select y con el chilNodes trae los option, foreach recorro a todos los elementos del array, function(e) recore cada elemento en este caso los option
          if(e.value==event.target.value){ //e.value traigo el atributo value y o igualo al value del evento que estoy seleccionando
            preciov = e.getAttribute('preciov');//e.get... traigo el atributo precio y lo asigno a precio
            console.log(preciov);
          }
        });

  })
var porcentaje='';
var precio='';
var preciov='';
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
          if(e.value==event.target.value){//event.target.value uno especifico
            tipo = e.getAttribute('tipo')
          }
        });

// console.log(porc);
        // porc son todos los objetos de tipoproducto en JS
        porc.forEach(function(e){
         
            if(e.IdTipoProducto == tipo){ 
              // console.log(e.Porcentaje);
              porcentaje = e.Porcentaje;
            }
          

        })

        let acumulador="<option>--seleccionar--</option>";
          console.log(JSON.parse(response));

        JSON.parse(response).dato_presen.map( //map iterar un array
          function(e){ //e representa un objeto
          acumulador += "<option precio=" +e.Precio +" preciov=" +e.PrecioVenta +" value="+ e.IdStockPresen +">" + e.Presentacion +" - " + e.StockReal + "</option>" 
            

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

    $cantidad = document.getElementById("cantidad");
    console.log($cantidad);

  var nodo_push = "";
  var acumulado = [];
  var st=0;
  var sg=0;
  var preciou=0;
  var stock='';

  $agregar_detalle.onclick = (event)=>{
   event.preventDefault();

// $("#selecpresent").val()
console.log($("#selecpresent").val());

    // $("#selecpresent")[0].childNodes.forEach(function(e){
    //     if(e.value==$("#selecpresent").val()){
    //    //   texto=$('#selecpresent').text();
    //         stock = e.text.split("-")[1].trim()
    //         console.log(stock);
    //     }
    // })
 
 


  //  console.log(texto);
   var precioV=0;
   var precioT=0;
   var precioG=0;
  var precioVe=0;
   console.log(precio);
  //  console.log(porcentaje);
  //  precioV=Number(precio)+ Number(porcentaje*precio)/100.0;
  
   
  //  preciou=precioV;
  preciou=preciov;
    console.log(preciou);
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




      // precioT=precioV*acumulado[4];
      precioT=preciov*acumulado[4];
     st+=precioT;

      precioVe+=preciov;
      precioG=(preciov-precio)*acumulado[4];
      sg+=precioG;

      $('#ganancia').val(sg);
      $("#sumatotal").val(st);
      $("#preciou").val(preciou);
     console.log(sg);
    console.log(st);
    console.log(preciou);



var acumulado2 = acumulado[2].split("-")[0].trim()

    $tbody_detalle.innerHTML += `<tr>
      <td> ${acumulado[0]}<input type="hidden" name="nombre_detalle[]" value="${acumulado[1]}" /> </td>
      <td> ${acumulado2}<input type="hidden" name="presentacion_detalle[]" value="${acumulado[3]}" /> </td>
      <td> <input name="precio_unitario_detalle[]" value="${preciou}" /> </td>
      <td> <input name="cantidad_detalle[]" value="${acumulado[4]}"/> </td>
      <td > <input type="hidden" class="preciog" value=${precioG} />${precioG.toFixed(2)}</td>
      <td > <input type="hidden" name="preciot_detalle[]"class="preciot" value=${precioT} />${precioT.toFixed(2)}</td>
      <td> <span id="delete_row" class="glyphicon glyphicon-trash"> </span> </td>
    </tr>`;

  };

  $tbody_detalle.onclick = function(e){
    if(e.target.id == "delete_row"){
        // ($(e.target).closest("tr").find(".preciot").val());
        st -= $(e.target).closest("tr").find(".preciot").val(); //closest trae a los tr y find busca el valor de preciot
        sg -= $(e.target).closest("tr").find(".preciog").val();
        $("#ganancia").val(sg);
        $("#sumatotal").val(st);
        console.log(sg);
        console.log(st);
        e.target.closest("tr").remove();
    }
  }
 
  var porc = JSON.parse('<?php echo json_encode($tipoproductos);?>'.toString());// convertir un objeto normal a JS


</script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     