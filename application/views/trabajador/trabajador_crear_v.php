<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Trabajador</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST">
            <div class="form-group col-md-6">
              <label>Nombres</label>
              <input type="text" class="form-control" name="Nombre" placeholder="Nombres">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Paterno</label>
              <input type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Materno</label>
              <input type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno">
            </div>
            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input type="text" class="form-control" name="Direccion" placeholder="Dirección">
            </div>
            <div class="form-group col-md-6">
              <label>Telefono</label>
              <input type="text" class="form-control" name="Telefono" placeholder="Telefono">
            </div>



            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="text" class="form-control" name="Email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label>Password</label>
              <input type="PASSWORD" class="form-control" name="Password" placeholder="****">
            </div>




            <div class="form-group col-md-6">
              <label>Tipo Trabajador</label>
            <select class="form-control" name="SelectTipo">
              
                <option>--seleccionar--</option>
              <?php
                
                foreach($tipos as $tipo){

                  echo "<option value=".$tipo->IdTipoTrab .">". $tipo->Nombre ."</option>";
                }
                
              ?>
            </select>
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
     