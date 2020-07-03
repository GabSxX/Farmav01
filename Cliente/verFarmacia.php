<?php
session_start();
if ($_SESSION['autom']==1){
  
?>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a8a5a12063.js" crossorigin="anonymous"></script>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <div class="site-wrap"  id="home-section">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="fas fa-times js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-md-3 col-xl-4  d-block">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">Farma-Fast<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-9 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                <li><a href="elegirFarmacia.php" class="nav-link">Cambiar farmacia</a></li>
                <li class="nav-item avatar dropdown nav-link">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle z-depth-0"
                      alt="avatar image" height="30">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-unique"
                    aria-labelledby="navbarDropdownMenuLink-55">
                    <a class="dropdown-item" href="perfil.html"><i class="fas fa-user"></i>Perfil</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-paperclip"></i>Mis pedidos</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-comments"></i>Mis mensajes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../controlador/LogCli.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a> 
                  </div>
                </li>
                <!-- perfil con icono
                <li class="nav-item dropdown nav-link">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item waves-effect waves-light" href="#"><i class="icon-user-o"></i>Perfil</a>
                    <a class="dropdown-item waves-effect waves-light" href="#"><i class="icon-paperclip "></i>Mis pedidos</a>
                    <a class="dropdown-item waves-effect waves-light" href="#"><i class="icon-chat "></i>Mis mensajes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="icon-sign-out "></i>Cerrar sesión</a> 
                  </div>
                </li>
                -->
              </ul>
            </nav>
          </div>
          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="fas fa-bars h3"></span></a></div>
        </div>
      </div>
    </header>
    </div>
    <div class="site-section testimonial-wrap bg-light" id="servicios-section">
  <div class="container my-5 py-5 z-depth-1">
    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 dark-grey-text text-center text-lg-left">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
          <img class="rounded-sm border" src="../img/ferre323.png" class="img-fluid" alt="">
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h3 class="font-weight-bold">FARMACIA FERREYRA</h3>
          <hr> 
          <p class="font-weight-bold">9 de Julio 501, P3600 Formosa</p>
          <p class="font-weight-bold">Tel.: +543704430885</p>
          <p class="font-weight-bold">Horario de atención: 7:30-0:00 - Lunes a Lunes</p>
          <hr>
          <a class="font-weight-bold" href="#" ><i class="fas fa-credit-card ml-2"></i>Medios de pago</a>
          <a class="font-weight-bold" href="#" ><i class="fas fa-id-card ml-2"></i>Obras sociales</a>
          <a class="font-weight-bold" href="#" ><i class="far fa-star ml-2"></i>Promociones</a>
          <hr>
          <a class="btn btn-info" href="http://localhost:3000/" role="button">Chat<i class="fas fa-comments ml-2"></i></a>
          <a class="btn btn-info" href="http://localhost:3000/" role="button">Hacer pedido<i class="fas fa-box-open ml-2"></i></a>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!--Section: Content-->
  </div>
    </div>

    <div class="footer py-5 text-center">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <p class="mb-0">
              <a href="#" class="p-3"><span class="fab fa-facebook-f"></span></a>
              <a href="#" class="p-3"><span class="fab fa-twitter"></span></a>
              <a href="#" class="p-3"><span class="fab fa-instagram"></span></a>
              <a href="#" class="p-3"><span class="fab fa-linkedin-in"></span></a>
              <a href="#" class="p-3"><span class="fab fa-pinterest-p"></span></a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="mb-0">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Farma-Fast <i class="fas fa-heart text-danger" aria-hidden="true"></i> by <a style="color: #661ED5;"><strong>Grupo 1</strong></a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .site-wrap -->

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

  
  <script src="js/main.js"></script>
  
  </body>
</html>
<?php
}
else {
  header('Location: index.html');
}
?>