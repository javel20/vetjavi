<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/tipoproducto/update/'.$dato_tipoprod[0]->IdTipoProducto); ?>" 
              method="POST" onsubmit="return validar(this);">

          <div class="form-group col-md-6 ">
            <label>Nombre</label>
            <input validate="texto" type="text" class="form-control" name="NombreTipoP" placeholder="Nombre" maxlength="30" value="<?php echo $dato_tipoprod[0]->NombreTipoP?>">
          </div>
 
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input validate="number" type="text" class="form-control" name="Descripcion" placeholder="Descripcion" maxlength="50" value="<?php echo $dato_tipoprod[0]->Descripcion?>">
          </div>
         


          <div class="col-md-12">

          <!--<input type="hidden" name="Estado" value="<?php echo $dato_tipoprod[0]->Estado?>">-->
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     