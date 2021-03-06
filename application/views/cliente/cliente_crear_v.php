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
              <input validate="texto" type="text" class="form-control" name="Nombre" placeholder="Nombres" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Paterno</label>
              <input validate="texto" type="text" class="form-control" name="ApePat" placeholder="Apellido Paterno" maxlength="15">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido Materno</label>
              <input validate="texto" type="text" class="form-control" name="ApeMat" placeholder="Apellido Materno" maxlength="15">
            </div>

            
            <div class="form-group col-md-6">
              <div class="row">

                <div class="col-md-4 form-group">
                <label>Tipo Doc</label>
                  <select  class="form-control" id="select_doc">
                      <option>DNI</option>
                      <option>RUC</option>
                  </select></div>
                  

                    <div class="col-md-8 form-group" id="dni_espacio">
                      <!--<label>DNI</label>
                      <input validate="number" type="text" class="form-control" name="DNI" maxlength="8" placeholder="DNI">-->

                    </div>
                    <!--<div class="col-md-8 form-group" id="ruc_espacio">-->
                      <!--<label>RUC</label>
                      <input validate="number" type="text" class="form-control" name="RUC" placeholder="RUC">-->

                    <!--</div>-->
            </div>
            </div>

            <div class="form-group col-md-6">
              <label>Tipo Cliente</label>
              <select validate="seleccionar" class="form-control" id="Estado" name="Estado">
                <option>--seleccionar--</option>
                <option>Fiable</option>
                <option>No fiable</option>

             </select>
            </div>
            

            <div class="form-group col-md-6">
              <label>Ciudad</label>
              <input validate="texto" type="text" class="form-control" name="Ciudad" placeholder="Ciudad" maxlength="15"> 
            </div>
            <div class="form-group col-md-6">
              <label>Dirección</label>
              <input validate="direccion" type="text" class="form-control" name="Direccion" placeholder="Direccion" maxlength="25">
            </div>
            <div class="form-group col-md-6">
              <label>Telefono</label>
              <input validate="" type="text" class="form-control" name="Telefono" placeholder="Telefono" maxlength="9">
            </div>

            
            <div class="form-group col-md-3">
              <label>Celular</label>
              <input validate="" type="text" class="form-control" name="Celular" placeholder="Celular" maxlength="9">
            </div>

            <div class="form-group col-md-3">
              <label>Operador</label>
              <select validate="" class="form-control" id="Operador" name="Operador">
                <option>--seleccionar--</option>
                <option >Rpm</option>
                <option>Movistar</option>
                <option>Rpc</option>
                <option>Claro</option>
                <option>Bitel</option>
                <option>Entel</option>
                <option>Virgin</option>
             </select>
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
  // var ruc_espacio = document.getElementById("ruc_espacio");
  var dni_espacio = document.getElementById("dni_espacio");
  dni_espacio.innerHTML=`<label>DNI</label>
                              <input validate="number" type="text" class="form-control" name="DNI" placeholder="DNI" maxlength="8">`
  select_doc.onchange=function(e){
      if(e.target.value == "DNI"){
        dni_espacio.innerHTML=`<label>DNI</label>
                              <input validate="number" type="text" class="form-control" name="DNI" placeholder="DNI" maxlength="8">`
      }else if(e.target.value == "RUC"){
        dni_espacio.innerHTML=`<label>RUC</label>
                              <input validate="number" type="text" class="form-control" name="RUC" placeholder="RUC" maxlength="11">`
      }
   };

</script>
  


<script src="<?php echo base_url('public/main.js'); ?>"></script>
<?php  $this->load->view('layouts/footer.php');     
     


