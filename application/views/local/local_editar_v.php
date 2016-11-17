<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/local/update/'.$dato_local[0]->IdLocal); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_local[0]->Nombre?>">
          </div>
 
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Dirección" value="<?php echo $dato_local[0]->Direccion?>">
          </div>
          <div class="form-group col-md-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="Telefono" placeholder="Telefono" value="<?php echo $dato_local[0]->Telefono?>">
          </div>

          <div class="form-group col-md-6">
            <label>estado</label>
            <input type="text" class="form-control" name="Estado" placeholder="Estado" value="<?php echo $dato_local[0]->Estado?>">
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
     