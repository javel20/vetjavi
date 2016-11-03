<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/cliente/update/'.$dato_cliente[0]->IdCliente); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_cliente[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" value="<?php echo $dato_cliente[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" value="<?php echo $dato_cliente[0]->ApeMat?>">
          </div>



            <div class=" col-md-6">
              <?php
                if (strlen($dato_cliente[0]->DNI)>0){

                  ?>
                   <div class="form-group">
                      <label>DNI</label>
                      <input type="text" class="form-control" name="DNI" placeholder="DNI" value="<?php echo $dato_cliente[0]->DNI?>">

                    </div>

                  <?php
                    
                }else
                  {
                      ?>
                        <div class="form-group">
                        <label>RUC</label>
                        <input type="text" class="form-control" name="RUC" placeholder="RUC" value="<?php echo $dato_cliente[0]->RUC?>">
                    </div>

                      <?php

                  }
                ?>

                  

            </div>





         <div class="form-group col-md-6">
            <label>Ciudad</label>
            <input type="text" class="form-control" name="Ciudad" placeholder="Ciudad" value="<?php echo $dato_cliente[0]->Ciudad?>">
          </div>
          <div class="form-group col-md-6">
            <label>Direccion</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Direccion" value="<?php echo $dato_cliente[0]->Direccion?>">
          </div>
         <div class="form-group col-md-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="Telefono" placeholder="Telefono" value="<?php echo $dato_cliente[0]->Telefono?>">
          </div>
          <div class="form-group col-md-6">
            <label>Celular</label>
            <input type="text" class="form-control" name="Celular" placeholder="Celular" value="<?php echo $dato_cliente[0]->Celular?>">
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     