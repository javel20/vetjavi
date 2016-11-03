<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Paciente</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST">


              <div class="form-group col-md-6">
                <label>Cliente</label>
                    <select class="form-control" name="SelectTipo">
                    
                        <option>--seleccionar--</option>
                            <?php
                        
                                foreach($clientes as $cliente){

                                echo "<option value=".$cliente->IdCliente .">". $cliente->Nombre ."</option>";
                                }
                        
                            ?>
                </select>
            </div>

            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" name="Nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <label>Raza</label>
              <input type="text" class="form-control" name="Raza" placeholder="Raza">
            </div>
            <div class="form-group col-md-6">
              <label>Edad</label>
              <input type="text" class="form-control" name="Edad" placeholder="Edad">
            </div>
            <div class="form-group col-md-6">
              <label>Color</label>
              <input type="text" class="form-control" name="Color" placeholder="Color">
            </div>
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>
            <div class="form-group col-md-6">
              <label>Sexo</label>
              <input type="text" class="form-control" name="Sexo" placeholder="Sexo">
            </div>


          
                <br><br>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary ">Guardar</button>
            
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>

<?php  $this->load->view('layouts/footer.php');?>       
     