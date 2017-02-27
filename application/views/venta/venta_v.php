<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

	<div class="col-xs-12 col-sm-9 col-md-10 affix-content">
		<div class="container">
            <div class="page-header">
            <nav class="navbar navbar-default navbar-text navbar-right" >

                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" position='right'>
                
                <form class="navbar-form navbar-left"
                        action="<?php echo base_url('index.php/venta/search'); ?>"  
                        method="GET">
                    <div class="input-group">
                
                <div class="input-group-btn">
                    <button type="button" 
                            id="dato_a_buscar"
                            class="btn btn-default dropdown-toggle" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false"><?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_dato') : 'Codigo';?> <span class="caret"></span>
                    </button> 
                    <ul class="dropdown-menu" id="menu_a_buscar">
                    <li><a href="#" dato="CodV">Codigo </a></li>
                    <li><a href="#" dato="Fecha">Fecha </a></li>
                    <li><a href="#" dato="TipoV">Tipo </a></li>
                  
            
            
                    </ul>
                </div><!-- /btn-group -->
                <input type="text" class="form-control" placeholder="Search" name="nombre_buscar" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_buscar') : '';?>">
                </div><!-- /input-group -->
                    <input type="hidden" id="tipo_dato" name="tipo_dato" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('tipo_dato') : 'CodV';?>">
                    <input type="hidden" id="nombre_dato" name="nombre_dato" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_dato') : 'CodV';?>">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
                
                </div><!-- /.navbar-collapse -->

            </nav>



<div>
    
    <table class="table">
        <thead>
            <th>Codigo</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Descripicion</th>
            <th>Precio Total Venta</th>
            <th>Registrador</th>
            <th>Option</th>
         
         
        </thead>
        <tbody id="eventos_table">
        
        <?php
        
            foreach ($datos_venta as &$dato) {
          echo "<tr >".

                "<td>". $dato->CodV ."</td>".
                "<td>". $dato->Nombre ." ".$dato->ApePat." ".$dato->ApeMat. "</td>".
                "<td>". $dato->Fecha ."</td>".
                "<td>". $dato->TipoV ."</td>".
                "<td>". $dato->Descripcion."</td>".
                "<td>". number_format($dato->PrecioTotalVenta,2,'.','')."</td>".
                "<td>". $dato->NombreT ." ". $dato->apepattra ." ". $dato->apemattra . "</td>".
                "<td> <div class='dropdown'>
                    <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Acciones
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu' aria-labelledby='dLabel'>


                        <li><a  dato_modal='dato_eliminar'
                                aviso='Desea eliminar a:'
                                nombre_data='". $dato->CodV  ."'
                                url_data=". base_url("index.php/venta/delete/$dato->IdVenta") .">Eliminar</a></li>
                        <li><a href=". base_url("index.php/venta/edit/$dato->IdVenta") .">Editar</a></li>
                        <li><a href=". base_url("index.php/venta/detalle/$dato->IdVenta") .">Detalle</a></li>
                        <li><a href=". base_url("index.php/venta/comprobante/$dato->IdVenta") .">Comprobante</a></li>

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
       <center>
        <?php echo $this->pagination->create_links();?>
    </center>
<?php  $this->load->view('layouts/footer.php');?>       
     