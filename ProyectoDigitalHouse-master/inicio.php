<?php
require_once('tools.php');


if (!verificarLogueo()){
    header('Location:login.php');
    exit;
}



$email= $_SESSION['email'];
$nombreDeUsuario = obtenerNombreDeUsuario($email);
$nombreDeUsuario= $nombreDeUsuario['usuario'] ;


$email= $_SESSION['email'];
$nombreDeProfile = obtenerNombreDeUsuario($email);
$nombreDeProfile= 'img/'.$nombreDeProfile['profile'];


if(isset($_POST['cerrar'])){
    session_destroy();
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/iniciostyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Inicio</title>
  </head>
  <body>
<?php include('encabezado.php'); ?>
    <div class="main-container">
    <aside class="seetings">
      <div class="left-container">
      <div class="barra-aside">
        <ul>
          <div class="barraSide">
            <img class="usuario" src="<?php echo $nombreDeProfile?>" alt="">
          </div>
            <p class="nombre-usuario"><?php echo $nombreDeUsuario ?></p>
          <li class="barra"><a href="#"><img src="css/imagenes/user.png" alt="">Perfil</a></li>
          <li class="barra"><a href="#"><img src="css/imagenes/configuracion.png" alt="">Configuración</a></li>
          <li class="barra">
            <form class="" action="" method="post">
              <img  class="cerrar" src="css/imagenes/cerrar.png" alt="">
              <input type="submit" name="cerrar" value="Cerrar Sesión">
              </form>
            </li>
        </div>
        </ul>
      </div>
    </aside>
    <section>
      <div class="container">
          <?php for($i=0; $i <= 3; $i++) {
          echo ' <article class="publi-inicio">
                    <div class="id-user-amigo">
                      <div class="perfil-container"><img class="perfil-barralat" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt=""></div><p id="user-amigo">Nombre de Amigo</p>
                    </div>
                    <div class="img-amigos">
                      <img class="" src="css/imagenes/elefantes.jpg" alt="">
                      </div>
                    <div class="publi-amigos">
                      <a href="#"><img src="css/imagenes/megusta.png" alt=""></a>
                      <a href="#"><img src="css/imagenes/comentario.png" alt=""></a>
                      <a href="#"><img src="css/imagenes/compartir.png" alt=""></a>
                    </div>
                    <div class="comentarios">
                      <form action="index.html" method="post">
                        <input class="coment" type="text" name="" value="Escribí un comentario">
                      </form>
                    </div>
                  </article>';
          }; ?>
        </div>

    </section>
    <aside>
      <div class="right-container">
      <div class="publicar">
        <form class="trabajo" action="index.html" method="post">
          <input class="publica" type="text" name="" placeholder="Mostrá tu trabajo">
          <img class="compartir" src="css/imagenes/escribir.png" alt="Compartir">
        </form>
      </div>
    </div>
    </aside>
    </div>
  </body>
</html>
