<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/venta/update/'.$dato_venta[0]->IdVenta); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input type="text" class="form-control" name="CodV" placeholder="Codigo" value="<?php echo $dato_venta[0]->CodV?>">
          </div>


           
            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYY" type="text" value="<?php echo trim($dato_venta[0]->Fecha) ?>"/>

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
            <input type="text" class="form-control" name="TipoV" placeholder="Tipo Venta" value="<?php echo $dato_venta[0]->TipoV?>">
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_venta[0]->Descripcion?>">
          </div>

          
         
         <div class="form-group col-md-6">
 
              <label>Cliente</label>
              <input class="form-control" list="clientes" id="listCliente">
              <datalist id="clientes"><?php foreach($clientes as $cliente){
                    echo "<option data=".$cliente->IdCliente ." value=". $cliente->Nombre ."></option>";
                  }?></datalist>
            </div>


          <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value="2">
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

<?php  $this->load->view('layouts/footer.php');?>       
     