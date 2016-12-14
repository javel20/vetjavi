<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
            <div class="page-header">
            <nav class="navbar navbar-default navbar-text navbar-right" >

                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" position='right'>
                
                <form class="navbar-form navbar-left"
                        action="<?php echo base_url('index.php/compra/search'); ?>"  
                        method="GET">
                    <div class="input-group">
                
                <div class="input-group-btn">
                    <button type="button" 
                            id="dato_a_buscar"
                            class="btn btn-default dropdown-toggle" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false"><?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_dato') : 'Nombre';?> <span class="caret"></span>
                    </button> 
                    <ul class="dropdown-menu" id="menu_a_buscar">
                    <li><a href="#" dato="CodC">Codigo </a></li>
                    <li><a href="#" dato="Fecha">Fecha </a></li>
                    <li><a href="#" dato="TipoC">Tipo de compra</a></li>
            
            
                    </ul>
                </div><!-- /btn-group -->
                <input type="text" class="form-control" placeholder="Search" name="nombre_buscar">
                </div><!-- /input-group -->
                    <input type="hidden" id="tipo_dato" name="tipo_dato" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('tipo_dato') : 'Nombre';?>">
                    <input type="hidden" id="nombre_dato" name="nombre_dato" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_dato') : 'Nombre';?>">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
                
                </div><!-- /.navbar-collapse -->

            </nav>



<div>
    
    <table class="table">
        <thead>
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Tipo de compra</th>
            <th>Descripicion</th>
            <th>Proveedor</th>
            <th>Option</th>
         
         
        </thead>
        <tbody id="eventos_table">
        
        <?php
        
            foreach ($datos_compra as &$dato) {
          echo "<tr >".

                "<td>". $dato->CodC ."</td>".
                "<td>". $dato->Fecha ."</td>".
                "<td>". $dato->TipoC ."</td>".
                "<td>". $dato->Descripcion."</td>".
                "<td>". $dato->NombreProv."</td>".
                "<td> <div class='dropdown'>
                    <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Acciones
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu' aria-labelledby='dLabel'>


                        <li><a  dato_modal='dato_eliminar'
                                aviso='Desea eliminar a:'
                                nombre_data='". $dato->CodC  ."'
                                url_data=". base_url("index.php/compra/delete/$dato->IdCompra") .">Eliminar</a></li>
                        <li><a href=". base_url("index.php/compra/edit/$dato->IdCompra") .">Editar</a></li>
                        <li><a href=". base_url("index.php/compra/detalle/$dato->IdCompra") .">Detalle</a></li>

                    </ul>
                    </div></td>".
                "</tr>";
            }
        ?>  </tbody>
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
     