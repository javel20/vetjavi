<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/tipocita/update/'.$dato_tipocita[0]->IdTipoCita); ?>" 
              method="POST" onsubmit="return validar(this);">
              
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="20" value="<?php echo $dato_tipocita[0]->NombreTC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Precio</label>
            <input validate="number" type="text" class="form-control" name="Precio" placeholder="Precio" maxlength="5"value="<?php echo $dato_tipocita[0]->PrecioTC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Porcentaje</label>
            <input validate="Number" type="text" class="form-control" name="Porcentaje" placeholder="%" maxlength="5" value="<?php echo $dato_tipocita[0]->PorcentajeTC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Descripcion</label>
            <input validate="texto" type="text" class="form-control" name="Descripcion" placeholder="Descripcion" maxlength="50"value="<?php echo $dato_tipocita[0]->DescripcionTC?>">
          </div>
  
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     