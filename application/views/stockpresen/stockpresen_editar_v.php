<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/StockPresen/update/'.$dato_stockpresen[0]->IdStockPresen); ?>" 
              method="POST" onsubmit="return validar(this);">
         

           <div class="form-group col-md-6">
            <label>Producto</label>

              <select validate="selecbus" class="js-example-basic-single form-control" name="SelectTipo">
                <?php
                    
                    foreach($productos as $producto){
                      $faiId=($producto->IdProducto==$dato_stockpresen[0]->IdProducto)? "selected":"";
                      echo "<option value=". $producto->IdProducto ." ". $faiId .">". $producto->NombreP ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

            </div>

             <div class="form-group col-md-6 ">
            <label>Stock Minimo</label>
            <input validate="number"  type="text" class="form-control" name="StockMin" placeholder="Stock Minimo" maxlength="5"value="<?php echo $dato_stockpresen[0]->StockMin?>">
          </div>
          <div class="form-group col-md-6">
            <label>Stock Real</label>
            <input validate="number" type="text" class="form-control" name="StockReal" placeholder="Stock Real" maxlength="5"value="<?php echo $dato_stockpresen[0]->StockReal?>">
          </div>
          <div class="form-group col-md-6">
            <label>Presentacion</label>
            <input validate="direccion" type="text" class="form-control" name="Presentacion" placeholder="Presentacion" maxlength="15"value="<?php echo $dato_stockpresen[0]->Presentacion?>">
          </div>


          <div class="form-group col-md-6">
            <label>Precio</label>
            <input validate="number" type="text" class="form-control" name="Precio"  maxlength="7"value="<?php echo $dato_stockpresen[0]->Precio?>">
          </div>

          <div class="form-group col-md-6">
            <label>Precio Venta</label>
            <input validate="number" type="text" class="form-control" name="PrecioVenta"  maxlength="7"value="<?php echo $dato_stockpresen[0]->PrecioVenta?>">
          </div>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     