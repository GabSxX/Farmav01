<?php //Porcion de codigo en el que se cierra la sesion activa ?>
<?php
  session_start();
  //Validacion: Si es administrador (1) que me permita entrar a la vista
  if ($_SESSION['us_tipo']==1) {
    // Se sub-divide el codigo en otras vistas (layouts)
    include_once 'layouts/header.php';
 ?>

   <title>Farmacia | Editar Datos</title>

<?php
// aca tambien se subdivide la navegacion
include_once 'layouts/nav.php';
 ?>



   <div class="content-wrapper">
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Datos de Farmacia</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
               <li class="breadcrumb-item active">Datos de Farmacia</li>
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
                     <img id="avatar2" src="../img/5eed57ff3169d-ferre323.png" class="profile-user-img img-fluid img-circle">
                   </div>
                   <br>
            <!--=========================Atributos dinamicos mediante ID (Mismos names que la BD)=========================-->
                 <ul class="list-group list-group-unbordered mb-3">
                   <li class="list-group-item">
                      <b style="color:#0b7300">Farmacia</b><a id="edad" class="float-right">Ferreyra</a>
                   </li>
                   <li class="list-group-item">
                     <b style="color:#0b7300">RZS</b><a id="dni_us" class="float-right">00010</a>
                  </li>

            <!--=========================Atributos dinamicos mediante ID=========================-->
                   
            <!--=========================Boton para cambiar contraseña de usuario=========================-->
                   
                 </ul>
               </div>
             </div>
             <div class="card card-success">
               <div class="card-header">
                 <h3 class="card-title">Informacion</h3>
               </div>
               <div class="card-body">

                 <strong style="color:#0b7300">
                   <i class="fas fa-phone mr-1"></i>Contacto
                 </strong>
                 <p id="telefono_us" class="text-muted">543704430885</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-map-marker-alt mr-1"></i>Direccion
                 </strong>
                 <p id="residencia_us" class="text-muted">9 de Julio 501, P3600 Formosa</p>

                 <strong style="color:#0b7300">
                   <i class="fas fa-clock mr-1"></i>Horarios
                 </strong>
                 <p id="correo_us" class="text-muted">7:30-0:00 - Lunes a Lunes</p>
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
                 <h3 class="card-title">Editar Farmacia</h3>
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
                     <label for="telefono" class="col-sm-2 col-form-label">Contacto</label>
                     <div class="col-sm-10">
                     <input type="number" id="telefono" class="form-control">
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="Residencia" class="col-sm-2 col-form-label">Direccion</label>
                     <div class="col-sm-10">
                     <input type="text" id="residencia" class="form-control">
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="Correo" class="col-sm-2 col-form-label">Horarios</label>
                     <div class="col-sm-10">
                     <input type="text" id="correo" class="form-control">
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
