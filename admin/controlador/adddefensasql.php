<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
if (!$_GET) {
echo "Algo salio mal";
die();
}
require_once '../../conection/conexion.php';

$id_ciudadano = $_GET['id'];
$up = $_SESSION['user']['id_ciudadano'];

if(isset($_GET['rz']) && $_GET['rz'] != ''){
    $puesto = $_GET['rz'];
}elseif(isset($_GET['rg']) && $_GET['rg'] != ''){
    $puesto = $_GET['rg'];
}elseif(isset($_GET['casilla']) && $_GET['casilla'] != ''){
    $puesto = $_GET['casilla'];
}


function changeStatus($con, $id_ciudadano, $estatus){
    $status = ($estatus == 1) ? 0 : 1;
    $nrows = $con->exec("UPDATE altas_defensa SET confirmacion = $status WHERE id_ciudadano = $id_ciudadano");
    header("Location: ../defensa.php");
}


function nuevo($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "INSERT INTO altas_defensa (id_ciudadano, id_puesto, up) VALUES ($id_ciudadano, $puesto, $up)";
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
        echo 'Error al agregar un RZ: ',  $e->getMessage(), "\n";
        die();
    }  
}

function borrarAlta($con, $id_ciudadano){
    $nrows = $con->exec("DELETE FROM altas_defensa WHERE id_ciudadano = $id_ciudadano");
    header("Location: ../defensa.php");
}


function nuevorg($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "INSERT INTO altas_defensa (id_ciudadano, id_rg, up) VALUES ($id_ciudadano, $puesto, $up)";
    $sentencia_puestos = $con->prepare($sql_puestos);
    try{  
        $sentencia_puestos->execute();
        header("Location: ../electoral.php?id=".$id_ciudadano);
    }catch(Exception $e){
        echo 'Error al agregar un RG: ',  $e->getMessage(), "\n";
        die();
    }  

}

if (isset($_GET['borrar']) && $_GET['borrar'] != 0) {
    borrarAlta($con, $id_ciudadano);
}


if(isset($_GET['rz']) && $_GET['rz'] != ''){
    nuevorz($con, $id_ciudadano, $puesto, $up);
}

if(isset($_GET['rg']) && $_GET['rg'] != ''){
    nuevorg($con, $id_ciudadano, $puesto, $up);
}

if (isset($_GET['status']) && $_GET['status'] != '') {
    $status = (isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : '';
    changeStatus($con, $id_ciudadano, $status);
}

if (isset($_GET['nuevo']) && $_GET['nuevo'] == '1'){
    echo 'Entra aqui';
    nuevo($con, $id_ciudadano, $puesto, $up);
}

$con=null;
?>
