<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/stockpresen/update/'.$dato_stockpresen[0]->IdStockPresen); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Stock Minimo</label>
            <input type="text" class="form-control" name="StockMin" placeholder="Stock Minimo" value="<?php echo $dato_stockpresen[0]->StockMin?>">
          </div>
          <div class="form-group col-md-6">
            <label>Stock Real</label>
            <input type="text" class="form-control" name="StockReal" placeholder="Stock Real" value="<?php echo $dato_stockpresen[0]->StockReal?>">
          </div>
          <div class="form-group col-md-6">
            <label>Presentacion</label>
            <input type="text" class="form-control" name="Presentacion" placeholder="Presentacion" value="<?php echo $dato_stockpresen[0]->Presentacion?>">
          </div>


           <div class="form-group col-md-6">
              <label>Producto</label>
            <select class="form-control" name="SelectTipo" >
              
                <option>--seleccionar--</option>
              <?php
                $IdTipo=$dato_producto[0]->IdProducto;
                foreach($tipos as $tipo){
                  $select = ($tipo->IdProducto == $IdTipo )? 'selected':'';
                  echo "<option  ". $select  ." value=".$tipo->IdProducto .">". $tipo->Nombre ."</option>";
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
     