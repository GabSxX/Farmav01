<?php
//Cerrar Sesion
session_start();
session_destroy();
header('Location: ../index.php');
 ?>
