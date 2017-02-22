<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/trabajador/update/'.$dato_trabajador[0]->IdTrabajador); ?>" 
              method="POST" onsubmit="return validar(this);">



          <div class="form-group col-md-6">
           <label>Tipo Trabajador</label>
              <select validate="selecbus" class="js-example-basic-single form-control" name="SelectTipo">
                <?php
                    
                    foreach($tipos as $tipo){
                      $faiId=($tipo->IdTipoTrab==$dato_trabajador[0]->IdTipoTrab)? "selected":"";
                      echo "<option value=". $tipo->IdTipoTrab ." ". $faiId .">". $tipo->NombreTP ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

          </div>
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30"value="<?php echo $dato_trabajador[0]->NombreT?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input validate="texto" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" maxlength="20"value="<?php echo $dato_trabajador[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input validate="texto" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" maxlength="20" value="<?php echo $dato_trabajador[0]->ApeMat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input validate="direccion" type="text" class="form-control" name="Direccion" placeholder="Dirección" maxlength="30" value="<?php echo $dato_trabajador[0]->DireccionT?>">
          </div>
          <div class="form-group col-md-3">
            <label>Celular</label>
            <input validate="number" type="text" class="form-control" name="Telefono" placeholder="Celular" maxlength="9" value="<?php echo $dato_trabajador[0]->CelularT?>">
          </div>


          <div class="form-group col-md-3">
            <label>Operador</label>
             <select validate="seleccionar" type="text" class="form-control" name="Operador" placeholder="Operador">

                  <option value="Rpm" <?php echo ($dato_trabajador[0]->OperadorT=="Rpm" ? 'selected="selected"' : '');?>>Rpm</option>    
                  <option value="Movistar" <?php echo ($dato_trabajador[0]->OperadorT=="Movistar" ? 'selected="selected"' : '');?>>Movistar</option>
                  <option value="Rpc" <?php echo ($dato_trabajador[0]->OperadorT=="Rpc" ? 'selected="selected"' : '');?>>Rpc</option>
                  <option value="Claro" <?php echo ($dato_trabajador[0]->OperadorT=="Claro" ? 'selected="selected"' : '');?>>Claro</option>
                  <option value="Bitel" <?php echo ($dato_trabajador[0]->OperadorT=="Bitel" ? 'selected="selected"' : '');?>>Bitel</option>
                  <option value="Entel" <?php echo ($dato_trabajador[0]->OperadorT=="Entel" ? 'selected="selected"' : '');?>>Entel</option>
                  <option value="Virgin" <?php echo ($dato_trabajador[0]->OperadorT=="Virgin" ? 'selected="selected"' : '');?>>Virgin</option>

            </select>
          </div>
            

            <div class="form-group col-md-6">
            <label>Local</label>
              <select validate="selecbus" class="js-example-basic-single2 form-control" name="SelectLocal">
                <?php
                    
                    foreach($local as $tipo){
                      // die($tipo->IdLocal==$dato_local[0]->IdLocal);
                      $faiId=($tipo->IdLocal==$dato_trabajador[0]->IdLocal)? "selected":"";
                      echo "<option value=". $tipo->IdLocal ." ". $faiId .">". $tipo->NombreL ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

            </div>

            <div class="form-group col-md-6">
            <label>Estado</label>
             <select validate="seleccionar" type="text" class="form-control" name="EstadoT">

                  <option value="Habilitado" <?php echo ($dato_trabajador[0]->EstadoT=="Habilitado" ? 'selected="selected"' : '');?>>Habilitado</option>    
                  <option value="Expulsado" <?php echo ($dato_trabajador[0]->EstadoT=="Expulsado" ? 'selected="selected"' : '');?>>Expulsado</option>
                  <option value="Retirado" <?php echo ($dato_trabajador[0]->EstadoT=="Retirado" ? 'selected="selected"' : '');?>>Retirado</option>

            </select>
          </div>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single2").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


          <div class="col-md-12">
          <input type="hidden" name="Email" value="<?php echo $dato_trabajador[0]->Email?>">
          <input type="hidden" name="Password" value="<?php echo $dato_trabajador[0]->Password?>">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     