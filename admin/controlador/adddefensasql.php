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


function changeStatus($con, $id, $status){
    $status = ($status == 1) ? 0 : 1;
    $nrows = $con->exec("UPDATE puestos_defensa SET confirmacion = $status WHERE id_defensa = $id");
    header("Location: ../defensa.php");
}


function borrarAlta($con, $id_ciudadano){
    $nrows = $con->exec("DELETE FROM altas_defensa WHERE id_ciudadano = $id_ciudadano");
    header("Location: ../defensa.php");
}


function nuevo($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "UPDATE puestos_defensa SET id_ciudadano = $id_ciudadano, up = $up WHERE id_defensa = $puesto";
    $sentencia_puestos = $con->prepare($sql_puestos);
    try{  
        $sentencia_puestos->execute();
        header("Location: ../electoral.php?id=".$id_ciudadano);
    }catch(Exception $e){
        echo 'Error al agregar un nuevo: ',  $e->getMessage(), "\n";
        die();
    }  

}

if (isset($_GET['borrar']) && $_GET['borrar'] != 0) {
    borrarAlta($con, $id_ciudadano);
}


if (isset($_GET['status']) && $_GET['status'] != '') {
    $id = $_GET['id'];
    $status = (isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : '';
    changeStatus($con, $id, $status);
}

if (isset($_GET['nuevo']) && $_GET['nuevo'] == '1'){
    $puesto = $_GET['casilla'];
    nuevo($con, $id_ciudadano, $puesto, $up);
}

$con=null;
?>
