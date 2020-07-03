<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../css/pagos.css">
<!-- SweetAlert -->
<link rel="stylesheet" href="../css/sweetalert2.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../css/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../../index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
     <a href="../controlador/Logout.php">Cerrar Sesion</a>

  </ul>
</nav>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="../vista/adm_catalogo.php" class="brand-link">
    <img src="../img/doc-on.png"
         alt="Farma-Fast"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Farma-Fast</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img id="avatar1" src="../img/5eed57ff3169d-ferre323.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?php
          //se detalla el nombre del usuario
           echo $_SESSION['nombre_us'];
           ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

             <li class="nav-header">Usuario</li>
        
             <li class="nav-item">
               <a href="editar_farmacia.php" class="nav-link">
                 <i class="nav-icon fas fa-wrench"></i>
                 <p>
                   Datos de Farmacia
                 </p>
               </a>
             </li>
        
             <li class="nav-item">
               <a href="editar_datos.php" class="nav-link">
                 <i class="nav-icon fas fa-user-cog"></i>
                 <p>
                   Datos Personales
                 </p>
               </a>
             </li>

             <li class="nav-item">
               <a href="adm_usuario.php" class="nav-link">
                 <i class="nav-icon fas fa-users"></i>
                 <p>
                   Gestion Usuario
                 </p>
               </a>
             </li>

             <li class="nav-item">
               <a href="http://localhost:3000/" class="nav-link">
                 <i class="nav-icon fas fa-envelope"></i>
                 <p>
                   Mensajes
                 </p>
               </a>
             </li>


        <li class="nav-header">Cargas</li>

        <li class="nav-item">
          <a href="promociones.php" class="nav-link">
            <i class="nav-icon fas fa-vials"></i>
            <p>
              Gestionar Promociones
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="pagos.php" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Cargar Medios de Pago
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="obras.php" class="nav-link">
            <i class="nav-icon fas fa-heart"></i>
            <p>
              Cargar Obras Sociales
            </p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
