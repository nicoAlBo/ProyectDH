    <header>
      <div class="head-contenedor">
      <div class="head">
        <h1>Good Job</h1>
        <input id="act" type="checkbox" name="act" value="">
        <label for="act">
          <img class="perfil" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt="">
        </label>
        <form class="search" action="" method="post">
          <input type="search" name="explorar" placeholder="Buscar"><img class="lupa" src="css/imagenes/lupa2.png" alt="">
        </form>
        <div class="barra-contenedor">
          <ul class="barralat">
            <li><div class="perfil-container"><img class="perfil-barralat" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt=""></div><p id="user"><?php echo $nombreDeUsuario ?></p></li>
            <li class="barra"><a href="perfil"><img src="css/imagenes/user.png" alt="">Perfil</a></li>
            <li class="barra"><a href="configuracion"><img src="css/imagenes/configuracion.png" alt="">Configuración</a></li>
            <li class="barra">
              <form class="" action="" method="post">
                <img  class="cerrar" src="css/imagenes/cerrar.png" alt="">
                <input type="submit" name="cerrar" value="Cerrar Sesión">
              </form>
              </li>
          </ul>
        </div>
        </div>
        <nav>
          <div class="nav-principal">
          <ul>
            <li><a class="navegador" href="inicio.php"><img class="nav" src="css/imagenes/inicio.png" alt="Inicio"></a></li>
            <li><a class="navegador" href="inicio.php"><img class="nav" src="css/imagenes/notificacion.png" alt="Notificaciones"></a></li>
            <li><a class="navegador" href="inicio.php"><img class="nav" src="css/imagenes/escribir.png" alt="Compartir"></a></li>
            <li><a class="navegador" href="inicio.php"><img class="nav" src="css/imagenes/mensajes.png" alt="Mensajes"></a></li>
            <li><a class="navegador" href="inicio.php"><img class="nav" src="css/imagenes/trabajo2.png" alt="Empleos"></a></li>
          </ul>
          </div>
        </nav>
        </div>
    </header>
