<?php

session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../../conection/conexion.php';

if(array_key_exists("eliminar_icono",$_POST)){

    $id = $_POST['id'];
    $tabla = $_POST['table_name'];

    if($tabla == "medio_contacto"){
        $sql_eliminar = 'DELETE FROM medio_contacto WHERE id=?';
    }
    elseif($tabla == "origenes"){
        $sql_eliminar = 'DELETE FROM origenes WHERE id=?';
    }
    elseif($tabla == "promotores"){
        $sql_eliminar = 'DELETE FROM promotores WHERE id=?';
    }

    $sentencia_eliminar = $con->prepare($sql_eliminar);
    $sentencia_eliminar->execute(array($id));

    header('Location:/metepec/admin/ajustes.php');
}


if(array_key_exists("guardar_origen",$_POST)){
    $nombre_origen = $_POST['nombre_origen'];
    $abreviatura_origen = $_POST['abreviatura_origen'];
    $descripcion_origen = $_POST['descripcion_origen'];


    $sql_agregar_origen = 'INSERT INTO origenes (id, nombre, abreviatura, descripcion) VALUES(NULL, ?, ?, ?)';
    $sentencia_agregar_origen = $con->prepare($sql_agregar_origen);
    
    try{
        $sentencia_agregar_origen->execute(array($nombre_origen, $abreviatura_origen, $descripcion_origen));
        header('Location:/metepec/admin/ajustes.php');
    }catch(Exception $e){
        echo 'Excepcion capturada:' . $e->getMessage();
    }
}


if(array_key_exists("guardar_medio",$_POST)){
    $nombre_medio = $_POST['nombre_medio'];
    $abreviatura_medio = $_POST['abreviatura_medio'];
    $descripcion_medio = $_POST['descripcion_medio'];


    $sql_agregar_medio = 'INSERT INTO medio_contacto (id, nombre, abreviatura, descripcion) VALUES(NULL, ?, ?, ?)';
    $sentencia_agregar_medio = $con->prepare($sql_agregar_medio);
    
    try{
        $sentencia_agregar_medio->execute(array($nombre_medio, $abreviatura_medio, $descripcion_medio));
        header('Location:/metepec/admin/ajustes.php');
    }catch(Exception $e){
        echo 'Excepcion capturada:' . $e->getMessage();
    }
}



if(array_key_exists("guardar_promotor",$_POST)){
    $nombre_promotor = $_POST['nombre_promotor'];
    $abreviatura_promotor = $_POST['abreviatura_promotor'];
    $descripcion_promotor = $_POST['descripcion_promotor'];


    $sql_agregar_promotor = 'INSERT INTO promotores (id, nombre, abreviatura, descripcion) VALUES(NULL, ?, ?, ?)';
    $sentencia_agregar_promotor = $con->prepare($sql_agregar_promotor);
    
    try{
        $sentencia_agregar_promotor->execute(array($nombre_promotor, $abreviatura_promotor, $descripcion_promotor));
        header('Location:/metepec/admin/ajustes.php');
    }catch(Exception $e){
        echo 'Excepcion capturada:' . $e->getMessage();
    }
}


if(array_key_exists("guardar_programa",$_POST)){
    $nombre_programa = $_POST['nombre_programa'];
    $abreviatura_programa = $_POST['abreviatura_programa'];
    $nivel_programa = $_POST['nivel_programa'];
    $descripcion_programa = $_POST['descripcion_programa'];

    $sql_programa = "INSERT INTO programas VALUES(NULL, ?, ?, ?, ?)";
    $sentencia_programas = $con->prepare($sql_programa);

    try{
        $sentencia_programas->execute(array($nombre_programa, $abreviatura_programa, $nivel_programa, $descripcion_programa));
        header('Location:/admin/ajustes.php');
    }catch(Exception $e){
        echo 'Falló al agregar programa:' . $e->getMessage();
    }
}



if($_GET){
    if($_GET['id_programa']){
        $id_programa = $_GET['id_programa'];
        $sentencia_programas = $con->prepare('DELETE FROM programas WHERE id_programas = ?');
        $sentencia_programas->execute(array($id_programa));
    }
}