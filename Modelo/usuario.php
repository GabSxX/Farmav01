<?php
include_once 'Conexion.php';
class Usuario{
  //cada vez que instanciamos una variable tipo usuario automaticamente hacemos la conexion pdo
  var $objetos;
  public function __construct(){
    $db = new Conexion();
      $this->acceso = $db->pdo;
  }

  //METODOS//
  function Loguearse($dni,$pass){
    //se realiza la union de las tablas para identificar que tipo de usuario ingresa
    $sql="SELECT * FROM usuario inner join tipo_us on us_tipo=id_tipo_us where dni_us=:dni and contrasena_us=:pass";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':dni'=>$dni,':pass'=>$pass));
    //fetchall realiza una busqueda de todos los resultados de la consulta de pdo.
    $this->objetos= $query->fetchall();
    //el metodo de loguearse nos retornara un obejeto.
    return $this->objetos;
  }

  function obtener_datos($id){
    //se realiza la union de las tablas para identificar que tipo de usuario ingresa
    $sql="SELECT * FROM usuario join tipo_us on us_tipo = id_tipo_us and id_usuario = :id";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':id'=>$id));
    //fetchall realiza una busqueda de todos los resultados de la consulta de pdo.
    $this->objetos= $query->fetchall();
    //el metodo de loguearse nos retornara un obejeto.
    return $this->objetos;
  }

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

// FUNCION QUE PERMITE BUSCAR USUARIOS
  function buscar(){
    if (!empty($_POST['consulta'])){
        $consulta=$_POST['consulta'];
        $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us LIKE :consulta";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':consulta'=>"%$consulta%"));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    else {
      //SI NO TECLEO NADA ME MOSTRARA TODOS LOS USUARIOS.
      $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us NOT LIKE '' ORDER BY id_usuario LIMIT 25";
      $query = $this->acceso->prepare($sql);
      $query->execute();
      $this->objetos=$query->fetchall();
      return $this->objetos;
    }
  }
}
 ?>
