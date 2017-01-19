<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/cirugia/update/'.$dato_cirugia[0]->IdCirugia); ?>" 
              method="POST" onsubmit="return validar(this);">
              
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input validate="texto" type="text" class="form-control" name="NombreC" placeholder="Nombres" value="<?php echo $dato_cirugia[0]->NombreC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Porcentaje</label>
            <input validate="Number" type="text" class="form-control" name="PrecioC" placeholder="PrecioC" value="<?php echo $dato_cirugia[0]->PrecioC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Porcentaje</label>
            <input validate="Number" type="text" class="form-control" name="PorcentajeC" placeholder="Porcentaje" value="<?php echo $dato_cirugia[0]->PorcentajeC?>">
          </div>

          <div class="form-group col-md-6 ">
            <label>Descripcion</label>
            <input validate="texto" type="text" class="form-control" name="DescripcionC" placeholder="Descripcion" value="<?php echo $dato_cirugia[0]->DescripcionC?>">
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
     