<?php //Porcion de codigo en el que se cierra la sesion activa ?>
<?php
  session_start();
  //Validacion: Si es administrador (1) que me permita entrar a la vista
  if ($_SESSION['us_tipo']==2) {
    // code...
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tecnico</title>
  </head>
  <body>
      <h1>Hi Technic</h1>
      <a href="../Controlador/Logout.php">Cerrar Sesion</a>
  </body>
</html>
<?php
  }
  else {
    header('Location: ../index.php');
  }
 ?>
