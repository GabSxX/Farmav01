<?php
  session_start();
  if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';
 ?>

   <title>Farma-Fast | Medios de Pago</title>

<?php
include_once 'layouts/nav.php';
 ?>
 <div class="modal fade" id="crearpago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Cargar Medios de Pago</h3>
            <button data-dismiss="modal" aria-label="close" class="close">
                <span aira-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">

        <div class="alert alert-success text-center" id="agregado-pago" style='display:none;'>
           <span><i class="fas fa-check"></i>Medio Agregado</span>
        </div>
            <div class="alert alert-danger text-center" id="no-agregado-pago" style='display:none;'>
               <span><i class="fas fa-times"></i>Este banco ya existe!!! </span>
            </div>

          <form id="form-crear-pago" >
            <div class="form-group">
              <label for="pago">Tipo de Tarjeta</label>
              <input id="pago" type="text" class="form-control" placeholder="Debito, credito.." required>
            </div>

            <div class="form-group">
              <label for="banco">Banco</label>
              <input id="banco" type="text" class="form-control" placeholder="Ingrese el Nombre del Banco.." required>
            </div>

          <div class="form-group">
              <label for="codigo">Codigo</label>
              <input id="codigo" type="text" class="form-control" placeholder="Debito 1 - Credito 2.." required>
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
             <h1>Gestion de Medios de Pago</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Inicio</a></li>
               <li class="breadcrumb-item active">Medios de Pagos</li>
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
                      <div class="card-title">Buscar medio<button type="button" data-toggle="modal" data-target="#crearpago" class="btn bg-gradient-primary btn-sm m-2">Crear Medio</button></div>
                        <div class="input-group">
                          <input id="buscar-pagos"type="text" class="form-control float-left" placeholder="Ingrese Nombre de la Promocion">
                          <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
                        </div>
                      </div>
                      <div class="card-body p-1">
                      <!--Tabla dinamica-->
                      <table class="table table-over text-nowrap">
                        <thead class="table-success">
                          <tr>
                            <th>Medio</th>
                            <th>Banco</th>
                            <th>Codigo</th>
                            <th>Accion</th>
                          </tr>
                        </thead>
                        <tbody class="table-active" id="pagos"></tbody>
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
