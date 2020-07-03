//selecciono el documento en este caso el formulario y luego genero un evento para capturar los datos.
$(document).ready(function(){
    buscar_prom();
    buscar_pagos();
    buscar_obras();

    var funcion;
    //para diferenciar entre crear y editar
    var edit=false;
    $('#form-crear').submit(e=>{
       let nombre_prom = $('#nombre-prom').val();
       let fecha_inicio = $('#fecha-inicio').val();
      // let fecha_cierre = $('#fecha-cierre').val();
       let precio = $('#precio').val();
       let id_editado = $('#id_editar_prom').val();     
       if (edit==false) {
           funcion='crear';
       }   
       else{
           funcion='editar';
       }

       //peticion Ajax
       $.post('../Controlador/CargasController.php',{nombre_prom,fecha_inicio/*,fecha_cierre*/,precio,id_editado,funcion},(response)=>{
         console.log(response);
        if(response=='agregado'){
            $('#agregado').hide('slow');
            $('#agregado').show(1000);
            $('#agregado').hide(2000);
            $('#form-crear').trigger('reset');
            buscar_prom();
        }
        if(response=='no_agregado'){
            $('#no_agregado').hide('slow');
            $('#no_agregado').show(1000);
            $('#no_agregado').hide(2000);
            $('#form-crear').trigger('reset');
        }
        if(response=='edit'){
            $('#edit-prom').hide('slow');
            $('#edit-prom').show(1000);
            $('#edit-prom').hide(2000);
            $('#form-crear').trigger('reset');
            buscar_prom();
        }
           edit==false;
       })
       e.preventDefault();
    });
    function buscar_prom(consulta){
        funcion='buscar';
        $.post('../Controlador/CargasController.php',{consulta,funcion},(response)=>{
            //console.log(response);
            const promociones =JSON.parse(response);
            let template='';
            promociones.forEach(promocion => {
                template+=`
                    <tr proid="${promocion.id}" pronom="${promocion.nombre}" proimg="${promocion.imagen}" propre="${promocion.precio}" fechain="${promocion.fecha_inicio}">
                        <td>${promocion.nombre}</td>
                        <td>${promocion.fecha_inicio}</td>
                        <td>${promocion.precio}</td>
                        <td>
                            <img src="${promocion.imagen}" class="img-fluid rounded" width="50" heigth="50">
                        </td>
                        <td>
                        <button class="imagen btn btn-info" title="Cambiar Foto" type="button" data-toggle="modal" data-target="#cambiologo">
                            <i class="far fa-image"></i>
                        </button>
                        <button class="editar btn btn-success" title="Editar Promocion" type="button" data-toggle="modal" data-target="#crearpromo">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                        <button class="borrar btn btn-danger" title="Eliminar Promocion">
                            <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                        
                    </tr>
                
                `;


            });
            $('#promociones').html(template);
        })
    }
    $(document).on('keyup','#buscar-inicio',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_prom(valor);
        }
        else{
            buscar_prom();
        }
    })
    //SE CAPTURA EL ID DE LA PROMOCION PARA EL CAMBIO DE IMAGEN
    $(document).on('click','.imagen',(e)=>{
        funcion="cambiar_logo";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        console.log(elemento);
        const id = $(elemento).attr('proid');
        const nombre = $(elemento).attr('pronom');
        const imagen = $(elemento).attr('proimg');
        $('#actual').attr('src',imagen);
        $('#nombre_prom').html(nombre);
        $('#funcion').val(funcion);
        $('#id_logo').val(id);

    })
    $('#logoprom').submit(e=>{
        let formData = new FormData($('#logoprom')[0]);
        $.ajax({
          url:'../Controlador/CargasController.php',
          type:'POST',
          data:formData,
          cache:false,
          processData:false,
          contentType:false
        }).done(function(response){
          //se obtienen los avatares nuevos para el perfil...
            const json = JSON.parse(response);
            if (json.alert=='edit') {
                $('#actual').attr('src',json.ruta)
                $('#logoprom').trigger('reset');
                $('#edit').hide('slow');
                $('#edit').show(1000);
                $('#edit').hide(2000);
                buscar_prom();
            }
            else{
                $('#noedit').hide('slow');
                $('#noedit').show(1000);
                $('#noedit').hide(2000);
                $('#logoprom').trigger('reset');
            }
        });
        e.preventDefault();
    })
    // SE CAPTURA EL ID PARA BORRAR UNA PROMOCION
    $(document).on('click','.borrar',(e)=>{
        funcion="borrar_promo";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('proid');
        const nombre = $(elemento).attr('pronom');
        const imagen = $(elemento).attr('proimg');

        //SweetAlert
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Desea Eliminar '+nombre+'?',
            text: "Esta accion no podra revertirse!",
            imageUrl:''+imagen+'',
            imageWidth: 100,
            imageHeight: 100,
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                //para borrar la promocion
                $.post('../Controlador/CargasController.php',{id,funcion},(response)=>{
                    edit==false;
                    if (response=='borrado') {
                        swalWithBootstrapButtons.fire(
                            'Borrado!',
                            'La promoción '+nombre+' se elimino.',
                            'success'   
                        )
                        buscar_prom();
                    }
                    else{
                        swalWithBootstrapButtons.fire(
                            'No se Pudo Borrar!',
                            'La promoción '+nombre+' no se elimino.',
                            'error'
                        )    
                    }
                })

            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelado',
                'La promocion '+nombre+' no fue borrada',
                'error'
              )
            }
        })
    })

    $(document).on('click','.editar',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        console.log(elemento);
        const id = $(elemento).attr('proid');
        const nombre = $(elemento).attr('pronom');
        const precio = $(elemento).attr('propre');
        const fecha_inicio = $(elemento).attr('fechain');

        $('#id_editar_prom').val(id);
        $('#nombre-prom').val(nombre);
        $('#precio').val(precio);
        $('#fecha-inicio').val(fecha_inicio);
        edit=true;
        
    })
 //==========================================================PROMOCIONES=======================================================================//


  //==========================================================Medios de pago=======================================================================//

    $('#form-crear-pago').submit(e=>{
        let pago = $('#pago').val();
        let banco = $('#banco').val();
        let codigo = $('#codigo').val();

        funcion='crearpago';
        $.post('../Controlador/CargasController.php',{pago,banco,codigo,funcion},(response)=>{
            //console.log(response);
            if (response=='agregado') {
                $('#agregado-pago').hide('slow');
                $('#agregado-pago').show(1000);
                $('#agregado-pago').hide(2000);
                $('#form-crear-pago').trigger('reset');
                buscar_pagos();
            }
            else{
                $('#no-agregado-pago').hide('slow');
                $('#no-agregado-pago').show(1000);
                $('#no-agregado-pago').hide(2000);
                $('#form-crear-pago').trigger('reset');
            }
        })
        e.preventDefault();
    });
 //=================================================================================//
    function buscar_pagos(consulta2){
        funcion='buscar2';
        $.post('../Controlador/CargasController.php',{consulta2,funcion},(response)=>{
            //console.log(response);
            const pagos =JSON.parse(response);
            let template='';
            pagos.forEach(mediosp => {
                template+=`
                    <tr pagid="${mediosp.id}" pagp="${mediosp.pago}" pagban="${mediosp.banco}" pagcod="${mediosp.codigo}">
                        <td>${mediosp.pago}</td>
                        <td>${mediosp.banco}</td>
                        <td>${mediosp.codigo}</td>
                        <td>

                        <button class="borrar2 btn btn-danger" title="Eliminar Promocion">
                            <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                        
                    </tr>
                
                `;


            });
            $('#pagos').html(template);
        })
    }
    $(document).on('keyup','#buscar-pagos',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_pagos(valor);
        }
        else{
            buscar_pagos();
        }
    })

     // SE CAPTURA EL ID PARA BORRAR UNA PROMOCION
     $(document).on('click','.borrar2',(e)=>{
        funcion="borrar_pago";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('pagid');
        const pago = $(elemento).attr('pagp');
        const banco = $(elemento).attr('pagban');
        const codigo = $(elemento).attr('pagcod');


        //SweetAlert
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Desea Eliminar '+banco+'?',
            text: "Esta accion no podra revertirse!",
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                //para borrar la promocion
                $.post('../Controlador/CargasController.php',{id,funcion},(response)=>{
                    edit==false;
                    if (response=='borrado') {
                        swalWithBootstrapButtons.fire(
                            'Borrado!',
                            'El medio '+banco+' se elimino.',
                            'success'   
                        )
                        buscar_pagos();
                    }
                    else{
                        swalWithBootstrapButtons.fire(
                            'No se Pudo Borrar!',
                            'El medio '+banco+' no se elimino.',
                            'error'
                        )    
                    }
                })

            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelado',
                'El medio '+banco+' no fue borrada',
                'error'
              )
            }
        })
    })
   //==========================================================Medios de pago=======================================================================//



   //==========================================================Obras Sociales=======================================================================//

   $('#form-crear-obra').submit(e=>{
    let obra = $('#obra').val();
    let referencia = $('#referencia').val();


    funcion='crearobra';
    $.post('../Controlador/CargasController.php',{obra,referencia,funcion},(response)=>{
        console.log(response);
        if (response=='agregado') {
            $('#agregado-obra').hide('slow');
            $('#agregado-obra').show(1000);
            $('#agregado-obra').hide(2000);
            $('#form-crear-obra').trigger('reset');
            buscar_obras();
        }
        else{
            $('#no-agregado-obra').hide('slow');
            $('#no-agregado-obra').show(1000);
            $('#no-agregado-obra').hide(2000);
            $('#form-crear-obra').trigger('reset');
        }
    })
    e.preventDefault();
});


