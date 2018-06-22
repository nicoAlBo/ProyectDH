<?php

namespace GoodJob\Modelos;
use GoodJob\Repositorio\RepositorioMysql;


class Validador
{
  private $datosPost;

  function __construct($datos)
  {

    $this->datosPost= $datos;

  }


  public function validarLogin(){

    $devolucionDeDatos =[];
    $repositorio= new RepositorioMysql;

    //Inicializo las variables con los datos que obtengo del post del login
    $usuario= trim($this->datosPost['email']);
    $pass = trim($this->datosPost['pass']);




    if ($usuario ==''){
          $devolucionDeDatos['email'] = 'Ingrese tu Email';

        }
    elseif (!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
                  $devolucionDeDatos['email']= 'Ingresa correctamente tu email';
                } elseif (!$usuario = $repositorio->existeEmail($usuario)) {

      $devolucionDeDatos['email'] = 'Tu email no fue registrado';
    } else {

        // Pregunto si coindice la password escrita con la guardada en el JSON
        if (!password_verify($pass, $usuario["pass"])) {


          $devolucionDeDatos['pass'] = "La contraseña no es correcta";
        }
    }
    return $devolucionDeDatos;


}






}





 ?>
