//buesqueda de usuario..
$(document).ready(function(){
  var tipo_usuario = $('#tipo_usuario').val();
  if (tipo_usuario==2) {
    $('#button-crear').hide();
  }
   buscar_datos();
   var funcion;
   function buscar_datos(consulta) {
      funcion='buscar_usuarios_adm';
      $.post('../Controlador/usuario_controller.php',{consulta,funcion},(response)=>{
          const usuarios = JSON.parse(response);
          let template='';
          usuarios.forEach(usuario=>{
            template+=`
            <div usuarioId="${usuario.id}"class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">`;
                  if (usuario,tipo_usuario==1) {
                    template+=`<h1 class="badge badge-danger">${usuario.tipo}</h1>`;
                  }
                  if (usuario,tipo_usuario==2) {
                    template+=`<h1 class="badge badge-warning">${usuario.tipo}</h1>`;
                  }
                template+=`</div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>${usuario.nombre} ${usuario.apellidos}</b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> DNI: ${usuario.dni}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span> Edad: ${usuario.edad}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Residencia: ${usuario.residencia}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono #: ${usuario.telefono}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> Correo: ${usuario.correo}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-smile"></i></span> Sexo: ${usuario.residencia}</li>


                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="${usuario.avatar}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">`;
                    if(tipo_usuario==1) {
                       if (usuario.tipo_usuario!=1) {
                          template+=`
                          <button class="borrar-usuario btn btn-danger" type="button" data-toggle="modal" data-target="#confirmar">
                            <i class="fas fa-window-close mr-2"></i>Eliminar
                          </button>
                          `;
                       }
                       if (usuario.tipo_usuario==2) {
                         template+=`
                         <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#confirmar">
                           <i class="fas fa-window-close mr-2"></i>Ascender
                         </button>
                         `;
                       }
                    }
                    else {
                      if (tipo_usuario==1 && usuario.tipo_usuario!=1) {
                        template+=`
                        <button class="borrar-usuario btn btn-danger" type="button" data-toggle="modal" data-target="#confirmar">
                          <i class="fas fa-window-close mr-2"></i>Eliminar
                        </button>
                        `;
                      }
                    }
                    template+=`
                    </button>
                  </div>
                </div>
              </div>
            </div>
            `;
          })
          $('#usuarios').html(template);
      });
   }
  //keyup...se utiliza para ver que se esta escribiendo
    $(document).on('keyup','#buscar',function(){
        let valor = $(this).val();
        if (valor!="") {
            buscar_datos(valor);
        }
        else {
            buscar_datos();
        }
    });
    $('#form-crear').submit(e=>{
      let nombre = $('#nombre').val();
      let ape = $('#ape').val();
      let edad = $('#edad').val();
      let dni = $('#dni').val();
      let pass = $('#pass').val();
      funcion='crear_usuario';
      $.post('../Controlador/usuario_controller.php',{nombre,ape,edad,dni,pass,funcion},(response)=>{
        if (response=='agregado') {
              $('#agregado').hide('slow');
              $('#agregado').show(1000);
              $('#agregado').hide(2000);
              $('#form-crear').trigger('reset');
              buscar_datos();
        }
        else {
          $('#no_agregado').hide('slow');
          $('#no_agregado').show(1000);
          $('#no_agregado').hide(5000);
          $('#form-crear').trigger('reset');
        }
      });
      e.preventDefault();
    });

    $(document).on('click','.borrar-usuario',(e)=>{
      const elemento= $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
      const id=$(elemento).attr('usuarioId');
      funcion='borrar_usuario';
      $('#id_user').val(id);
      $('#funcion').val(funcion);
    })
    $('#form-confirmar').submit(e=>{
      let pass=$('#oldpass').val();
      let id_usuario=$('#id_user').val();
      funcion=$('#funcion').val();
      $.post('../Controlador/usuario_controller.php',{pass,id_usuario,funcion},(response)=>{
        if (response=='borrado') {
              $('#confirmado').hide('slow');
              $('#confirmado').show(1000);
              $('#confirmado').hide(2000);
              $('#form-confirmar').trigger('reset');

        }
        else {
          $('#rechazado').hide('slow');
          $('#rechazado').show(1000);
          $('#rechazado').hide(5000);
          $('#rechazado').trigger('reset');
        }
        buscar_datos();
      });
      e.preventDefault();
    });

    $('#cliente').submit(e=>{
      let PER_NOMBRE = $('#PER_NOMBRE').val();
      let PER_APELLIDO = $('#PER_APELLIDO').val();
      let PER_FECHA_NACIMIENTO = $('#PER_FECHA_NACIMIENTO').val();
      let PER_EMAIL = $('#PER_EMAIL').val();
      let PER_USERNAME = $('#PER_USERNAME').val();
      let PER_PASSWORD = $('#PER_PASSWORD').val();
      let autom = $('#autom').val();
      funcion='cliente';
      $.post('../Controlador/usuario_controller.php',{PER_NOMBRE,PER_APELLIDO,PER_FECHA_NACIMIENTO,PER_EMAIL,PER_USERNAME,PER_PASSWORD,autom,funcion},(response)=>{
        console.log(response);
        if(response=='add') {
          $('#add').hide('slow');
          $('#add').show(1000);
          $('#add').hide(2000);
          $('#cliente').trigger('reset');
        }
        else{
       $('#noadd').hide('slow');
       $('#noadd').show(2000);
       $('#noadd').hide(5000);
       $('#cliente').trigger('reset');
      }
  });
      e.preventDefault();
   });

})
