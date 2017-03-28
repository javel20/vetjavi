<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width", user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0>
    <link rel="stylesheet" href="<?php echo base_url('public/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/estilos.css'); ?>"/>
    <script src="<?php echo base_url('public/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('public/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
 
    
 
</head>
<body>
    <header class="header_top">

      <nav class="navbar navbar-default head">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <h4>Amigo del Criador</h4>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['Email'])): ?>

              <li class="campana"><a id="campana" href="">
              
              <?php if(count($_SESSION['StockMin'])>0 || count($_SESSION['FechaVen'])>0){ ?>
                    <span style=" color:red " class="glyphicon glyphicon-bell"></span></a>
              <?php }else{ ?>
                    <span style=" color:white " class="glyphicon glyphicon-bell"></span></a> 
              <?php   } ?>
                <ul class="lista" id="lista">


                    <?php foreach($_SESSION['StockMin'] as $sm){
                  
                      
                      echo "<li><option value=" .$sm->StockMin .">". $sm->NombreP ." le queda ".$sm->StockReal." unidades</option></li>";

                    
                    } ?>
                    
                    <?php foreach($_SESSION['FechaVen'] as $fv){
                  
                      
                      echo "<li><option value=" .$fv->FechaVen .">". $fv->Cantidad ." ". $fv->nombrepro ." de ". $fv->Presentacion ." vence el dia  ".$fv->FechaVen." </option></li>";

                    
                    } ?>
                   

                  </ul>
              </li>

              <li class="correo"><?php echo $_SESSION['Email'];?></li>

                
              <li class="logout"><a href="<?php echo base_url(); ?>index.php/login/logout">LogOut</a></li>


<script>

  $campana = document.getElementById("campana");
  $lista = document.getElementById("lista");

  $campana.onclick = function(e){ //e objeto
    e.preventDefault(); //para que no cargue la pagina 


      if($lista.style.display == "block"){

        $lista.style.display = "none";
      }
      else
      {

        $lista.style.display = "block"
      }


  }

</script>


          <?php else: ?>

             
          <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
  </div>
</nav>
    </header>