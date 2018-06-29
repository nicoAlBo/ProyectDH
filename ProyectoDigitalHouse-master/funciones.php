<?php
function guardaPerfil($imagen){
  if ($_FILES[$imagen]['error'] == UPLOAD_ERR_OK) {
    $nombreArchivo = $_FILES[$imagen]['name'];
    $ext = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $archivoFisico = $_FILES[$imagen]['tmp_name'];
    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'JPG') {
    $dondeEstoyParado = dirname(__FILE__);
    $rutaFinalConNombre = $dondeEstoyParado . '/img/'. $_POST['email'] . '.' . $ext;
    $ruta = 'img/' . $_POST['email'] . '.' . $ext;
    move_uploaded_file($archivoFisico, $rutaFinalConNombre);
    return $ruta;
    }
  }
}

  ?>
