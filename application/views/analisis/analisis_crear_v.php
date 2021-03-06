<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Analisis</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">



            <div class="form-group col-md-6">
              <label>Codigo</label>
              <input validate="unicoanalisis" type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo" maxlength="8">
            </div>

            
            <div class="form-group col-md-6">
              <label>Nombre</label>
               <input validate="texto" type="text" class="form-control" id="NombreA" name="NombreA" placeholder="Nombre" maxlength="30">
            </div>



            <div class="form-group col-md-6">
              <label>Precio</label>
              <input validate="number" type="text"class="form-control" name="PrecioAnalisis" placeholder="S/."maxlength="7">
            </div>

            <div class="form-group col-md-6">
              <label>Porcentaje</label>
              <input validate="number" type="text"class="form-control" name="PorcentajeA" placeholder="%"maxlength="7">
            </div>

            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" id="Descripcion"name="Descripcion" placeholder="Descripcion" maxlength="50">
            </div>


          
                <br><br>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
            
            </div>
          </form>

          </div>
        </div>

</div>
</div>
</div>
</div>



            <script type="text/javascript">
            $(document).ready(function() {
             $("#js-example-basic-single2").select2();

              
            });


            </script>


<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     