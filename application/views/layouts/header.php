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

      <a class="navbar-brand" href="#">Amigo del Criador</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION)): ?>
              <li><a href="#">Usuario</a></li>
                
              <li><a href="#">Cambiar Usuario</a></li>

          <?php else: ?>

              <li><a href="#">Registrarse</a></li>
              <li <?php if(isset($active ) && $active == 'login'){ echo 'class="active"'; }?> ><a href=" <?php echo base_url(); ?>index.php/trabajador/login ">Login</a></li>
          <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
  </div>
</nav>
    </header>