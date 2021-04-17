<?php

require_once '../../conection/conexion.php';



function crear($con, $id, $user, $passsegura){
    $sql_editar = "UPDATE ciudadanos SET usuario_sistema = ?, contrasenia = ? WHERE id_ciudadano = ?";
    $sentencia_agregar = $con->prepare($sql_editar);
    try{
        $sentencia_agregar->execute(array($user, $passsegura, $id));
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        die();
    }  
}

function actualizar($con, $id, $passsegura){
    $sql_editar = "UPDATE ciudadanos SET contrasenia = ? WHERE id_ciudadano = ?";
    $sentencia_agregar = $con->prepare($sql_editar);
    try{
        $sentencia_agregar->execute(array($passsegura, $id));
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        die();
    }  
}



if(array_key_exists("crear",$_POST)){
    $id = $_POST['id'];
    $user = $_POST['usuario_sistema'];
    $pass = $_POST['contrasenia'];
    $passsegura = password_hash($pass, PASSWORD_DEFAULT);

    crear($con, $id, $user, $passsegura);
    header("Location: ../permisos.php?id=$id");
}

if(array_key_exists("actualizar",$_POST)){
    $id = $_POST['id'];
    $pass = $_POST['contrasenia'];
    $passsegura = password_hash($pass, PASSWORD_DEFAULT);

    actualizar($con, $id, $passsegura);
    header("Location: ../permisos.php?id=$id");
}




?>