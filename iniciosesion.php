<?php
require_once 'conection/conexion.php';
session_start();


$usuario = $_POST['usuario'];
$password = $_POST['password'];

$loguser = $con->prepare("SELECT * FROM empleados WHERE usuario = ? AND password = ?");

try{
    $loguser->execute(array($usuario, $password));
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
$resultado_unico= $loguser->fetch();

if($resultado_unico){
    $_SESSION['user'] = $resultado_unico;
    header('Location:admin/');
}else{
    include 'login_fail.html';
}