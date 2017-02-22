<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/venta/update/'.$dato_venta[0]->IdVenta); ?>" 
              method="POST" onsubmit="return validar(this);">
          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input validate="unicoventa" type="text" class="form-control" name="CodV" placeholder="Codigo" maxlength="8"value="<?php echo $dato_venta[0]->CodV?>">
          </div>


           
            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYYY" type="text" maxlength="10" value="<?php echo trim($dato_venta[0]->Fecha) ?>"/>

                  <script>
                    $(document).ready(function(){

                      var fecha= "<?php echo trim($dato_venta[0]->Fecha) ?>"
                      

                      var anio = Number(fecha.split("/")[0]);
                      var mes = Number(fecha.split("/")[1]);
                      var dia = Number(fecha.split("/")[2]);
                      
                      var date_input=$('input[name="Fecha"]'); //our date input has the name "date"
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
            <label>Tipo Venta</label>
            <!--as<?php //die($dato_compra[0]->TipoC);?>-->
            <select validate="seleccionar" type="text" class="form-control" name="TipoV" placeholder="TipoV">
                <option>--seleccionar</option>
                <?php if ($dato_venta[0]->TipoV=="Factura"){
                          
                
                
                ?>
              <option value="Factura" selected>Factura</option>    
              <option value="Boleta">Boleta</option>
                <?php }else{ ?>
                   <option value="Factura" >Factura</option>    
              <option value="Boleta" selected >Boleta</option>

                <?php } ?>

                
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" maxlength="50" value="<?php echo $dato_venta[0]->Descripcion?>">
          </div>

          
         
         <div class="form-group col-md-6">
 
              <label>Cliente</label>
               <select validate="selecbus" class="js-example-basic-single2 form-control" name="listClient">
                <?php
                    
                    foreach($clientes as $cliente){
                      // die($tipo->IdLocal==$dato_local[0]->IdLocal);
                      $faiId=($cliente->IdCliente==$dato_cliente[0]->IdCliente)? "selected":"";
                      echo "<option value=". $cliente->IdCliente ." ". $faiId .">". $cliente->Nombre ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

            </div>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single2").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


          <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value=<?php echo $_SESSION["IdTrabajador"] ?> />
                
                <input type="hidden" name="sumatotal" id="sumatotal" value="<?php echo $dato_venta[0]->PrecioTotalVenta?>"/>  
                <input type="hidden" name="IdCliente" id="IdCliente" value="<?php echo $dato_venta[0]->IdCliente?>">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
 <script>
    var listCliente = document.getElementById("listCliente");
    var optionsCliente = document.getElementById("clientes");
    var insertIdCliente = document.getElementById("IdCliente");

    var identificadorPro = "<?php echo $dato_venta[0]->IdCliente?>";
    optionsCliente.childNodes.forEach(function(e){
        if(e.getAttribute("data") == identificadorPro){
          listCliente.value = e.value; 
        }
      });



  listCliente.onchange = function(e){
    optionsCliente.childNodes.forEach(function(e){
        if(e.value == listCliente.value){
          insertIdCliente.value = e.getAttribute("data"); 
        }
      });
  }
</script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     