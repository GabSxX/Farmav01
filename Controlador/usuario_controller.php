<?php
include_once '../modelo/usuario.php';

$usuario = new Usuario();
session_start();
$id_usuario= $_SESSION['usuario'];
if($_POST['funcion'] == 'buscar_usuario'){
  /*Se realiza el Json que sera retornado en nuestro JS, mediante eso obtenemos todos los datos que nosotros queremos*/
  $json=array();
  $fecha_actual = new DateTime();
  $usuario->obtener_datos($_POST['dato']);
  foreach ($usuario->objetos as $objeto) {
    //calculo para obtener la edad de la persona , restando el año actual con la fecha de nacimiento
    $nacimiento = new DateTime($objeto->edad);
    $edad = $nacimiento->diff($fecha_actual);
    $edad_years = $edad->y;
    $json[]=array(
      'nombre'=>$objeto->nombre_us,
      'apellidos'=>$objeto->apellidos_us,
      'edad'=>$edad_years,
      'dni'=>$objeto->dni_us,
      'tipo'=>$objeto->nombre_tipo,
      'telefono'=>$objeto->telefono_us,
      'residencia'=>$objeto->residencia_us,
      'correo'=>$objeto->correo_us,
      'sexo'=>$objeto->sexo_us,
      'avatar'=>'../img/'.$objeto->avatar,
      'tipo_usuario'=>$objeto->us_tipo
    );
  }
  /*Lo que hace json_encode es que nos devuelve un json codificado y lo convierte en string para poder usarlo en nuestro JS
  el indice 0 es por que siempre va a encontrar una sola coincidencia */
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;

  /*Se envia el Json al Archivo JS*/
}

if($_POST['funcion'] == 'capturar_datos'){
  /*Se realiza el Json que sera retornado en nuestro JS, mediante eso obtenemos todos los datos que nosotros queremos*/
  $json=array();
  $id_usuario=$_POST['id_usuario'];
  $usuario->obtener_datos($id_usuario);
  foreach ($usuario->objetos as $objeto) {
    $json[]=array(
      'telefono'=>$objeto->telefono_us,
      'residencia'=>$objeto->residencia_us,
      'correo'=>$objeto->correo_us,
      'sexo'=>$objeto->sexo_us
    );
  }
  /*Lo que hace json_encode es que nos devuelve un json codificado y lo convierte en string para poder usarlo en nuestro JS
  el indice 0 es por que siempre va a encontrar una sola coincidencia */
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;

  /*Se envia el Json al Archivo JS*/
}

/*Funcion que recibe lo de Usuario.js el cual cuando nosotros damos click en editar se completa automaticamente los campos para editar la informacion*/
if($_POST['funcion'] == 'editar_usuario'){
  $id_usuario=$_POST['id_usuario'];
  $telefono=$_POST['telefono'];
  $residencia=$_POST['residencia'];
  $correo=$_POST['correo'];
  $sexo=$_POST['sexo'];
  $usuario->editar($id_usuario,$telefono,$residencia,$correo,$sexo);
  echo 'editado';
}

//Funcion que sirve para el cambio de contraseña
if($_POST['funcion'] == 'cambiar_contra'){
  $id_usuario=$_POST['id_usuario'];
  $oldpass=$_POST['oldpass'];
  $newpass=$_POST['newpass'];
  $usuario->cambiar_contra($id_usuario,$oldpass,$newpass);
}

//Funcion para el cambio de avatar
if($_POST['funcion'] == 'cambiar_foto'){
  if(($_FILES['photo']['type']=='image/jpeg')||($_FILES['photo']['type']=='image/png')||($_FILES['photo']['type']=='image/gif')){
    $nombre=uniqid().'-'.$_FILES['photo']['name'];
    $ruta='../img/'.$nombre;
    move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
    $usuario->cambiar_photo($id_usuario,$nombre);
    foreach ($usuario->objetos as $objeto) {
      // borrado de imagen repetida...
      unlink('../img/'.$objeto->avatar);
    }
    $json= array();
    $json[]=array(
      'ruta'=>$ruta,
      'alert'=>'edit'
    );
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
  }
  else {
    // en caso de no ser de un formato valido..
    $json= array();
    $json[]=array(
      'alert'=>'noedit'
    );
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
  }
}

//Funcion para la busqueda de usuarios

if($_POST['funcion']=='buscar_usuarios_adm'){
  $json=array();
  $fecha_actual = new DateTime();
  $usuario->buscar();
  foreach ($usuario->objetos as $objeto) {
    $nacimiento = new DateTime($objeto->edad);
    $edad = $nacimiento->diff($fecha_actual);
    $edad_years = $edad->y;
    $json[]=array(
      'id'=>$objeto->id_usuario,
      'nombre'=>$objeto->nombre_us,
      'apellidos'=>$objeto->apellidos_us,
      'edad'=>$edad_years,
      'dni'=>$objeto->dni_us,
      'tipo'=>$objeto->nombre_tipo,
      'telefono'=>$objeto->telefono_us,
      'residencia'=>$objeto->residencia_us,
      'correo'=>$objeto->correo_us,
      'sexo'=>$objeto->sexo_us,
      'avatar'=>'../img/'.$objeto->avatar
    );
  }

    $jsonstring = json_encode($json);
    echo $jsonstring;
 }
 if($_POST['funcion']=='crear_usuario'){
      $nombre = $_POST['nombre'];
      $ape= $_POST['ape'];
      $edad = $_POST['edad'];
      $dni = $_POST['dni'];
      $pass = $_POST['pass'];
      $tipo=2;
      $avatar='avatar.png';
      $usuario->crear($nombre,$ape,$edad,$dni,$pass,$tipo,$avatar);
 }

 if ($_POST['funcion']=='borrar_usuario'){
   // code...
   $pass=$_POST['pass'];
   $id_borrado=$_POST['id_usuario'];
   $usuario->borrar($pass,$id_borrado,$id_usuario);
 }

//========================== Lado del Cliente (BETA) ======================
 
if($_POST['funcion']=='cliente'){
  $PER_NOMBRE = $_POST['PER_NOMBRE'];
  $PER_APELLIDO= $_POST['PER_APELLIDO'];
  $PER_FECHA_NACIMIENTO = $_POST['PER_FECHA_NACIMIENTO'];
  $PER_EMAIL = $_POST['PER_EMAIL'];
  $PER_USERNAME = $_POST['PER_USERNAME'];
  $PER_PASSWORD = $_POST['PER_PASSWORD'];
  $autom = $_POST['autom'];


  $usuario->crearCli($PER_NOMBRE,$PER_APELLIDO,$PER_FECHA_NACIMIENTO,$PER_EMAIL,$PER_USERNAME,$PER_PASSWORD,$autom);
}

 
 
 ?>
