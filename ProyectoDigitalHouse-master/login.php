<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <title>Ingresar a GJ</title>
  </head>
  <body>
<div class="transparencia">
<header>

  <header>
    <div class="headcont">

    <a href="index.php" target="_blank"><img class="arrow" src="css/imagenes/arrow.png" alt=""></a>
    <h3>Ingresar</h3>
    </div>

  </header>
</header>


    <form class="usuario" action="">
  <div class="imgcontainer">
    <img src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Usuario:</b></label>
    <input type="text" placeholder="" name="uname" required>

    <label for="psw"><b>Contraseña:</b></label>
    <input type="password" placeholder="" name="psw" required>

    <button type="submit">Cargar</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Recordarme
    </label>
  </div>

  <div class="container" style="background-color: rgba(0,0,0,0.5) ">
    <span ><a class="psw" href="contraseña.php">¿Te olvidaste la contraseña?</a></span>
  </div>
</form>

</div>
  </body>
</html>
