<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
            <div class="page-header">

                <form class="navbar-form navbar-left">
                <br>  
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" position='left'>
                        
                        <a class="otromas" href="/vetjavi/index.php/cliente/create">
                            <button type="button" class="btn btn-primary">Agregar cliente</button>
                        </a>
                    </div>
                </form>


            <nav class="navbar navbar-default navbar-text navbar-right" >

                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" position='right'>
                
                <form class="navbar-form navbar-left"
                        action="<?php echo base_url('index.php/cliente/search'); ?>"  
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
                    <li><a href="#" dato="Nombre">Nombre </a></li>
                    <li><a href="#" dato="DNI"|| dato="RUC">DNI/RUC </a></li>
                    <li><a href="#" dato="Ciudad">Ciudad </a></li>
            
            
                    </ul>
                </div><!-- /btn-group -->
                <input type="text" class="form-control" placeholder="Search" name="nombre_buscar" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_buscar') : '';?>">
                </div><!-- /input-group -->
                    <input type="hidden" id="tipo_dato" name="tipo_dato" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('tipo_dato') : 'Nombre';?>">
                    <input type="hidden" id="nombre_dato" name="nombre_dato" value="<?php echo $this->input->get('nombre_dato') ? $this->input->get('nombre_dato') : 'Nombre';?>">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
                
                </div><!-- /.navbar-collapse -->

            </nav>



<div>
    
    <table class="table container">
        <thead>
            <th>Nombres</th>
            <th>DNI/RUC</th>
            <th>Tipo Cliente</th>
            <th>Ciudad</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Operador</th>
            <th>Option</th>
        </thead>
        <tbody id="eventos_table">
        
        <?php
        
            foreach ($datos_cliente as &$dato) {
                echo "<tr class='estado_" . $dato->Estado ."'>".
                "<td>". $dato->Nombre ." " .$dato->ApePat. " " . $dato->ApeMat  ."</td>".
                "<td>". $dato->DNI ." ". $dato->RUC ."</td>".
                "<td>". $dato->Estado ."</td>".
                "<td>". $dato->Ciudad ."</td>".
                "<td>". $dato->Direccion ."</td>".
                "<td>". $dato->Telefono ."</td>".
                "<td>". $dato->Celular ."</td>".
                "<td>". $dato->Operador ."</td>".
                "<td> <div class='dropdown'>
                    <button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Acciones
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu' aria-labelledby='dLabel'>

                        <li><a  dato_modal='dato_eliminar'
                                id='desactivar_enlace'
                                aviso='Desea desactivar a:'
                                nombre_data='". $dato->Nombre ."'
                                url_data=". base_url("index.php/cliente/deactivate/$dato->IdCliente") .">Desactivar</a></li>
                        
                         <li><a dato_modal='dato_eliminar'
                                id='activar_enlace'
                                aviso='Desea activar a:'
                                nombre_data='". $dato->Nombre  ."'
                                url_data=". base_url("index.php/cliente/activate/$dato->IdCliente") .">Activar</a></li>


                        <li><a  dato_modal='dato_eliminar'
                                aviso='Desea eliminar a:'
                                nombre_data='". $dato->Nombre  ."'
                                url_data=". base_url("index.php/cliente/delete/$dato->IdCliente") .">Eliminar</a></li>
                        <li><a href=". base_url("index.php/cliente/edit/$dato->IdCliente") .">Editar</a></li>

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
     <center>
        <?php echo $this->pagination->create_links();?>
    </center>
<?php  $this->load->view('layouts/footer.php');?>       
     