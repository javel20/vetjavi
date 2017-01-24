<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
            <div class="page-header">
            


<div>
    
    <table class="table">
        <thead>
            <th>Producto</th>
            <th>Presentacion</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
        </thead>
        <tbody id="eventos_table">
        
        <?php
          //  die(var_dump($datos_trabajador));
            foreach ($datos_detalle as &$dato){
                echo "<tr>".
                "<td>". $dato->nompro  ."</td>".
                "<td>". $dato->Presentacion ."</td>".
                "<td>". $dato->Cantidad ."</td>".
                "<td>". $dato->PrecioTotal ."</td>".

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
     