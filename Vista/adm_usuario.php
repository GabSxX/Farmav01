<?php //Porcion de codigo en el que se cierra la sesion activa ?>
<?php
  session_start();
  //Validacion: Si es administrador (1) que me permita entrar a la vista
  if ($_SESSION['us_tipo']==1) {
    // Se sub-divide el codigo en otras vistas (layouts)
    include_once 'layouts/header.php';
 ?>

   <title>Admin | Editar Datos</title>

<?php
// aca tambien se subdivide la navegacion
include_once 'layouts/nav.php';
 ?>




 <!--==================================Modal que interactua con crear personal================================== -->

 <div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="card card-success">

        <div class="card-header">
        <h3 class="card-title">Crear Personal</h3>
        <button data-dismiss="modal" aria-label="close" class="close">
          <span aira-hidden="true">&times;</span>
        </button>
        </div>
 <!--==================================================================== -->
        <div class="card-body">
          <form id="form-crear" >
            <div class="form-group">
              <label for="nombre">Nombres</label>
              <input id="nombre" type="text" class="form-control" placeholder="Ingrese Nombre.." required>
            </div>

            <div class="form-group">
              <label for="ape">Apellido</label>
              <input id="ape" type="text" class="form-control" placeholder="Ingrese el Apellido.." required>
            </div>

            <div class="form-group">
              <label for="edad">Nacimiento</label>
              <input id="edad" type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento.." required>
            </div>

            <div class="form-group">
              <label for="dni">DNI</label>
              <input id="dni" type="text" class="form-control" placeholder="Ingrese el DNI.." required>
            </div>

            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input id="pass" type="password" class="form-control" placeholder="Ingrese la Contraseña.." required>
            </div>
        </div>
 <!--==================================================================== -->
        <div class="card-footer">
          <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
          <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
        </form>
        </div>
      </div>
     </div>
   </div>
 </div>

 <!-- =====================================================================-->



   <div class="content-wrapper">
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Gestion Usuarios <button type="button" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-2">Crear Usuario</button></h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
               <li class="breadcrumb-item active">Gestion Personal</li>
             </ol>
           </div>
         </div>
       </div>
     </section>
   <section>

     <div class="container-fluid">
        <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Buscar Personal</h3>
          <div class="input-group">
            <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre del Personal">
            <div class="input-group-append">
              <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
          </div>
        </div>
        <div class="card-body">
          <div id="usuarios" class="row d-flex align-items-stretch">
            
          </div>
        </div>
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
 <script src="../js/Gestion_usuario.js"></script>
