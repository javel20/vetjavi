<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/local/update/'.$dato_local[0]->IdLocal); ?>" 
              method="POST" onsubmit="return validar(this);">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30 "value="<?php echo $dato_local[0]->NombreL?>">
          </div>
 
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Dirección" maxlength="30" value="<?php echo $dato_local[0]->DireccionL?>">
          </div>
          <div class="form-group col-md-6">
            <label>Telefono</label>
            <input validate="number" type="text" class="form-control" name="Telefono" placeholder="Telefono" maxlength="9" value="<?php echo $dato_local[0]->TelefonoL?>">
          </div>

          <div class="form-group col-md-6">
            <label>Estado</label>
             <select validate="seleccionar" type="text" class="form-control" name="Estado" placeholder="Estado">

                  <option value="Habilitado" <?php echo ($dato_local[0]->EstadoL=="Habilitado" ? 'selected="selected"' : '');?>>Habilitado</option>    
                  <option value="Cerrado" <?php echo ($dato_local[0]->EstadoL=="Cerrado" ? 'selected="selected"' : '');?>>Cerrado</option>
                  <option value="Clausurado" <?php echo ($dato_local[0]->EstadoL=="Clausurado" ? 'selected="selected"' : '');?>>Clausurado</option>

            </select>
          </div>


         


          <div class="col-md-12">

          <!--<input type="hidden" name="Estado" value="<?php echo $dato_local[0]->Estado?>">-->
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     