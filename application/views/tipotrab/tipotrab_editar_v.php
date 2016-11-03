<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/tipotrab/update/'.$dato_tipotrab[0]->IdTipoTrab); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_tipotrab[0]->Nombre?>">
          </div>
  
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     