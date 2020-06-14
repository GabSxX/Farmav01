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

 <!--==================================Modal que interactua con confirmar cambios================================== -->

 <div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">CONFIRMAR ACCION</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="text-center">
           <!--Porcion de codigo el cual nos devuelve el nombre y trae el avatar a nuestro modal-->
           <img id="avatar3" src="../img/5ed47d6e570ee-user2-160x160.jpg" class="profile-user-img img-fluid img-circle">
         </div>
         <div class="text-center">
           <b>
             <?php echo $_SESSION['nombre_us']; ?>
           </b>
         </div>
         <div class="alert alert-success text-center" id="confirmado" style='display:none;'>
            <span><i class="fas fa-check"></i>Eliminado</span>
         </div>
         <div class="alert alert-danger text-center" id="rechazado" style='display:none;'>
            <span><i class="fas fa-times"></i>Contraseña Incorrecta</span>
         </div>
         <form id="form-confirmar">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" ><i class="fas fa-unlock-alt"></i></span>
             </div>
             <input type="password" id="oldpass" class="form-control" placeholder="Ingrese contraseña actual">
             <input type="hidden" id="id_user">
             <input type="hidden" id="funcion">
           </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn bg-gradient-primary">Eliminar</button>
       </form>
       </div>
     </div>
   </div>
 </div>

 <!--==================================Modal================================== -->

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

          <div class="alert alert-success text-center" id="agregado" style='display:none;'>
             <span><i class="fas fa-check"></i>Usuario Agregado</span>
          </div>
          <div class="alert alert-danger text-center" id="no_agregado" style='display:none;'>
             <span><i class="fas fa-times"></i>No pueden existir usuarios con el mismo DNI</span>
          </div>

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
             <h1>Gestion Usuarios <button id="button-crear" type="button" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-2">Crear Usuario</button></h1>
              <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo']; ?>">
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
