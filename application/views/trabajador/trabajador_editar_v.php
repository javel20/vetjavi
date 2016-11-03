<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/trabajador/update/'.$dato_trabajador[0]->IdTrabajador); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_trabajador[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Paterno</label>
            <input type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" value="<?php echo $dato_trabajador[0]->ApePat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido Materno</label>
            <input type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" value="<?php echo $dato_trabajador[0]->ApeMat?>">
          </div>
          <div class="form-group col-md-6">
            <label>Dirección</label>
            <input type="text" class="form-control" name="Direccion" placeholder="Dirección" value="<?php echo $dato_trabajador[0]->Direccion?>">
          </div>
          <div class="form-group col-md-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="Telefono" placeholder="Telefono" value="<?php echo $dato_trabajador[0]->Telefono?>">
          </div>

           <div class="form-group col-md-6">
              <label>Tipo Trabajador</label>
            <select class="form-control" name="SelectTipo" >
              
                <option>--seleccionar--</option>
              <?php
                $IdTipo=$dato_trabajador[0]->IdTipoTrab;
                foreach($tipos as $tipo){
                  $select = ($tipo->IdTipoTrab == $IdTipo )? 'selected':'';
                  echo "<option  ". $select  ." value=".$tipo->IdTipoTrab .">". $tipo->Nombre ."</option>";
                }

              ?>
            </select>
            </div>


          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     