<?php
  session_start();
  if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';
 ?>

   <title>Farma-Fast | Promociones</title>

<?php
include_once 'layouts/nav.php';
 ?>

 <!--=================================Modal que Interactua con cambiar imagen de las promociones=================================-->

<div class="modal fade" id="cambiologo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen de Promocion</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="text-center">
           <!--Porcion de codigo el cual nos devuelve el nombre y trae el avatar a nuestro modal-->
           <img id="actual" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
         </div>
         <div class="text-center">
           <b id="nombre_prom">
           </b>
         </div>
         <div class="alert alert-success text-center" id="edit" style='display:none;'>
            <span><i class="fas fa-check"></i>Logo Actualizado</span>
         </div>
         <div class="alert alert-danger text-center" id="noedit" style='display:none;'>
            <span><i class="fas fa-times"></i>Formato no Compatible</span>
         </div>
         <form id="logoprom" enctype="multipart/form-data"> <!--para que el formulario admita fotos-->
           <div class="input-group mb-3 mb-3 ml-5 mt-2">
              <input type="file" name="photo" class="input-group">
              <input type="hidden" name="funcion" id="funcion">
              <input type="hidden" name="id_logo" id="id_logo">
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

 <!--=================================Modal que Interactua con cambiar imagen de las promociones=================================-->

 <div class="modal fade" id="crearpromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Crear Promocion</h3>
            <button data-dismiss="modal" aria-label="close" class="close">
                <span aira-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">

        <div class="alert alert-success text-center" id="agregado" style='display:none;'>
           <span><i class="fas fa-check"></i>Promocion Creada</span>
        </div>

        <div class="alert alert-danger text-center" id="no_agregado" style='display:none;'>
            <span><i class="fas fa-times"></i>No se pueden crear Promociones iguales </span>
        </div>

        <div class="alert alert-success text-center" id="edit-prom" style='display:none;'>
           <span><i class="fas fa-check"></i>Promocion Actualizada</span>
        </div>

          <form id="form-crear" >
            <div class="form-group">
              <label for="nombre-prom">Nombre Promoción</label>
              <input id="nombre-prom" type="text" class="form-control" placeholder="Ingrese Nombre.." required>
            </div>

            <div class="form-group">
              <label for="fecha-inicio">Inicio</label>
              <input id="fecha-inicio" type="date" class="form-control" placeholder="inicio.." required>
            </div>
            <!-- 
            <div class="form-group">
              <label for="final">Caducación</label>
              <input id="final" type="date" class="form-control" placeholder="final.." required>
            </div>
            -->
            <div class="form-group">
              <label for="precio">Precio</label>
              <input id="precio" type="text" class="form-control" placeholder="Ingrese el Precio.." required>
            </div>
            <input type="hidden" id="id_editar_prom">
          </div>
          <div class="card-footer">
            <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
        </form>
        </div>
      </div>
     </div>
   </div>
 </div>  


 <!--==================================================================== -->

   <div class="content-wrapper">
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Gestion de Promociones</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Gestion de Promociones</li>
             </ol>
           </div>
         </div>
       </div>
     </section>

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a href="#inicio" class="nav-link active" data-toggle="tab">Inicio</a></li>

                </ul>
              </div>
              <div class="card-body p-0">
                <div class="tab-content">
                  <div class="tab-pane active" id='inicio'>
                    <div class="card-success">
                      <div class="card-header">
                        <div class="card-title">Busqueda por Fecha Inicio <button type="buttn" data-toggle="modal" data-target="#crearpromo" class="btn bg-gradient-primary btn-sm m-2">Crear Promocion</button></div>
                        <div class="input-group">
                          <input id="buscar-inicio"type="text" class="form-control float-left" placeholder="Ingrese Nombre de la Promocion">
                          <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
                        </div>
                      </div>
                      <div class="card-body p-1 table-responsive">
                      <!--Tabla dinamica-->
                      <table class="table table-hover text-nowrap">
                        <thead class="table-success">
                          <tr>
                            <th>Nombre</th>
                            <th>Fecha de inicio</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="table-active" id="promociones"></tbody>
                      </table>
                      </div>
                      <div class="card-footer"></div>
                    </div>
                  </div>
                  <div class="tab-pane" id='caducacion'>
                    <div class="card-success">
                      <div class="card-header">
                        <div class="card-title">Busqueda por Fecha Cierre <button type="buttn" data-toggle="modal" data-target="#crearpromo" class="btn bg-gradient-primary btn-sm m-2">Crear Promocion</div>
                        <div class="input-group">
                          <input id="buscar-cierre"type="text" class="form-control float-left" placeholder="Ingrese Nombre de la Promocion">
                          <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
                        </div>
                      </div>
                      <div class="card-body"></div>
                      <div class="card-footer"></div>
                    </div>
                  </div>
                  <div class="tab-pane" id='precio'>
                    <div class="card-success">
                      <div class="card-header">
                        <div class="card-title">Busqueda por Precio <button type="buttn" data-toggle="modal" data-target="#crearpromo" class="btn bg-gradient-primary btn-sm m-2">Crear Promocion</div>
                        <div class="input-group">
                          <input id="buscar-precio"type="text" class="form-control float-left" placeholder="Ingrese Nombre de la Promocion">
                          <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
                        </div>
                      </div>
                      <div class="card-body"></div>
                      <div class="card-footer"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
              
              </div>
            </div>
          </div>
        </div>
      </div>
            
      </div>

     </section>

   </div>

<?php


include_once 'layouts/footer.php';
  }
  else {
    header('Location: ../index.php');
  }
 ?>

<script src="../js/Cargas.js"></script>
