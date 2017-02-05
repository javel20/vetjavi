<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/producto/update/'.$dato_producto[0]->IdProducto); ?>" 
              method="POST" onsubmit="return validar(this);">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30" value="<?php echo $dato_producto[0]->Nombre?>">
          </div>


     


          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Dirección" maxlength="50" value="<?php echo $dato_producto[0]->Descripcion?>">
            
          </div>

          <div class="form-group col-md-6">
            <label>Tipo de Producto</label>
              <select validate="selecbus" class="js-example-basic-single form-control" name="TipoProduc">
                <?php
                    
                   foreach($tp as $tipoprod){
                      
                      $faiId=($tipoprod->IdTipoProducto==$dato_producto[0]->IdTipoProducto)? "selected":"";
                      echo "<option value=". $tipoprod->IdTipoProducto ." ". $faiId .">". $tipoprod->NombreTipoP ."</option>";
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
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>