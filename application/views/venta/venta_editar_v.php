<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/venta/update/'.$venta[0]->IdVenta); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_proveedor[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" value="<?php echo $dato_proveedor[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" value="<?php echo $dato_proveedor[0]->ApeMat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Dirección" value="<?php echo $dato_proveedor[0]->Direccion?>">
          </div>
          <div class="form-group col-md-6">
            <label>Celular</label>
            <input type="text" class="form-control" name="Numero" placeholder="Celular" value="<?php echo $dato_proveedor[0]->Numero?>">
          </div>
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" name="Email" placeholder="Email" value="<?php echo $dato_proveedor[0]->Email?>">
          </div>
          <div class="form-group col-md-6">
            <label>Empresa</label>
            <input type="text" class="form-control" name="Empresa" placeholder="Empresa" value="<?php echo $dato_proveedor[0]->Empresa?>">
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     