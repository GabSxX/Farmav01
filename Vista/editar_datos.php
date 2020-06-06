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

 <!-- Modal que interactua con cambiar contraña -->
 <!-- Modal -->

 <div class="modal fade" id="cambiocontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Cambio De Contraseña</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="text-center">
           <!--Porcion de codigo el cual nos devuelve el nombre y trae el avatar a nuestro modal-->
           <img id="avatar3" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
         </div>
         <div class="text-center">
           <b>
             <?php echo $_SESSION['nombre_us']; ?>
           </b>
         </div>
         <div class="alert alert-success text-center" id="update" style='display:none;'>
            <span><i class="fas fa-check"></i>Contraseña Actualizada</span>
         </div>
         <div class="alert alert-danger text-center" id="noupdate" style='display:none;'>
            <span><i class="fas fa-times"></i>No se pudo cambiar contraseña</span>
         </div>
         <form id="form-pass">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" ><i class="fas fa-unlock-alt"></i></span>
             </div>
             <input type="password" id="oldpass" class="form-control" placeholder="Ingrese contraseña actual">
           </div>
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" ><i class="fas fa-lock"></i></span>
             </div>
             <input type="text" id="newpass" class="form-control" placeholder="Ingrese la nueva contraseña">
           </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn bg-gradient-primary">Guardar</button>
       </form>
       </div>
     </div>
   </div>
 </div>

 <!--Termina el modal-->

 <!--================================== Modal que interactua con cambiar avatar ================================== -->

 <div class="modal fade" id="cambiophoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Cambio De Contraseña</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="text-center">
           <!--Porcion de codigo el cual nos devuelve el nombre y trae el avatar a nuestro modal-->
           <img id="avatar1" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
         </div>
         <div class="text-center">
           <b>
             <?php echo $_SESSION['nombre_us']; ?>
           </b>
         </div>
         <div class="alert alert-success text-center" id="edit" style='display:none;'>
            <span><i class="fas fa-check"></i>Avatar Actualizado</span>
         </div>
         <div class="alert alert-danger text-center" id="noedit" style='display:none;'>
            <span><i class="fas fa-times"></i>Formato no Compatible</span>
         </div>
         <form id="form-photo" enctype="multipart/form-data"> <!--para que el formulario admita fotos-->
           <div class="input-group mb-3 mb-3 ml-5 mt-2">
              <input type="file" name="photo" class="input-group">
              <input type="hidden" name="funcion" value="cambiar_foto">
           </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn bg-gradient-primary">Guardar</button>
       </form>
       </div>
     </div>
   </div>
 </div>

 <!-- ================================== Termina el modal ==================================-->



   <div class="content-wrapper">
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Datos Personales</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
               <li class="breadcrumb-item active">Datos Personales</li>
             </ol>
           </div>
         </div>
       </div>
     </section>
     <!-- Cuerpo de los datos Admin-->
     <section>
       <div class="content">
         <div class="container-fluid">
           <div class="row">
             <div class="col-md-3">
               <div class="card card-success card-outline">
                 <div class="card-body box-profile">
                   <div class="text-center">
                     <img id="avatar2" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
                   </div>
                   <div class="text-center mt-1">
                      <button type="button" data-toggle="modal" data-target="#cambiophoto" class="btn btn-primary btn-sm">Cambiar Avatar</button>
                   </div>
                   <!-- hidden es de tipo oculto-->
                   <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']; ?>">
                   <!-- hidden es de tipo oculto-->
            <!--=========================Atributos dinamicos mediante ID (Mismos names que la BD)=========================-->
                 <h3 id="nombre_us" class="profile-username text-center text-success">Nombre</h3>
                 <p id="apellidos_us" class="text-muted text-center">Apellido</p>
                 <ul class="list-group list-group-unbordered mb-3">
                   <li class="list-group-item">
                      <b style="color:#0b7300">Edad</b><a id="edad" class="float-right">21</a>
                   </li>
                   <li class="list-group-item">
                     <b style="color:#0b7300">Dni</b><a id="dni_us" class="float-right">12345</a>
                  </li>
                   <li class="list-group-item">
                     <b style="color:#0b7300">Tipo de Usuario</b>
                     <span id="us_tipo" class="float-right badge badge-primary">Administrador</span>
            <!--=========================Atributos dinamicos mediante ID=========================-->
                   </li>
            <!--=========================Boton para cambiar contraseña de usuario=========================-->
                   <button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-block btn-outline-warning btn-sm">Cambiar Contraseña</button>
                 </ul>
               </div>
             </div>
             <div class="card card-success">
               <div class="card-header">
                 <h3 class="card-title">Sobre Mi</h3>
               </div>
               <div class="card-body">

                 <strong style="color:#0b7300">
                   <i class="fas fa-phone mr-1"></i>Telefono
                 </strong>
                 <p id="telefono_us" class="text-muted">654654</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-map-marker-alt mr-1"></i>Residencia
                 </strong>
                 <p id="residencia_us" class="text-muted">654654</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-at mr-1"></i>Correo
                 </strong>
                 <p id="correo_us" class="text-muted">654654</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-smile mr-1"></i>Sexo
                 </strong>
                 <p id="sexo_us" class="text-muted">654654</p>

                 <button class="edit btn btn-block bg-gradient-danger" type="button" name="button">Editar</button>
               </div>
               <div class="card-footer">
                 <p class="text-muted">Editar Informacion</p>
               </div>
             </div>
           </div>
           <div class="col-md-9">
             <div class="card-success">
               <div class="card-header">
                 <h3 class="card-title">Editar datos Personales</h3>
               </div>
               <div class="card-body">
                 <!--Alert que nos muestra que se editaron los datos del usuario-->
                 <div class="alert alert-success text-center" id="editado" style='display:none;'>
                    <span><i class="fas fa-check"></i>Editado</span>
                 </div>

                 <div class="alert alert-danger text-center" id="noeditado" style='display:none;'>
                    <span><i class="fas fa-times"></i>Editado</span>
                 </div>
                 <!--=========================================================================-->
                 <form id='form-usuario' class="form-horizontal">
                   <div class="form-group row">
                     <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                     <div class="col-sm-10">
                     <input type="number" id="telefono" class="form-control">
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="Residencia" class="col-sm-2 col-form-label">Residencia</label>
                     <div class="col-sm-10">
                     <input type="text" id="residencia" class="form-control">
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="Correo" class="col-sm-2 col-form-label">Correo</label>
                     <div class="col-sm-10">
                     <input type="text" id="correo" class="form-control">
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="Sexo" class="col-sm-2 col-form-label">Sexo</label>
                     <div class="col-sm-10">
                     <input type="text" id="sexo" class="form-control">
                     </div>
                   </div>

                   <div class="form-group row">
                     <div class="offset-sm-2 col-sm-10 float-right">
                       <button class="btn btn-block btn-outline-success">Guardar</button>
                     </div>
                   </div>
                 </form>
               </div>
               <div class="card-footer">
                 <p class="text-muted">Ingrese los datos correctos</p>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>


<?php
//otro pedazo de codigo sub dividido
include_once 'layouts/footer.php';
  }
  else {
    header('Location: ../index.php');
  }
 ?>
 <script src="../js/Usuario.js"></script>
