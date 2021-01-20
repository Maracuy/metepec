<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../conection/conexion.php';

$id_ciudadano = $_GET['id'];
$up = $_SESSION['user']['id_ciudadano'];

if(isset($_GET['rz']) && $_GET['rz'] != ''){
    $puesto = $_GET['rz'];
}elseif(isset($_GET['rg']) && $_GET['rg'] != ''){
    $puesto = $_GET['rg'];
}elseif(isset($_GET['puesto']) && $_GET['puesto'] != ''){
    $puesto = $_GET['puesto'];
}




function nuevo($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "INSERT INTO altas_defensa (id_ciudadano, iz_zona, up) VALUES ($id_ciudadano, $puesto, $up)";
    $sentencia_puestos = $con->prepare($sql_puestos);
    try{  
        $sentencia_puestos->execute();
        header("Location: ../electoral.php?id=".$id_ciudadano);
    }catch(Exception $e){
        echo 'Error al agregar un puesto: ',  $e->getMessage(), "\n";
        die();
    }  

}

function nuevorz($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "INSERT INTO altas_defensa (id_ciudadano, id_zona, up) VALUES ($id_ciudadano, $puesto, $up)";
    $sentencia_puestos = $con->prepare($sql_puestos);
    try{  
        $sentencia_puestos->execute();
        header("Location: ../electoral.php?id=".$id_ciudadano);
    }catch(Exception $e){
        echo 'Error al agregar un puesto: ',  $e->getMessage(), "\n";
        die();
    }  

}


function nuevorg($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "INSERT INTO altas_defensa (id_ciudadano, id_rg, up) VALUES ($id_ciudadano, $puesto, $up)";
    $sentencia_puestos = $con->prepare($sql_puestos);
    try{  
        $sentencia_puestos->execute();
        header("Location: ../electoral.php?id=".$id_ciudadano);
    }catch(Exception $e){
        echo 'Error al agregar un puesto: ',  $e->getMessage(), "\n";
        die();
    }  

}


if(isset($_GET['rz']) && $_GET['rz'] != ''){

    nuevorz($con, $id_ciudadano, $puesto, $up);
}

if(isset($_GET['rg']) && $_GET['rg'] != ''){
    nuevorg($con, $id_ciudadano, $puesto, $up);
}


if ($_GET['nuevo'] == '1'){
    echo 'Entra aqui';
    nuevo($con, $id_ciudadano, $puesto, $up);
}


?>
