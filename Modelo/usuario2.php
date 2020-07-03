<?php

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $nacimiento=$_POST['nacimiento'];
    $email=$_POST['email'];
    $usuario=$_POST['usuario'];
    $pass=md5($_POST['pass']);
    //al preprar la consulta se evita una inyeccion sql
    $consulta=$pdo->prepare("INSERT INTO usuario(nombre,apellido,nacimiento,email,usuario,pass)
        VALUES(:nombre,:apellido,:nacimiento,:email,:usuario,:pass)");

    $consulta->bindParam(':nombre',$nombre);
    $consulta->bindParam(':apellido',$apellido);
    $consulta->bindParam(':nacimiento',$nacimiento);
    $consulta->bindParam(':email',$email);
    $consulta->bindParam(':usuario',$usuario);
    $consulta->bindParam(':pass',$pass);

    if ($consulta->execute()) {
        # code...
        echo "Datos Almacenados";
    }
    else {
        echo "erro";
    }

