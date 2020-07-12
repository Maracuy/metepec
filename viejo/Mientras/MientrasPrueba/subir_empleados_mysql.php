<?php 
require_once 'conexion.php';

$usuario = $_POST['usuario'];
$nombres = $_POST['nombres'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$nivel = $_POST['nivel'];
$password = $_POST['password'];
$email = $_POST['email'];
$descripcion = $_POST['descripcion'];

$sql_agregar = 'INSERT INTO empleados VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)';
$sentencia_agregar = $con->prepare($sql_agregar);
  
try{
    $sentencia_agregar->execute(array($usuario, $nombres, $apellido_p, $apellido_m, $edad, $telefono, $nivel, $password, $email, $descripcion));
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
header('location:subir_empleados.php');