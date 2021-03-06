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
 

                <li><a href="elegirFarmacia.php" class="nav-link">Farmacias cercanas</a></li>
                <li><a href="elegirFarmacia.php" class="nav-link">Todas las farmacias</a></li>
                <li><input class="form-control" type="text" placeholder="Buscar farmacia" aria-label="Search"></li>
                  <button href="#!" class="btn btn-primary btn-md" type="submit">Buscar</button>
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

                    <!-- Card -->
          <div class="card testimonial-card" style="width: 90%;">

            <!-- Background color -->
            <div class="card-up indigo lighten-1"></div>

            <!-- Avatar -->
            <div class="text-center">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle mt-3"
                alt="woman avatar">
              <button type="button" class="btn btn-outline-primary fas fa-user-edit"></button>
            </div>
            <hr>

            <div class="d-flex justify-content-between mx-3">
              <!-- Usuario -->
              <h5><b class="font-weight-bold" style="color:#0b7300">Usuario</b></h5><h5>María</h5>
            </div>
            <hr>
            <button type="button" class="btn btn-outline-primary">Cambiar contraseña</button>

          </div>
            <!-- Card -->

        </div>
            <!--Grid column-->

            <!--Grid column-->
        <div class="col-lg-6 mb-4 mb-lg-0">

            <div class="card card-success">
               <div class="card-header text-center" style="background: #4285F4;">
                 <h3 class="card-title" style="color: #FFFFFF;">Sobre Mi</h3>
               </div>
               <div class="card-body">

                 <strong style="color:#0b7300">
                   <i class="fas fa-signature mr-1"></i>Nombre
                 </strong>
                 <p id="nombre_us" class="text-muted font-weight-bold">María</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-signature mr-1"></i>Apellido
                 </strong>
                 <p id="Apellido_us" class="text-muted font-weight-bold">López</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-birthday-cake mr-1"></i>Fecha de nacimiento
                 </strong>
                 <p id="fNacimiento_us" class="text-muted font-weight-bold">07/10/90</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-at mr-1"></i>Email
                 </strong>
                 <p id="email_us" class="text-muted font-weight-bold">email@gmail.com</p>

                 
               </div>
               <button class="btn btn-outline-primary" type="button" name="button"><i class="far fa-edit"></i>Editar</button>
            </div>
       
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