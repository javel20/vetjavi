<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">

        <form class="row mrb-30 well" 
              action="<?php echo base_url('index.php/analisis/update/'.$dato_analisis[0]->IdAnalisis); ?>" 
              method="POST" onsubmit="return validar();">

           <div class="form-group col-md-6">
            <label>Paciente</label><br>
              <select class="js-example-basic-single form-control" name="SelecPaciente">
                <?php
                    
                    foreach($pacientes as $paciente){
                      $faiId=($paciente->IdPaciente==$dato_paciente[0]->IdPaciente)? "selected":"";
                      echo "<option value=". $paciente->IdPaciente ." ". $faiId .">". $paciente->Nombre ."</option>";
                    }?>

                      <!--echo "<option value=" .$proveedor->IdProveedor ." value=". $proveedor->Nombre ."</option>";-->
                   
              </select>

            </div>

          <div class="form-group col-md-6 ">
            <label>Codigo</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" placeholder="Codigo" value="<?php echo $dato_analisis[0]->Codigo?>" required>
          </div>
          <div class="form-group col-md-6">
            <label>Tipo</label>
            <select type="text" class="form-control" name="Tipo" placeholder="Tipo">
                <option>--seleccionar</option>

                <?php if ($dato_analisis[0]->Tipo=="Hemograma Completo"){
                ?>

                  <option value="Hemograma Completo" selected>Hemograma Completo</option>    
                  <option value="Urianálisis">Urianálisis</option>
                  <option value="Perfil Hepático">Perfil Hepático</option>
                  <option value="Perfil Renal">Perfil Renal</option>
                  <option value="Perfil Hepático">Perfil Completo</option>

                <?php }elseif($dato_analisis[0]->Tipo=="Urianálisis"){
                ?>

                  <option value="Hemograma Completo">Hemograma Completo</option>    
                  <option value="Urianálisis"selected>Urianálisis</option>
                  <option value="Perfil Hepático">Perfil Hepático</option>
                  <option value="Perfil Renal">Perfil Renal</option>
                  <option value="Perfil Hepático">Perfil Completo</option>

                <?php }elseif($dato_analisis[0]->Tipo=="Perfil Hepático"){
                ?>

                  <option value="Hemograma Completo">Hemograma Completo</option>    
                  <option value="Urianálisis">Urianálisis</option>
                  <option value="Perfil Hepático"selected>Perfil Hepático</option>
                  <option value="Perfil Renal">Perfil Renal</option>
                  <option value="Perfil Hepático">Perfil Completo</option>

                <?php }elseif($dato_analisis[0]->Tipo=="Perfil Renal"){
                ?>

                  <option value="Hemograma Completo">Hemograma Completo</option>    
                  <option value="Urianálisis">Urianálisis</option>
                  <option value="Perfil Hepático">Perfil Hepático</option>
                  <option value="Perfil Renal"selected>Perfil Renal</option>
                  <option value="Perfil Hepático">Perfil Completo</option>

                  <?php }elseif($dato_analisis[0]->Tipo=="Perfil Completo"){
                ?>

                  <option value="Hemograma Completo">Hemograma Completo</option>    
                  <option value="Urianálisis">Urianálisis</option>
                  <option value="Perfil Hepático">Perfil Hepático</option>
                  <option value="Perfil Renal">Perfil Renal</option>
                  <option value="Perfil Hepático"selected>Perfil Completo</option>

                <?php }
                ?>

                
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion" value="<?php echo $dato_analisis[0]->Descripcion?>">
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
     