<div class="">
    <div class="col-sm-3 col-md-2">
		<div class="sidebar-nav menucontorno">
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Control Panel</span>
    </div>
    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <ul class="nav navbar-nav" id="sidenav01">
        <li class="active">
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed menu">
            <h4> Control Panel</h4>
          </a>
         
        </li>

        <?php foreach($_SESSION['Permisos'] as $perm){ ?>
        
       <?php if($perm->IdPermisos == 3){?>
       <li> 
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Cliente <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/cliente/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/cliente">Listado</a></li>
              
            </ul>
          </div>
        </li>
       <?php } ?>

        <?php if($perm->IdPermisos == 7){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Paciente <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo2" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/paciente/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/paciente">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 12){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Tipo Cita <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo3" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/tipocita/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/tipocita">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 3){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo4" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-plane"></span> Cita <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo4" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/cita/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/cita/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 5){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo5" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Diagnostico <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo5" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/diagnostico/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/diagnostico">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 1){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo6" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Analisis <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo6" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/analisis/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/analisis">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 8){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo7" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-tags"></span> Producto <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo7" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/producto/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/producto/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 13){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo8" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Tipo Producto <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo8" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/tipoproducto/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/tipoproducto/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 11){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo9" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-sort"></span> Stock-Presentacion <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo9" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/stockpresen/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/stockpresen/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 4){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo10" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-lock"></span> Compra <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo10" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/compra/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/compra/">Listado - Detalle</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

      <?php if($perm->IdPermisos == 16){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo11" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-lock"></span> Venta <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo11" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/venta/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/venta/">Listado - Detalle</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 15){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo12" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-user"></span> Trabajador <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo12" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/trabajador/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/trabajador/">Listado - Detalle</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 14){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo13" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-chevron-right"></span> Tipo Trabajador <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo13" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/tipotrab/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/tipotrab/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>


        <?php if($perm->IdPermisos == 6){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo14" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-home"></span> Local <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo14" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/local/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/local/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 9){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo15" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-calendar"></span> Proveedor <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo15" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/proveedor/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/proveedor/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

        <?php if($perm->IdPermisos == 10){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo16" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-calendar"></span> Reportes <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo16" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/reportes/reportetotal">Diario</a></li>
              <li><a href="#"></a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>

         <?php if($perm->IdPermisos == 17){?>
        <li>
          <a href="" onclick="return false;" data-toggle="collapse" data-target="#toggleDemo17" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-calendar"></span> Cirugia <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo17" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="/vetjavi/index.php/cirugia/create">Crear</a></li>
              <li><a href="/vetjavi/index.php/cirugia/">Listado</a></li>
              
            </ul>
          </div>
        </li>
        <?php } ?>


        <?php } ?>
        

        <!--<li class="active"><a href=""><span class="glyphicon glyphicon-cog"></span> Administrador</a></li>-->
      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
	</div>
