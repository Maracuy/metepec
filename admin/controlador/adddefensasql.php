<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../conection/conexion.php';

$id_ciudadano = $_GET['id'];
$casilla = $_GET['casilla'];



$sql_puestos = "UPDATE puestos_defensa SET id_ciudadano = $id_ciudadano WHERE id_puesto = $casilla";
$sentencia_puestos = $con->prepare($sql_puestos);
try{  
    $sentencia_puestos->execute();
    header("Location: ../defensa.php");
}catch(Exception $e){
    echo 'Error al agregar un puesto: ',  $e->getMessage(), "\n";
    die();
}  


?>