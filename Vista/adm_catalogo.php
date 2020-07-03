<?php //Porcion de codigo en el que se cierra la sesion activa ?>
<?php
  session_start();
  //Validacion: Si es administrador (1) que me permita entrar a la vista
  if ($_SESSION['us_tipo']==1) {
    // Se sub-divide el codigo en otras vistas (layouts)
    include_once 'layouts/header.php';
 ?>

   <title>Farma-Fast | Login</title>

<?php
// aca tambien se subdivide la navegacion
include_once 'layouts/nav.php';
 ?>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Contenido</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Blank Page</li>
             </ol>
           </div>
         </div>
       </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">

       <!-- Default box -->
       <div class="card">
         <div class="card-header">
           <h3 class="card-title">Title</h3>

           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
               <i class="fas fa-minus"></i></button>
             <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
               <i class="fas fa-times"></i></button>
           </div>
         </div>
         <div class="card-body">
           Farma-Fast 4Ever
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
           Footer
         </div>

       </div>

     </section>

   </div>

<?php
//otro pedazo de codigo sub dividido
include_once 'layouts/footer.php';
  }
  else {
    header('Location: ../index.php');
  }
 ?>

<script src="../js/Usuario.js"></script>
