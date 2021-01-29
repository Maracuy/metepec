<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
if(empty($_POST)){
    echo "No exite esta pagina";
    die();
}
require_once '../../conection/conexion.php';



$id =  intval($_POST['id']) ;
$previo = intval($_POST['previo']);
$posicion = ($_POST['posicion'] != '') ? $_POST['posicion'] : 0;
$asistio = intval($_POST['asistio']);
$compromiso = $_POST['compromiso'];
$afiliacion = ($_POST['afiliacion'] != '') ? $_POST['afiliacion'] : "";
$cubre = ($_POST['cubre'] != "") ? intval($_POST['cubre']) : "";
$origen = ($_POST['origen'] != '') ? $_POST['origen'] : '0';


$sql_editar = "UPDATE altas_defensa SET previo = ?, posicion_prev = ?, compromiso = ?, afiliacion = ?, origen = ?, cubre = ? WHERE id_ciudadano = ?";
$sentencia_agregar = $con->prepare($sql_editar);


try{
    $sentencia_agregar->execute(array($participo_eleccion,$posicion,$compromiso,$afiliacion,$origen, $cubre, $id));
    header("Location: ../electoral.php?id=$id");
}catch(Exception $e){
    echo 'Ocurrio un error al intentar la alta de defensa: ',  $e->getMessage(), "\n";
    die();
}  
    
?><!-- fin del php -->