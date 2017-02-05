<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<div class="col-xs-12 col-sm-9 col-md-10 affix-content">
		<div class="container">
            <div class="page-header">
            <nav class="navbar navbar-default navbar-text navbar-right" >

                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" position='right'>
                
           

            </nav>
         <div class="panel-body">
            <form class="row" action="reportetotal" method="GET" onsubmit="return validar(this)">
            <div class="form-group col-md-6">
            </div>

            <div class="form-group col-md-4">
              <label>Fecha Nacimiento</label>
              <input validate="date" class="form-control" id="date" name="Fechareporte" placeholder="MM/DD/YYY" type="text"/>


                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="Fechareporte"]'); //our date input has the name "date"
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

            <div class="form-group col-md-1">
            
                <br><button type="submit" class="btn btn-primary ">Ver</button>

            </div>

        </div>

<div>
    
    <table class="table">
        <thead>

            <th>Codigo</th>
            <th>Fecha Realizada</th>
            <th>Ganancia</th>
            <th>Precio</th>
            

            
        </thead>
        <tbody id="eventos_table">
       
          <?php
          // die(var_dump($datos_stockpresen));
            foreach ($data_ganancia as &$dato) {
                echo "<tr>".
                "<td>". $dato->codigo."</td>".
                "<td>". $dato->fecharealizada ."</td>".
                "<td>". $dato->ganancia ."</td>".
                "<td>". $dato->precio ."</td>".
                "</tr>";
            }
        ?> 


 </tbody>
    </table>
</div>
   





            <div class="page-header">
            <nav class="navbar navbar-default navbar-text navbar-right" >

                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" position='right'>
                
           

            </nav>
         <div class="panel-body">
            <form class="row" action="reportetotal" method="GET" onsubmit="return validar(this)">
            <div class="form-group col-md-6">
            </div>

        </div>


     <table class="table">
        <thead>

            <th>Codigo</th>
            <th>Nombre</th>
            <th>Fecha Realizada</th>
            <th>Perdida</th>

            

            
        </thead>
        <tbody id="eventos_table">
       
          <?php
          // die(var_dump($datos_stockpresen));
            foreach ($data_perdida as &$dato) {
                echo "<tr>".
                "<td>". $dato->codigo."</td>".
                "<td>". $dato->nombre."</td>".
                "<td>". $dato->fecha ."</td>".
                "<td>". $dato->perdida ."</td>".
                "</tr>";
            }
        ?> 


 </tbody>
    </table>


<div>
    
    <table class="table">
        <thead>


            <th>Ganancia Total</th>
            <th>Precio Total</th>


            
        </thead>
        <tbody id="eventos_table">
       
          <?php
          // die(var_dump($datos_stockpresen));
            // foreach ($datos_reportes as &$dato) {


                echo "<tr>".
                "<td>". $acum2."</td>".
                "<td>". $resta."</td>".

                "</tr>";
            
        ?> 


 </tbody>
    </table>
</div>


</div>
</div>
</div>

</div>
<div class="modal_fondo" id="modal_completo">
    <div class="modal_aviso">
        <h3 id="put_aviso"></h3>
        <p id="put_nombre"> </p>
        <a tipo="eliminar" id="put_href" href="#" class="btn btn-danger">SI</a>
        <a tipo="salir" class="btn btn-default">No</a>
    </div>
</div>

    <script src="<?php echo base_url('public/main.js'); ?>"></script>
    
<?php  $this->load->view('layouts/footer.php');?>       
     