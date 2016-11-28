<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>


	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
      <div class="page-header">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar Cliente</h3>
          </div>
          <div class="panel-body">
            <form class="row" action="store" method="POST" onsubmit="return validar(this);">
            <div class="form-group col-md-6">
              <label>Nombres</label>
              <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Paterno</label>
              <input validate="number" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Materno</label>
              <input validate="number" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno">
            </div>


            <div class="form-group col-md-6">
              <div class="row">

                <div class="col-md-4 form-group">
                <label>Tipo Doc</label>
                  <select validate="seleccionar" class="form-control" id="select_doc">
                      <option>DNI</option>
                      <option>RUC</option>
                  </select></div>
                  

                    <div class="col-md-8 form-group" id="dni_espacio">
                      <label>DNI</label>
                      <input validate="number" type="text" class="form-control" name="DNI" placeholder="DNI">

                    </div>
                    <div class="col-md-8 form-group" id="ruc_espacio">
                      <label>RUC</label>
                      <input validate="number" type="text" class="form-control" name="RUC" placeholder="RUC">

                    </div>
            </div>
            </div>

            <div class="form-group col-md-6">
              <label>Ciudad</label>
              <input validate="texto" type="text" class="form-control" name="Ciudad" placeholder="Ciudad">
            </div>
            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input validate="direccion" type="text" class="form-control" name="Direccion" placeholder="Direccion">
            </div>
            <div class="form-group col-md-6">
              <label>telefono</label>
              <input validate="number" type="text" class="form-control" name="Telefono" placeholder="Telefono">
            </div>
            <div class="form-group col-md-6">
              <label>Celular</label>
              <input validate="number" type="text" class="form-control" name="Celular" placeholder="Celular">
            </div>
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


<script>

  var select_doc = document.getElementById("select_doc");
  var ruc_espacio = document.getElementById("ruc_espacio");
  var dni_espacio = document.getElementById("dni_espacio");

  select_doc.onchange=function(e){
      if(e.target.value == "RUC"){
        ruc_espacio.style.display = "block";
        dni_espacio.style.display = "none";
      }else{
      ruc_espacio.style.display = "none";   
        dni_espacio.style.display = "block";
      }
   };

</script>



<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');     
     


