<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/proveedor/update/'.$dato_proveedor[0]->IdProveedor); ?>" 
              method="POST" onsubmit="return validar(this)">
          <div class="form-group col-md-6 ">
            <label>Nombre del distribuidor</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30"value="<?php echo $dato_proveedor[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input validate="texto" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" maxlength="20"value="<?php echo $dato_proveedor[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input validate="texto" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" maxlength="20"value="<?php echo $dato_proveedor[0]->ApeMat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input validate="direccion" type="text" class="form-control" name="Direccion" placeholder="Dirección" maxlength="30" value="<?php echo $dato_proveedor[0]->Direccion?>">
          </div>
          <div class="form-group col-md-3">
            <label>Celular</label>
            <input validate="number" type="text" class="form-control" name="Celular" placeholder="Celular" maxlength="9" value="<?php echo $dato_proveedor[0]->Celular?>">
          </div>

          <div class="form-group col-md-3">
            <label>Operador</label>
             <select validate="seleccionar" type="text" class="form-control" name="Operador" placeholder="Operador">

                  <option value="Rpm" <?php echo ($dato_proveedor[0]->Operador=="Rpm" ? 'selected="selected"' : '');?>>Rpm</option>    
                  <option value="Movistar" <?php echo ($dato_proveedor[0]->Operador=="Movistar" ? 'selected="selected"' : '');?>>Movistar</option>
                  <option value="Rpc" <?php echo ($dato_proveedor[0]->Operador=="Rpc" ? 'selected="selected"' : '');?>>Rpc</option>
                  <option value="Claro" <?php echo ($dato_proveedor[0]->Operador=="Claro" ? 'selected="selected"' : '');?>>Claro</option>
                  <option value="Bitel" <?php echo ($dato_proveedor[0]->Operador=="Bitel" ? 'selected="selected"' : '');?>>Bitel</option>
                  <option value="Entel" <?php echo ($dato_proveedor[0]->Operador=="Entel" ? 'selected="selected"' : '');?>>Entel</option>
                  <option value="Virgin" <?php echo ($dato_proveedor[0]->Operador=="Virgin" ? 'selected="selected"' : '');?>>Virgin</option>

            </select>
          </div>


          <div class="form-group col-md-6">
            <label>Email</label>
            <input validate="email" type="email" class="form-control" name="Email" placeholder="Email" maxlength="30" value="<?php echo $dato_proveedor[0]->Email?>">
          </div>
          <div class="form-group col-md-6">
            <label>Nombre de la empresa</label>
            <input validate="texto" type="text" class="form-control" name="Empresa" placeholder="Empresa" maxlength="25"value="<?php echo $dato_proveedor[0]->Empresa?>">
          </div>
          <div class="col-md-12">

          <input type="hidden" name="Estado" value="<?php echo $dato_proveedor[0]->Estado?>">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     