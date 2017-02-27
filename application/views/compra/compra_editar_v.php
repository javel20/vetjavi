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
              action="<?php echo base_url('index.php/compra/update/'.$dato_compra[0]->IdCompra); ?>" 
              method="POST" onsubmit="return validar(this);">
          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input type="text" class="form-control" name="CodC" placeholder="Codigo" readonly="readonly" maxlength="8" value="<?php echo $dato_compra[0]->CodC?>">
          </div>


           
            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input validate="date" class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYYY" type="text" maxlength="10"value="<?php echo trim($dato_compra[0]->Fecha) ?>"/>

                  <script>
                    $(document).ready(function(){
                      

                      var fecha= "<?php echo trim($dato_compra[0]->Fecha) ?>"

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
            <label>Tipo Compra</label>
           <!--as<?php //die($dato_compra[0]->TipoC);?>-->
            <select validate="seleccionar" type="text" class="form-control" name="TipoC" placeholder="TipoC">
                <option>--seleccionar--</option>
                <?php if ($dato_compra[0]->TipoC=="Factura"){ 
                ?>

              <option value="Factura" selected>Factura</option>    
              <option value="Boleta">Boleta</option>

                <?php }else{ 
                ?>
                   <option value="Factura" >Factura</option>    
              <option value="Boleta" selected >Boleta</option>

                <?php } 
                ?>

                
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" maxlength="50" value="<?php echo $dato_compra[0]->Descripcion?>">
          </div>


            <div class="form-group col-md-6">
            <label>Proveedor</label><br>
              <select validate="selecbus" class="js-example-basic-single form-control" name="IdProveedor">
                <?php
                    
                    foreach($proveedores as $proveedor){
                      $faiId=($proveedor->IdProveedor==$dato_compra[0]->IdProveedor)? "selected":"";
                      echo "<option value=". $proveedor->IdProveedor ." ". $faiId .">" .$proveedor->Empresa. " - " .$proveedor->Nombre. " " .$proveedor->ApePat. " ".$proveedor->ApeMat. "</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

            </div>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


          <div class="col-md-12">
                <input type="hidden" name="IdTrabajador" value="2">
                <!--<input type="hidden" name="IdProveedor" id="IdProveedor" value="<?php echo $dato_compra[0]->IdProveedor?>">-->
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
 

<?php  $this->load->view('layouts/footer.php');?>       
     