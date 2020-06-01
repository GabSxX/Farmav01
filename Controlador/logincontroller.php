<?php
include_once '../modelo/usuario.php';
//sesion de usuario
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$usuario = new Usuario();
//Pedazo de codigo que inteviene en lo que se refiere a la persistencia de inicio de sesion

if (!empty($_SESSION['us_tipo'])) {
  switch ($_SESSION['us_tipo']) {
    case 1:
      header('Location: ../vista/adm_catalogo.php');
      break;

      case 2:
      header('Location: ../vista/tec_catalogo.php');
      break;
    }
}

  else {
  $usuario->Loguearse($user,$pass);

    //Determinar el Nivel del usuario (Adm. o Tec.)
    //!empty verifico si una variable esta vacia (si es asi vuelve al login)
  if(!empty($usuario->objetos)){
    foreach ($usuario->objetos as $objeto) {
      //variables de sesion (columnas de BD)
      $_SESSION['usuario']=$objeto->id_usuario;
      $_SESSION['us_tipo']=$objeto->us_tipo;
      $_SESSION['nombre_us']=$objeto->nombre_us;
    }
    //se verifica que tipo de usuario inicio sesion y se redirecciona a la vista indicada
    switch ($_SESSION['us_tipo']) {
      case 1:
        header('Location: ../vista/adm_catalogo.php');
        break;

        case 2:
        header('Location: ../vista/tec_catalogo.php');
        break;
      }
    }
    else {
      header('Location: ../index.php');
    }
}

?>
