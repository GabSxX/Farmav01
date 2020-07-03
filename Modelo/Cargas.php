<?php 
include 'conexion.php';
class Cargas{
 var $objetos;
  public function __construct(){
    $db= new Conexion();
    $this->acceso=$db->pdo;
  }
  //===================================================================== PROMOCIOENES=====================================================================//
  function crear($nombre_prom,$fecha_inicio/*,$fecha_cierre*/,$precio,$imagen){
      $sql="SELECT id_promociones FROM promociones where nombre=:nombre";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':nombre'=>$nombre_prom));
      $this->objetos=$query->fetchall();
    
    if (!empty($this->objetos)){
          echo "no_agregado";
    }
    else {
        $sql="INSERT INTO promociones(nombre,fecha_inicio/*,fecha_cierre*/,precio,imagen) values (:nombre,:fecha_inicio/*,:fecha_cierre*/,:precio,:imagen);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre_prom,':fecha_inicio'=>$fecha_inicio/*,':fecha_cierre'=>$fecha_cierre*/,':precio'=>$precio,':imagen'=>$imagen));
        echo "agregado";
    }
  }

    //Buscar entre las promociones
    function buscar(){
        if (!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM promociones  where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
          }
        else {
          //SI NO TECLEO NADA ME MOSTRARA TODOS LOS USUARIOS.
          $sql="SELECT * FROM promociones  where nombre NOT LIKE '' ORDER BY id_promociones LIMIT 25";
          $query = $this->acceso->prepare($sql);
          $query->execute();
          $this->objetos=$query->fetchall();
          return $this->objetos;
        }
    }

    //Cambiar el logo de una Promocion
    function cambiar_logo($id,$nombre){
      $sql="SELECT imagen FROM promociones where id_promociones=:id";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':id'=>$id));
      $this->objetos= $query->fetchall();
    
      $sql="UPDATE promociones SET imagen=:nombre where id_promociones=:id";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':id'=>$id,':nombre'=>$nombre));
      return $this->objetos;

    }

    //Borar una promocion
    function borrar_promo($id){
      $sql="DELETE FROM promociones where id_promociones =:id";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':id'=>$id));
        if(!empty($query->execute(array(':id'=>$id)))){
          echo 'borrado';
        }
        else {
          echo 'no_borrado';
        }
    }

    //Editar una promocion
    function editar($nombre_prom,$precio,$id_editado,$fecha_inicio){
      $sql="UPDATE promociones SET nombre=:nombre_prom, precio=:precio, fecha_inicio=:fecha_inicio where id_promociones=:id";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':id'=>$id_editado,':nombre_prom'=>$nombre_prom, ':precio'=>$precio, ':fecha_inicio'=>$fecha_inicio));
      echo 'edit';
    }
  //===================================================================== PROMOCIOENES=====================================================================//    


  //===================================================================== Medios de Pago=====================================================================// 

    function crearpago($pago,$banco,$codigo){
      $sql="SELECT ID_MEDIOPAGO FROM mediosdepago where MP_BANCO=:banco";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':banco'=>$banco));
      $this->objetos=$query->fetchall();

      if (!empty($this->objetos)){
          echo "no_agregado";
      }
      else {
        $sql="INSERT INTO mediosdepago(MP_CODIGO, MP_DESCRIPCION, MP_BANCO) values (:codigo,:pago,:banco);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':codigo'=>$codigo,':pago'=>$pago, ':banco'=>$banco));
        echo "agregado";
      }
    }
    //Buscar entre los medios
  function buscar2(){
      if (!empty($_POST['consulta2'])){
          $consulta2=$_POST['consulta2'];
          $sql="SELECT * FROM mediosdepago  where MP_DESCRIPCION LIKE :consulta2";
          $query = $this->acceso->prepare($sql);
          $query->execute(array(':consulta2'=>"%$consulta2%"));
          $this->objetos=$query->fetchall();
          return $this->objetos;
        }
      else {
        //SI NO TECLEO NADA ME MOSTRARA TODOS LOS USUARIOS.
        $sql="SELECT * FROM mediosdepago  where MP_DESCRIPCION NOT LIKE '' ORDER BY ID_MEDIOPAGO LIMIT 25";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
      }
  }

      //Borar un medio
      function borrar_pago($id){
        $sql="DELETE FROM mediosdepago where ID_MEDIOPAGO =:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
          if(!empty($query->execute(array(':id'=>$id)))){
            echo 'borrado';
          }
          else {
            echo 'no_borrado';
          }
      }
  //===================================================================== Medios de Pago=====================================================================// 

  //=====================================================================Obras Sociales=====================================================================// 
  //crear Obra Social
  function crearobra($obra,$referencia){
    $sql="SELECT ID_OBRASOCIAL  FROM obrasocial where OS_CODIGO=:referencia";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':referencia'=>$referencia));
    $this->objetos=$query->fetchall();

    if (!empty($this->objetos)){
        echo "no_agregado";
    }
    else {
      $sql="INSERT INTO obrasocial(OS_CODIGO, OS_DESCRIP) values (:referencia,:obra);";
      $query = $this->acceso->prepare($sql);
      $query->execute(array(':referencia'=>$referencia,':obra'=>$obra));
      echo "agregado";
    }
  }

  //Buscar Obra Social 
  function buscar3(){
    if (!empty($_POST['consulta3'])){
        $consulta3=$_POST['consulta3'];
        $sql="SELECT * FROM obrasocial  where OS_CODIGO LIKE :consulta3";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':consulta3'=>"%$consulta3%"));
        $this->objetos=$query->fetchall();
        return $this->objetos;
      }
    else {
      //SI NO TECLEO NADA ME MOSTRARA TODOS LOS USUARIOS.
      $sql="SELECT * FROM obrasocial  where OS_CODIGO NOT LIKE '' ORDER BY ID_OBRASOCIAL LIMIT 25";
      $query = $this->acceso->prepare($sql);
      $query->execute();
      $this->objetos=$query->fetchall();
      return $this->objetos;
    }
}


      //Borar una Obra Social
      function borrar_obra($id){
        $sql="DELETE FROM obrasocial where ID_OBRASOCIAL =:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
          if(!empty($query->execute(array(':id'=>$id)))){
            echo 'borrado';
          }
          else {
            echo 'no_borrado';
          }
      }

  //=====================================================================Obras Sociales=====================================================================// 
}
?>