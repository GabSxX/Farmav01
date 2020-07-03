<?php 
include '../Modelo/Cargas.php';
$Cargas=new Cargas();
//==================================================================================PROMOCIONES===============================================================================//
if($_POST['funcion']=='crear'){
    $nombre_prom = $_POST['nombre_prom'];
    $fecha_inicio = $_POST['fecha_inicio'];
   /* $fecha_cierre = $_POST['fecha_cierre'];*/
    $precio = $_POST['precio'];
    $imagen='doc-on.png';
    $Cargas->crear($nombre_prom,$fecha_inicio/*,$fecha_cierre*/,$precio,$imagen);
     
}

//funcion para editar una promocion
if($_POST['funcion']=='editar'){
    $nombre_prom = $_POST['nombre_prom'];
    $precio = $_POST['precio'];
    $id_editado = $_POST['id_editado'];
    $fecha_inicio = $_POST['fecha_inicio'];

    $Cargas->editar($nombre_prom,$precio,$id_editado,$fecha_inicio);
     
}


//Funcion para buscar una promocion
if($_POST['funcion']=='buscar'){
    $Cargas->buscar();
    $json=array();
    foreach ($Cargas->objetos as $objeto) {
        # code...
        $json[]=array(
            'id'=>$objeto->id_promociones,
            'nombre'=>$objeto->nombre,
            'fecha_inicio'=>$objeto->fecha_inicio,
            'precio'=>$objeto->precio,
            'imagen'=>'../img/'.$objeto->imagen

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
} 


//funcion para cambiar de logo
if($_POST['funcion']=='cambiar_logo'){
    $id=$_POST['id_logo'];
    if(($_FILES['photo']['type']=='image/jpeg')||($_FILES['photo']['type']=='image/png')||($_FILES['photo']['type']=='image/gif')){
        $nombre=uniqid().'-'.$_FILES['photo']['name'];
        $ruta='../img/'.$nombre;
        move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
        $Cargas->cambiar_logo($id,$nombre);
        foreach ($Cargas->objetos as $objeto) {
          // borrado de imagen repetida...
            if($objeto->imagen!='doc-on.png'){
                unlink('../img/'.$objeto->imagen);
            }
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
//funcion para eliminar una promocion
if($_POST['funcion']=='borrar_promo'){
    $id=$_POST['id'];
    $Cargas->borrar_promo($id);
}

//==================================================================================PROMOCIONES===============================================================================//



//==================================================================================Medios de Pago===============================================================================//
if ($_POST['funcion']=='crearpago') {
    # code...
    $pago = $_POST['pago'];
    $banco = $_POST['banco'];
    $codigo = $_POST['codigo'];
    $Cargas->crearpago($pago,$banco,$codigo);
}

//Funcion para buscar un medio
if($_POST['funcion']=='buscar2'){
    $Cargas->buscar2();
    $json=array();
    foreach ($Cargas->objetos as $objeto) {
        # code...
        $json[]=array(
            'id'=>$objeto->id_mediopago,
            'pago'=>$objeto->mp_descripcion,
            'banco'=>$objeto->mp_banco,
            'codigo'=>$objeto->mp_codigo

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
} 

//funcion para eliminar un medio
if($_POST['funcion']=='borrar_pago'){
    $id=$_POST['id'];
    $Cargas->borrar_pago($id);
}

//==================================================================================Medios de Pago===============================================================================//



//==================================================================================Obras Sociales===============================================================================//
//Funcion para Crear Obra social
if ($_POST['funcion']=='crearobra') {
    # code...
    $obra = $_POST['obra'];
    $referencia = $_POST['referencia'];
    $Cargas->crearobra($obra,$referencia);
}

//Funcion para buscar una obra social
if($_POST['funcion']=='buscar3'){
    $Cargas->buscar3();
    $json=array();
    foreach ($Cargas->objetos as $objeto) {
        # code...
        $json[]=array(
            'id'=>$objeto->id_obrasocial,
            'obra'=>$objeto->os_descrip,
            'referencia'=>$objeto->os_codigo

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
} 


//Funcion para Eliminar Obrea Social
if($_POST['funcion']=='borrar_obra'){
    $id=$_POST['id'];
    $Cargas->borrar_obra($id);
}

//==================================================================================Obras Sociales===============================================================================//



?>