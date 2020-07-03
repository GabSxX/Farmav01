<?php 
  //Funcion la cual proviene de usuario_controller, en el cual el mismo sirve para poder capturar los datos del usuario previamente cargados y editarlos
  function editar($id_usuario,$telefono,$residencia,$correo,$sexo){
    $sql="UPDATE usuario SET telefono_us=:telefono, residencia_us=:residencia,correo_us=:correo,sexo_us=:sexo where id_usuario=:id";
    //Esto se cumplira siempre y cuando el id_usuario = a id (update de datos)
    $query = $this->acceso->prepare($sql);
    //se introducen las variables...
    $query->execute(array(':id'=>$id_usuario,':telefono'=>$telefono,':residencia'=>$residencia,':correo'=>$correo,':sexo'=>$sexo));
  }

  //funcion proveniente de usuario_controller el cual permite la actualizacion de la Contraseña
  function cambiar_contra($id_usuario,$oldpass,$newpass){
    $sql="SELECT * FROM usuario where id_usuario=:id and contrasena_us=:oldpass";
    //Esto se cumplira siempre y cuando el id_usuario = a id (update de datos)
    $query = $this->acceso->prepare($sql);
    //se introducen las variables...
    $query->execute(array(':id'=>$id_usuario,':oldpass'=>$oldpass));
    //retorna el query , y luego hace la consulta (fetchall recorre todos los datos y los guarda en objetos)
    $this->objetos= $query->fetchall();
    //Se comprueba que la contraseña no este vacia, si esta vacia es por que no encontro el usuario con la contraseña que nosotros ponemos
    if(!empty($this->objetos)){
      $sql="UPDATE usuario SET contrasena_us=:newpass where id_usuario=:id";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':id'=>$id_usuario,':newpass'=>$newpass));
      echo 'update';
    }
    else {
      echo 'noupdate';
    }
  }
//funcion proveniente de usuario_controller el cual permite cambiar imagen de avatar.
//Lo que se hace primero es borrar las fotos repetidas para despues si
  function cambiar_photo($id_usuario,$nombre){
    $sql="SELECT avatar FROM usuario where id_usuario=:id";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':id'=>$id_usuario));
    $this->objetos= $query->fetchall();

    $sql="UPDATE usuario SET avatar=:nombre where id_usuario=:id";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':id'=>$id_usuario,':nombre'=>$nombre));
  return $this->objetos;
  }


  ?>
