<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Stock Presentacion</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST">


              <div class="form-group col-md-6">
                <label>Producto</label>
                    <select class="form-control" name="SelectTipo">
                    
                        <option>--seleccionar--</option>
                            <?php
                        
                                foreach($productos as $producto){

                                echo "<option value=".$producto->IdProducto .">". $producto->Nombre ."</option>";
                                }
                        
                            ?>
                </select>
            </div>

            <div class="form-group col-md-6">
              <label>StockMin</label>
              <input type="text" class="form-control" name="StockMin" placeholder="Stock Minimo">
            </div>
            <div class="form-group col-md-6">
              <label>Stock Real</label>
              <input type="text" class="form-control" name="StockReal" placeholder="Stock Real">
            </div>
            <div class="form-group col-md-6">
              <label>Presentación</label>
              <input type="text" class="form-control" name="Presentacion" placeholder="Presentacion">
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
     