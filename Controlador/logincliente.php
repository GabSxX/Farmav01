<?php
include_once '../modelo/usuario.php';
//sesion de cliente
session_start();
$PER_USERNAME = $_POST['PER_USERNAME'];
$PER_PASSWORD = $_POST['PER_PASSWORD'];
$usuario = new Usuario();
$usuario->Logueo_cliente($PER_USERNAME,$PER_PASSWORD);

if (!empty($_SESSION['autom'])) {
  
    switch ($_SESSION['autom']) {
      case 1:
        header('Location: ../Cliente/perfil.php');
        break;
      }
  }
else{
  $usuario->Logueo_cliente($PER_USERNAME,$PER_PASSWORD);
if(!empty($usuario->objetos)){
  foreach ($usuario->objetos as $objeto) {
    $_SESSION['PER_USERNAME']=$objeto->PER_ID_PERSONA;
    $_SESSION['autom']=$objeto->autom;
    $_SESSION['PER_NOMBRE']=$objeto->PER_NOMBRE;
  }

  switch ($_SESSION['autom']) {
    case 1:
      header('Location: ../Cliente/perfil.php');
      break;
    }
  }
  else {
    header('Location: ../Cliente/login.php');
  }
}

?>

