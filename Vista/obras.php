<?php
  session_start();
  if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';
 ?>

   <title>Farma-Fast | Obras Sociales</title>

<?php
include_once 'layouts/nav.php';
 ?>
 <div class="modal fade" id="crearobra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Cargar Obras Sociales</h3>
            <button data-dismiss="modal" aria-label="close" class="close">
                <span aira-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">

        <div class="alert alert-success text-center" id="agregado-obra" style='display:none;'>
           <span><i class="fas fa-check"></i>Obra Social Agregada</span>
        </div>
            <div class="alert alert-danger text-center" id="no-agregado-obra" style='display:none;'>
               <span><i class="fas fa-times"></i>Esta Obra Social ya Existe!!! </span>
            </div>

          <form id="form-crear-obra" >
            <div class="form-group">
              <label for="obra">Nombre Obra Social</label>
              <input id="obra" type="text" class="form-control" placeholder="Ingrese el Nombre de la Obra social.." required>
            </div>

            <div class="form-group">
              <label for="referencia">Numero de Referencia</label>
              <input id="referencia" type="text" class="form-control" placeholder="Referencia numerica interna.." required>
            </div>
          </div>

        <div class="card-footer">
          <button type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
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
             <h1>Gestion de Obras Sociales</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Inicio</a></li>
               <li class="breadcrumb-item active">Obras Sociales</li>
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
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id='inicio'>
                    <div class="card-success">
                      <div class="card-header">
                      <div class="card-title">Buscar Obras Sociales<button type="button" data-toggle="modal" data-target="#crearobra" class="btn bg-gradient-primary btn-sm m-2">Crear Obra</button></div>
                        <div class="input-group">
                          <input id="buscar-obras"type="text" class="form-control float-left" placeholder="Ingrese la referencia de la O.S">
                          <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
                        </div>
                      </div>
                      <div class="card-body p-1">
                      <!--Tabla dinamica-->
                      <table class="table table-over text-nowrap">
                        <thead class="table-success">
                          <tr>
                            <th>Obra</th>
                            <th>Referencia</th>
                            <th>Accion</th>
                          </tr>
                        </thead>
                        <tbody class="table-active" id="obras"></tbody>
                      </table>
                      </div>
                      <div class="card-footer"></div>
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
