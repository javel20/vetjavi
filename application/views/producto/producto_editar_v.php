<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/producto/update/'.$dato_producto[0]->IdProducto); ?>" 
              method="POST">
          <div class="form-group col-md-6 ">
            <label>Nombres</label>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_producto[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Tipo de Producto</label>
            <input type="text" class="form-control" name="TipoProd" placeholder="Apellido Paterno" value="<?php echo $dato_producto[0]->TipoProd?>">
          </div>
          <div class="form-group col-md-6">
            <label>Precio</label>
            <input type="text" class="form-control" name="Precio" placeholder="Apellido Materno" value="<?php echo $dato_producto[0]->Precio?>">
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Dirección" value="<?php echo $dato_producto[0]->Descripcion?>">
            <input type="hidden"  name="Estado" value="<?php echo $dato_producto[0]->Estado?>">
          </div>

          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>
   

<?php  $this->load->view('layouts/footer.php');?>       
     