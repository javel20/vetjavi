<?php  $this->load->view('layouts/header');?>
<?php  $this->load->view('layouts/tablero');?>

<table class='MiTabla MiTablaFija'>
    <br><br><br><br><br><br><br>
    <tr>

        <?php
          //  die(var_dump($datos_trabajador));
            foreach ($dato_comprador as &$dato){
                echo "<tr>".
                "<td class='td0'> </td>".
                "<td>". $dato->Nombre  . " ".$dato->ApePat. " ".$dato->ApeMat. "</td>".
                "<td class='td0'> </td>". 
                "<td class='fecha'>" .date("d"). " - " .date("m"). " - ".date("y"). "</td>".

                "</tr>";
            }

            foreach ($dato_comprador as &$dato){
                echo "<tr>".
                "<td class='td0'> </td>".
                "<td>". $dato->Direccion ."</td>".
                "<td class='td0'> </td>".
                "<td class='fecha'>" .$dato->DNI. "</td>".

                "</tr>";
            }


        ?>  

        </tr>

</table>
<table class='MiTabla MiTablaFija2'>
    <br>

        
        <?php
          //  die(var_dump($datos_trabajador));
            foreach ($datos_productos as &$dato){
                echo "<tr>".
                "<td class='td0'> </td>".
                "<td class='td1'>". $dato->Cantidad ."</td>".
                "<td class='td2'>". $dato->NombreP ." ". $dato->Presentacion ."</td>".
                "<td class='td1'>". $dato->PrecioTotal ."</td>".
                "<td class='td1'>". $dato->Preciot ."</td>".

                "</tr>";
            }
        ?>  </tbody>
    </table>
</div>
   

</div>
</div>
</div>
   

<table class='MiTabla MiTablaFija'>

    <tr>

        <?php
          //  die(var_dump($datos_trabajador));
            foreach ($dato_comprador as &$dato){
                echo "<tr>".
                "<td> </td>".
                "<td> </td>".
                "<td> </td>".
                "<td> </td>".
                "<td> </td>".
                "<td> </td>".
                "<td> </td>".

                
                "<td>". number_format($dato->PrecioTotalVenta,2,'.','')  ."</td>".
    
                "</tr>";
            }
        ?>  
        </tr>

</table>



    <script src="<?php echo base_url('public/main.js'); ?>"></script>

<?php  $this->load->view('layouts/footer.php');?>       
     