//   ======================                        =================================                ======================================


function buscar_obras(consulta3){
    funcion='buscar3';
    $.post('../Controlador/CargasController.php',{consulta3,funcion},(response)=>{
        //console.log(response);
        const obrasp = JSON.parse(response);
        let template='';
        obrasp.forEach(obras => {
            template+=`
                <tr obraid="${obras.id}" obra="${obras.obra}" obraref="${obras.referencia}">
                    <td>${obras.obra}</td>
                    <td>${obras.referencia}</td>
                    <td>

                    <button class="borrar3 btn btn-danger" title="Eliminar Obra social">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    
                </tr>
            
            `;


        });
        $('#obras').html(template);
    })
}
$(document).on('keyup','#buscar-obras',function(){
    let valor = $(this).val();
    if(valor!=''){
        buscar_obras(valor);
    }
    else{
        buscar_obras();
    }
})

//=====================ELIMINAR OBRA SOCIAL=====================//

$(document).on('click','.borrar3',(e)=>{
    funcion="borrar_obra";
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr('obraid');
    const obra = $(elemento).attr('obra');
    const referencia = $(elemento).attr('obraref');


    //SweetAlert
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-1'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Desea Eliminar '+obra+'?',
        text: "Esta accion no podra revertirse!",
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            //para borrar la promocion
            $.post('../Controlador/CargasController.php',{id,funcion},(response)=>{
                edit==false;
                if (response=='borrado') {
                    swalWithBootstrapButtons.fire(
                        'Borrado!',
                        'La Obra Social'+obra+' se elimino.',
                        'success'   
                    )
                    buscar_obras();
                }
                else{
                    swalWithBootstrapButtons.fire(
                        'No se Pudo Borrar!',
                        'La Obra Social'+obra+' no se elimino.',
                        'error'
                    )    
                }
            })

        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'La Obra Social '+obra+' no fue borrada',
            'error'
          )
        }
    })
})

   //==========================================================Obras Sociales=======================================================================//

});