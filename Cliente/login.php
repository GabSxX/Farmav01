<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Farma-Fast</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" tipe="text/css"href="../css/Style.css">
    <link rel="stylesheet" tipe="text/css"href="../css/css/all.min.css">
    <script src="https://kit.fontawesome.com/a8a5a12063.js" crossorigin="anonymous"></script>
    
  </head>

  <?php
  
  //=============================================================================================================//
   //algoritmo el cual permite mantener la sesion iniciada, incluso volviendo a la pagina anterior
   session_start();
   if (!empty($_SESSION['autom'])) {
       header('Location: ../Controlador/logincliente.php');
   }
   else {
     //en caso de existir alguna sesion la cierra para que no existan problemas
   session_destroy();
     //todo el bloque de codigo cierra abajo
  //=============================================================================================================//
  
   ?>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span> 
    </div>
  </div>


  <div class="container" style="max-width: 540px;">
    <!--Inicio de sesión-->
    <form class="border border-light p-5" action="../Controlador/logincliente.php" method="post">
        <p class="h4 mb-4 text-center">Iniciar Sesión</p>
        <input type="text" name="PER_USERNAME" class="form-control mb-4" placeholder="Usuario">
        <input type="password" name="PER_PASSWORD" class="form-control mb-4" placeholder="Contraseña">
        <div class="d-flex justify-content-between">
            <div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Recuérdame</label>
                </div>
            </div>
            <div>
                <a href="" data-toggle="modal" data-target="#recuperarContraseña">¿Se te olvidó tu contraseña?</a>
            </div>
        </div>
                <div>
                <input type="submit" class="btn" value="Iniciar">
                </div>
        <div class="text-center">
            <p>¿No eres miembro?
                <a href="" data-toggle="modal" data-target="#resgistrarse">Regístrate</a>
            </p>
        </div>
    </form>

  <!--Registrarse-->
       <div class="modal fade" id="resgistrarse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Registrate</h3>
        <button data-dismiss="modal" aria-label="close" class="close">
          <span aira-hidden="true">&times;</span>
        </button>
        </div>
    <div class="card-body">

      <div class="alert alert-success text-center" id="add" style='display:none;'>
        <span><i class="fas fa-check m-1"></i>Registrado Correctamente</span>
      </div>
      <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
             <span><i class="fas fa-times m-1"></i>Este Usuario ya Existe!!!</span>
      </div>
      
      <form id="cliente">
        <div class="modal-body mx-3">
        <div class="form-group">   
          <input type="text"  class="form-control"  id="PER_NOMBRE" placeholder="Nombre" required="">
        </div>
        <div class="form-group">
         <input type="text" class="form-control" id="PER_APELLIDO" placeholder="Apellido" required="">
        </div>
        <div class="form-group">
         <input type="date" class="form-control" id="PER_FECHA_NACIMIENTO" placeholder="Fecha de nacimiento" required="">
        </div>
         <div class="form-group">
         <input type="email"  class="form-control" id="PER_EMAIL" placeholder="Email" required="">
        </div>
         <div class="form-group">
         <input type="text"  class="form-control" id="PER_USERNAME" placeholder="Usuario" required="">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="PER_PASSWORD" placeholder="Contraseña"  required="">  
        </div>
        <div class="form-group">
        <input type="hidden" id="autom" value="1">
        </div>
        <!-- 
        <div class="md-form mb-4">
          <input type="password" id="defaultRegisterFormConfirmarContraseña" name="password2" class="form-control" placeholder="Confirmar contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock"> 
        </div>
        -->
      </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary" style="width: 300px;">Guardar</button>
          <button type="button" data-dismiss="modal" class="btn btn-primary m-1" style="width: 300px;">Cerrar</button>
      </form>
      </div>
    </div>
    <?php 
/*
      //se verifica que el usuario haya ingresado texto en el formulario
      if (isset($_POST['nombre']) && isset($_POST['apellido']) && 
         isset($_POST['nacimiento']) && isset($_POST['email']) &&
         isset($_POST['usuario'])  && isset($_POST['pass'])) {
        # code...
        require_once '../modelo/conexion.php';
        require_once '../modelo/usuario2.php';

      }
*/
    ?>
  </div>
</div>
<!--olvidaste tu contraseña?-->
<div class="modal fade" id="recuperarContraseña" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">¿Tienes problemas para iniciar sesión?</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="text-center">
      <p>Ingresa tu nombre de usuario o correo electrónico y te enviaremos un enlace para recuperar el acceso a tu cuenta</p>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">  
          <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Correo electrónico, teléfono o nombre de usuario">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info my-4 btn-block">Enviar enlace de inicio de sesión</button>
      </div>
    </div>
  </div>
</div>
  </div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  <script src="../js/Gestion_usuario.js"></script>
  <script src="js/main.js"></script>
  
  </body>
</html>
<?php
}
 ?>