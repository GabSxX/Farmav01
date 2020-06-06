/*Lo que se hara aca es ejecutar una funcion una vez cargada la pagina actual
esto se hace implementando Jquery, Se capturan los id del usuario*/

$(document).ready(function() {
  var funcion = '';
  var id_usuario = $('#id_usuario').val();
  var edit=false;
  buscar_usuario(id_usuario);
  /*Funcion que retorna todos los datos del usuario*/
  function buscar_usuario(dato){
    funcion = 'buscar_usuario';
    /*Ajax Tipo Post, el cual nos pide el (url), los datos que se van a pasar '{}' y una funcion (response)*/
    $.post('../Controlador/usuario_controller.php',{dato,funcion},(response)=>{
      /*Template que van a nuestro frontend*/
      let nombre='';
      let apellidos='';
      let edad='';
      let dni='';
      let tipo='';
      let telefono='';
      let residencia='';
      let correo='';
      let sexo='';
      const usuario = JSON.parse(response);
      nombre+=`${usuario.nombre}`;
      apellidos+=`${usuario.apellidos}`;
      edad+=`${usuario.edad}`;
      dni+=`${usuario.dni}`;
      tipo+=`${usuario.tipo}`;
      telefono+=`${usuario.telefono}`;
      residencia+=`${usuario.residencia}`;
      correo+=`${usuario.correo}`;
      sexo+=`${usuario.sexo}`;

      $('#nombre_us').html(nombre);
      $('#apellidos_us').html(apellidos);
      $('#edad').html(edad);
      $('#dni_us').html(dni);
      $('#us_tipo').html(tipo);
      $('#telefono_us').html(telefono);
      $('#residencia_us').html(residencia);
      $('#correo_us').html(correo);
      $('#sexo_us').html(sexo);
      $('#avatar2').attr('src',usuario.avatar);
      $('#avatar1').attr('src',usuario.avatar);
      $('#avatar3').attr('src',usuario.avatar);
      $('#avatar4').attr('src',usuario.avatar);
    })
  }
  //capturar el evento click de una clase llamada 'edit' existente en en el boton de editar
  $(document).on('click','.edit',(e)=>{
      //cada vez que hagamos click en la funcion editar se hara...
      funcion='capturar_datos';
      edit=true;
      $.post('../Controlador/usuario_controller.php',{funcion,id_usuario},(response)=>{
          const usuario = JSON.parse(response);
          $('#telefono').val(usuario.telefono);
          $('#residencia').val(usuario.residencia);
          $('#correo').val(usuario.correo);
          $('#sexo').val(usuario.sexo);
      })
  });
      //cada vez que apretemos el btn guardar sucedera lo siguiente...
  $('#form-usuario').submit(e=>{
      if(edit==true){
          let telefono=$('#telefono').val();
          let residencia=$('#residencia').val();
          let correo=$('#correo').val();
          let sexo=$('#sexo').val();
          funcion='editar_usuario';
          $.post('../Controlador/usuario_controller.php',{id_usuario,funcion,telefono,residencia,correo,sexo},(response)=>{
              if(response=='editado'){
                  $('#editado').hide('slow');
                  $('#editado').show(1000);
                  $('#editado').hide(2000);
                  $('#form-usario').trigger('reset');

              }
              edit=false;
              //llamando a esta funcion conseguimos que cada vez que actualizamos los datos se actualize nuestra tarjeta.
              buscar_usuario(id_usuario);
          })
      }
      else{
        $('#noeditado').hide('slow');
        $('#noeditado').show(1000);
        $('#noeditado').hide(2000);
        $('#noform-usario').trigger('reset');
      }
      //con esto evitamos que se refresque la pagina
      e.preventDefault();
  })

/*
  //Porcion de codigo que interactua con el cambio de la contraseña, se captura el evento (e) cuando se presiona el boton
  $('#form-pass').submit(e=>{
    let oldpass=$('#oldpass').val();
    let newpass=$('#newpass').val();
    funcion='cambiar_contra'
    $.post('../Controlador/usuario_controller.php',{id_usuario,funcion,oldpass,newpass},(response)=>{
    console.log(response);
    })
      e.preventDefault();
  })
*/
    $('#form-pass').submit(e=>{
      let oldpass=$('#oldpass').val();
      let newpass=$('#newpass').val();
      funcion='cambiar_contra'
      $.post('../Controlador/usuario_controller.php',{id_usuario,funcion,oldpass,newpass},(response)=>{
        if (response=='update') {
          $('#update').hide('slow');
          $('#update').show(1000);
          $('#update').hide(2000);
          $('#form-pass').trigger('reset');
        }
        else {
          $('#noupdate').hide('slow');
          $('#noupdate').show(1000);
          $('#noupdate').hide(2000);
          $('#form-pass').trigger('reset');
        }
      })
      e.preventDefault();
    })

    $('#form-photo').submit(e=>{
      let formData = new FormData($('#form-photo')[0]);
      $.ajax({
        url:'../Controlador/usuario_controller.php',
        type:'POST',
        data:formData,
        cache:false,
        processData:false,
        contentType:false
      }).done(function(response){
        //se obtienen los avatares nuevos para el perfil...
          const json = JSON.parse(response);
          if(json.alert=='edit') {
            $('#avatar1').attr('src',json.ruta);
            $('#edit').hide('slow');
            $('#edit').show(1000);
            $('#edit').hide(2000);
            $('#form-photo').trigger('reset');
            buscar_usuario(id_usuario);
          }
          else {
            $('#noedit').hide('slow');
            $('#noedit').show(1000);
            $('#noedit').hide(2000);
            $('#form-photo').trigger('reset');
          }
      });
      e.preventDefault();
    })

})
