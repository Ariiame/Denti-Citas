<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="./inicio.php">Tablero Administrativo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <button class="btn btn-primary ml-1 mr-1" onclick="location.href = '<?php echo $url_base; ?>admin/inicio.php';" > <i class="fas fa-home"></i> Inicio</button>
      <button class="btn btn-primary ml-1 mr-1" onclick="location.href = '<?php echo $url_base; ?>admin/cambiarPassword.php';" > <i class="fas fa-key"></i> Cambio de Contraseña</button>
      <button class="btn btn-primary ml-1 mr-1" onclick="location.href = '<?php echo $url_base; ?>admin/registro.php';" > <i class="fas fa-user"></i> Nuevo Usuario</button>
      <button class="btn btn-danger ml-1 mr-1" onclick="location.href = '<?php echo $url_base; ?>admin/metodos/cerrar_sesion.php';" > <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
      <a class="nav-item nav-link disabled" style="color:white">Bienvenido, <?php echo $nombreUsuario; ?>!</a>
    </div>
  </div>
</nav>