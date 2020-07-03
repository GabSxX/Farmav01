<?php
//Cerrar Sesion
session_start();
session_destroy();
header('Location: ../Cliente/index.html');
 ?>
