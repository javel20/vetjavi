<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/paciente/update/'.$dato_paciente[0]->IdPaciente); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombre</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_paciente[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Raza</label>
            <input type="text" class="form-control" name="Raza" placeholder="Raza" value="<?php echo $dato_paciente[0]->Raza?>">
          </div>
          <div class="form-group col-md-6">
            <label>Edad</label>
            <input type="text" class="form-control" name="Edad" placeholder="Edad" value="<?php echo $dato_paciente[0]->Edad?>">
          </div>
          <div class="form-group col-md-6">
            <label>Color</label>
            <input type="text" class="form-control" name="Color" placeholder="Color" value="<?php echo $dato_paciente[0]->Color?>">
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_paciente[0]->Descripcion?>">
          </div>
          <div class="form-group col-md-6">
            <label>Sexo</label>
            <input type="text" class="form-control" name="Sexo" placeholder="Sexo" value="<?php echo $dato_paciente[0]->Sexo?>">
          </div>

             <div class="form-group col-md-6">
                <label>Cliente</label>
                    <select class="form-control" name="SelectTipo">
                    
                        <option>--seleccionar--</option>
                            <?php
                        
                                foreach($clientes as $cliente){
                                    $data= ($dato_paciente[0]->IdCliente==$cliente->IdCliente)? 'selected':"";
                                echo "<option ".$data." value=".$cliente->IdCliente .">". $cliente->Nombre ."</option>";
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
     