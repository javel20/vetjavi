<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/trabajador/update/'.$dato_trabajador[0]->IdTrabajador); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_trabajador[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" value="<?php echo $dato_trabajador[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" value="<?php echo $dato_trabajador[0]->ApeMat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Dirección" value="<?php echo $dato_trabajador[0]->Direccion?>">
          </div>
          <div class="form-group col-md-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="Telefono" placeholder="Telefono" value="<?php echo $dato_trabajador[0]->Telefono?>">
          </div>


            <div class="form-group col-md-6">
            <label>Tipo Trabajador</label><br>
              <select class="js-example-basic-single form-control" name="SelectTipo">
                <?php
                    
                    foreach($tipos as $tipo){
                      $faiId=($tipo->IdTipoTrab==$dato_trabajador[0]->IdTipoTrab)? "selected":"";
                      echo "<option value=". $tipo->IdTipoTrab ." ". $faiId .">". $tipo->Nombre ."</option>";
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
   

<?php  $this->load->view('layouts/footer.php');?>       
     