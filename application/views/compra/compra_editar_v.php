<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/compra/update/'.$dato_compra[0]->IdCompra); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input type="text" class="form-control" name="CodC" placeholder="Codigo" value="<?php echo $dato_compra[0]->CodC?>">
          </div>


            <div class="form-group col-md-6">
                 <label class="control-label" for="date">Fecha</label>
                <input class="form-control" id="date" name="Fecha" placeholder="MM/DD/YYY" type="text"/>

                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="Fecha"]'); //our date input has the name "date"
                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                        var options={
                          format: 'mm/dd/yyyy',
                          container: container,
                          todayHighlight: true,
                          autoclose: true,
                        };
                        date_input.datepicker(options);
                      })
                  </script>
              </div>
          

          <div class="form-group col-md-6">
            <label>Tipo Compra</label>
            <input type="text" class="form-control" name="TipoC" placeholder="Tipo Compra" value="<?php echo $dato_compra[0]->TipoC?>">
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_compra[0]->Descripcion?>">
          </div>

          
          <div class="form-group col-md-6">

            <label>Proveedor</label>
            <input class="form-control" list="proveedores" name="IdProveedor">
            <datalist id="proveedores">
              <?php
                
                foreach($proveedores as $proveedor){

                  echo "<option value=".$proveedor->IdProveedor .">". $proveedor->Nombre ."</option>";
                }
                
              ?>
            </datalist>
          </div>


          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     