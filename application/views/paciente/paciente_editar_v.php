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
              action="<?php echo base_url('index.php/paciente/update/'.$dato_paciente[0]->IdPaciente); ?>" 
              method="POST" onsubmit="return validar(this);">
          <div class="form-group col-md-6 ">
            <label>Nombre</label>
            <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" value="<?php echo $dato_paciente[0]->Nombre?>">
          </div>
          <div class="form-group col-md-6">
            <label>Raza</label>
            <input validate="texto" type="text" class="form-control" name="Raza" placeholder="Raza" value="<?php echo $dato_paciente[0]->Raza?>">
          </div>

          <div class="form-group col-md-6">
                
                <label class="control-label" for="date">Fecha Nacimiento</label>
                <input validate="date" class="form-control" id="date" name="FechaNac" placeholder="MM/DD/YYY" type="text" value= "<?php echo $dato_paciente[0]->FechaNac?>" />


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="FechaNac"]'); //our date input has the name "date"
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
            <label>Color</label>
            <input validate="texto" type="text" class="form-control" name="Color" placeholder="Color" value="<?php echo $dato_paciente[0]->Color?>">
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_paciente[0]->Descripcion?>">
          </div>

          <div class="form-group col-md-6">
            <label>Sexo</label>

            <select validate="seleccionar" type="text" class="form-control" name="Sexo" placeholder="Sexo">
                <option>--seleccionar--</option>

                <?php if ($dato_paciente[0]->Sexo=="Macho"){
                ?>

                  <option value="Macho" selected>Macho</option>    
                  <option value="Hembra">Hembra</option>


                <?php }elseif($dato_paciente[0]->Sexo=="Hembra"){
                ?>

                  <option value="Macho">Macho</option>    
                  <option value="Hembra" selected>Hembra</option>
                  <?php }
            ?>
            </select>
          </div>

            

            <div class="form-group col-md-6">
            <label>Cliente</label><br>
              <select  validate="selecbus" class="js-example-basic-single form-control" name="SelectTipo">
                <?php
                    
                    foreach($clientes as $cliente){
                      $faiId=($cliente->IdCliente==$dato_paciente[0]->IdCliente)? "selected":"";
                      echo "<option value=". $cliente->IdCliente ." ". $faiId .">". $cliente->Nombre ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

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
     