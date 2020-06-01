  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FarmaFast</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" tipe="text/css"href="css/Style.css">
    <link rel="stylesheet" tipe="text/css"href="css/css/all.min.css">
  </head>
  <?php
  //=============================================================================================================//
   //algoritmo el cual permite mantener la sesion iniciada, incluso volviendo a la pagina anterior
   session_start();
   if (!empty($_SESSION['us_tipo'])) {
       header('Location: Controlador/logincontroller.php');
   }
   else {
     //en caso de existir alguna sesion la cierra para que no existan problemas
   session_destroy();
     //todo el bloque de codigo cierra abajo
  //=============================================================================================================//
   ?>
  <body>
  <img class="wave" src="img/wave.png" alt="">
    <!-- -->
    <div class="contenedor">
        <div class="img">
        <img src="img/docs.svg" alt="">
            </div>
              <div class="contenido-login">
                <form class="" action="Controlador/logincontroller.php" method="post">
                <img src="img/doc-on.png" alt="">
                    <h2>Farma-Fast</h2>
                    <div class="input-div dni">
                        <div class="i">
                          <i class="fas fa-user"></i>
                         </div>
                            <div class="div">
                            <h5>DNI</h5>
                                <input type="text" name="user" class="input">
                                </div>
                                  </div>
                              <div class="input-div pass">
                              <div class="i">
                          <i class="fas fa-lock"></i>
                          </div>
                      <div class="div">
                      <h5>Contraseña</h5>
                      <input type="password" name="pass" class="input">
                  </div>
                 </div>
              <a href="">Created Group-1</a>
              <input type="submit" class="btn" value="Iniciar">
              </form>
          </div>
          </div>
    </body>
    <script src="js/login.js"></script>
</html>
<?php
}
 ?>
