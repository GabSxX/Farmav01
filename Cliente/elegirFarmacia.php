<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Farma-Fast</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--LEAFLET-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

    <link rel="stylesheet" href="css/map.css">
    <!--LEAFLET-->

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
  <body data-spy="" data-target=".site-navbar-target" data-offset="300">
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
                <li><a href="" class="nav-link">Farmacias cercanas</a></li>
                <li><a href="" class="nav-link">Todas las farmacias</a></li>
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
    </div>
    <form action="verFarmacia.php">
    <div class="site-section testimonial-wrap bg-light" id="servicios-section">
      <div class="container"> 
          <!-- Botón switch para localización-->
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="customSwitches">
          <label class="custom-control-label align-baseline" for="customSwitches">Utilizar mi ubicación actual</label>

          <!-- Botón desplegable provincia -->
          <button id="btnGroupDrop1" class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Provincia</button>

            <div class="dropdown-menu" style="overflow: scroll; width:100px; height:200px">
              <a class="dropdown-item" href="#">C.A.B.A</a>
              <a class="dropdown-item" href="#">Buenos Aires</a>
              <a class="dropdown-item" href="#">Catamarca</a>
              <a class="dropdown-item" href="#">Chaco</a>
              <a class="dropdown-item" href="#">Chubut</a>
              <a class="dropdown-item" href="#">Córdoba</a>
              <a class="dropdown-item" href="#">Entre Ríos</a>
              <a class="dropdown-item" href="#">Formosa</a>
              <a class="dropdown-item" href="#">Jujuy</a>
              <a class="dropdown-item" href="#">La Pampa</a>
              <a class="dropdown-item" href="#">La Rioja</a>
              <a class="dropdown-item" href="#">Mendoza</a>
              <a class="dropdown-item" href="#">Misiones</a>
              <a class="dropdown-item" href="#">Río Negro</a>
              <a class="dropdown-item" href="#">Salta</a>
              <a class="dropdown-item" href="#">San Juan</a>
              <a class="dropdown-item" href="#">San Luis</a>
              <a class="dropdown-item" href="#">Santa Cruz</a>
              <a class="dropdown-item" href="#">Santa fe</a>
              <a class="dropdown-item" href="#">Santiago del Estero</a>
              <a class="dropdown-item" href="#">Tierra del fuego</a>
              <a class="dropdown-item" href="#">Tucumán</a>
            </div>
            <!-- Botón desplegable localidad -->
          <div class="btn-group" role="group">
              <button id="btnGroupDrop2" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Localidad
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="overflow: scroll; width:100px; height:200px">
                <a class="dropdown-item" href="#">Clorinda</a>
                <a class="dropdown-item" href="#">Collucio</a>
                <a class="dropdown-item" href="#">El Colorado</a>
                <a class="dropdown-item" href="#">Formosa</a>
                <a class="dropdown-item" href="#">Ibarreta</a>
                <a class="dropdown-item" href="#">Ing. G. N. Juárez</a>
                <a class="dropdown-item" href="#">Las Lomitas</a>
                <a class="dropdown-item" href="#">Mayor Villafañe</a>
                <a class="dropdown-item" href="#">Pirané</a>
                <a class="dropdown-item" href="#">Villa Dos Trece</a>                
              </div>
          </div>
          
          <input type="submit" class="btn btn-primary" id="btn1" value="Ver farmacia"></input>
          </form>
          <script>
            document.getElementById('btn1').disabled=true;
          </script>
          <hr> 

          <div class="leaflet-container" id="map" style="position: relative;"></div>

        </div>         

            <!-- Mapa
            <div class="row">   
              <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1VYlgMUNP313g9RTEa-CNwce_hJETzcog" width="1000" height="650"></iframe>
            </div>
             -->
    </header>  
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
  <script src="js/mapa.js"></script>
 <!--Leaflet's-->
  
  </body>
</html>