<?php
 session_start();

if(!$_POST){
    die();
  }
 require_once '../../conection/conexion.php';
 
 $ciudadano = $_SESSION['user']['id_ciudadano'];
 $alta_reporte = $_POST;
 var_dump($alta_reporte);

 $sql = "INSERT INTO messag(mensaje,id_ciudadano) VALUES('$alta_reporte[reporte]','$ciudadano')";
 $sentencia_agregar = $con->prepare($sql); 
 $sentencia_agregar->execute();

 header("Location: ../reportes.php");
?>
