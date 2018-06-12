<?php
$mensaje=$mensajeError='';
$dsn = 'mysql:host=127.0.0.1';
$db_user='root';
$db_pass='root';

$opt= [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try{
    $db= new PDO($dsn,$db_user,$db_pass,$opt);


  $query= $db -> query('drop database if exists GoodJob;');


    //$query= $db -> query('create database GoodJob;');

    $query = $db -> query('use GoodJob;');

    $query= $db -> query('create table usuarios(
		                          id int primary key auto_increment not null,
                              nombre Varchar(50) not null,
                              apellido Varchar(50) not null,
                              usuario Varchar(50) unique not null,
                              email varchar(100) unique not null,
                              pass varchar(100) not null,
                              fecha date ,
                              avatar varchar(200)
                            );');

$mesaje = '<div>
  Todo Piola
  <img src= https://cdn.memegenerator.es/imagenes/memes/full/4/94/4943679.jpg>
</div>';
}
  catch (PDOException $e) {
  $mensajeError='<div>'.'Error en PDO ->'.$e->getMessage().'</div>';
    }
  catch (Exception $e) {
  $mensajeError='<div>'. 'Error en PHP ->'.$e->getMessage().'</div>';
    }

if($mensajeError){
  echo $mensajeError;
}else {
  echo $mensaje;
}




?>
