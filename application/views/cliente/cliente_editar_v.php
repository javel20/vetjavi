<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/cliente/update/'.$dato_cliente[0]->IdCliente); ?>" 
              method="POST" onsubmit="return validar(this);">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30" value="<?php echo $dato_cliente[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input validate="texto" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" maxlength="15"value="<?php echo $dato_cliente[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input validate="texto" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" maxlength="15"value="<?php echo $dato_cliente[0]->ApeMat?>">
          </div>



            <div class=" col-md-6">
              <?php
                if (strlen($dato_cliente[0]->DNI)>0){

                  ?>
                   <div class="form-group">
                      <label>DNI</label>
                      <input validate="number" type="text" class="form-control" name="DNI" placeholder="DNI"  maxlength="8" value="<?php echo $dato_cliente[0]->DNI?>">

                    </div>

                  <?php
                    
                }else
                  {
                      ?>
                        <div class="form-group">
                        <label>RUC</label>
                        <input validate="number" type="text" class="form-control" name="RUC" placeholder="RUC" maxlength="11"value="<?php echo $dato_cliente[0]->RUC?>">
                    </div>

                      <?php

                  }
                ?>

                  

            </div>





         <div class="form-group col-md-6">
            <label>Ciudad</label>
            <input validate="texto"  type="text" class="form-control" name="Ciudad" placeholder="Ciudad" maxlength="15"value="<?php echo $dato_cliente[0]->Ciudad?>">
          </div>
          <div class="form-group col-md-6">
            <label>Direccion</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Direccion" maxlength="25"value="<?php echo $dato_cliente[0]->Direccion?>">
          </div>
         <div class="form-group col-md-6">
            <label>Telefono</label>
            <input validate="number" type="text" class="form-control" name="Telefono" placeholder="Telefono" maxlength="9"value="<?php echo $dato_cliente[0]->Telefono?>">
          </div>
          <div class="form-group col-md-3">
            <label>Celular</label>
            <input validate="number" type="text" class="form-control" name="Celular" placeholder="Celular"maxlength="9" value="<?php echo $dato_cliente[0]->Celular?>">
          </div>


          <div class="form-group col-md-3">
            <label>Operador</label>
             <select validate="seleccionar" type="text" class="form-control" name="Operador" placeholder="Operador">

                  <option value="Rpm" <?php echo ($dato_cliente[0]->Operador=="Rpm" ? 'selected="selected"' : '');?>>Rpm</option>    
                  <option value="Movistar" <?php echo ($dato_cliente[0]->Operador=="Movistar" ? 'selected="selected"' : '');?>>Movistar</option>
                  <option value="Rpc" <?php echo ($dato_cliente[0]->Operador=="Rpc" ? 'selected="selected"' : '');?>>Rpc</option>
                  <option value="Claro" <?php echo ($dato_cliente[0]->Operador=="Claro" ? 'selected="selected"' : '');?>>Claro</option>
                  <option value="Bitel" <?php echo ($dato_cliente[0]->Operador=="Bitel" ? 'selected="selected"' : '');?>>Bitel</option>
                  <option value="Entel" <?php echo ($dato_cliente[0]->Operador=="Entel" ? 'selected="selected"' : '');?>>Entel</option>
                  <option value="Virgin" <?php echo ($dato_cliente[0]->Operador=="Virgin" ? 'selected="selected"' : '');?>>Virgin</option>

            </select>
          </div>



          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     