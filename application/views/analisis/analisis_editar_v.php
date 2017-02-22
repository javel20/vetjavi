<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/analisis/update/'.$dato_analisis[0]->IdAnalisis); ?>" 
              method="POST" onsubmit="return validar(this);">


          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input validate="unicoanalisis" type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo" maxlength="8" value="<?php echo $dato_analisis[0]->Codigo?>" required>
          </div>

          <div class="form-group col-md-6 ">
            <label>Nombre</label>
            <input validate="text" type="text" class="form-control" id="NombreA" name="NombreA" placeholder="Nombre" maxlength="30" value="<?php echo $dato_analisis[0]->NombreA?>" required>
          </div>



           
          <div class="form-group col-md-6">
              <label>Precio</label>
              <input validate="number" type="text"class="form-control" name="PrecioAnalisis"  maxlength="7" value="<?php echo $dato_analisis[0]->PrecioAnalisis?>">
            </div>

            <div class="form-group col-md-6">
              <label>Porcentaje</label>
              <input validate="number" type="text"class="form-control" name="PorcentajeA"  maxlength="7" value="<?php echo $dato_analisis[0]->PorcentajeA?>">
            </div>


          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" maxlength="50" value="<?php echo $dato_analisis[0]->Descripcion?>">
          </div>


           

            <script type="text/javascript">
            $(document).ready(function() {
            var fn = $(".js-example-basic-single").select2();
              // $(".js-example-basic-single").select
            // fn.defaults.set("qwe","sdsd")
            });

            </script>


          <div class="col-md-12">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
          
          </div>
        </form>

		</div>
	</div>
</div>


   
<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     