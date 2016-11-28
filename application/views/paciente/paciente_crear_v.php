<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Paciente</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">


            <div class="form-group col-md-6">
            <label>Cliente</label>
              <select validate="selecbus" class="form-control" id="js-example-basic-single2" name="SelectTipo">
                  <option>--seleccionar--</option>
                <?php
                    
                    foreach($clientes as $cliente){
                      
                      echo "<option value=" .$cliente->IdCliente .">". $cliente->Nombre ."</option>";
                    }?>
              </select>

            </div>


            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input validate="texto" type="text"class="form-control" name="Nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <label>Raza</label>
              <input validate="texto" type="text" class="form-control" name="Raza" placeholder="Raza">
            </div>
            <div class="form-group col-md-6">
              <label>Edad</label>
              <input validate="number" type="text" class="form-control" name="Edad" placeholder="Edad">
            </div>
            <div class="form-group col-md-6">
              <label>Color</label>
              <input validate="texto" type="text" class="form-control" name="Color" placeholder="Color">
            </div>
            <div class="form-group col-md-6">
              <label>Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion">
            </div>

            <div class="form-group col-md-6">
              <label>Sexo</label>
              <select validate="seleccionar" class="form-control" id="Sexo" name="Sexo">
                <option>--seleccionar--</option>
                <option >Macho</option>
                <option>Hembra</option>
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
</div>


            <script type="text/javascript">
            $(document).ready(function() {
                 $("#js-example-basic-single2").select2();

                  var data=document.getElementById("js-example-basic-single2")
             
             

              data.onchange = function(){
                 data.nextElementSibling.style.border = "none"
              }

            });

 
          
              // /^[0-9]+$/g.test("23".trim())

            </script>

<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');?>       
     