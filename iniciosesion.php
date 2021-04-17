<?php
require_once 'conection/conexion.php';
session_start();


$user = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$loguser = $con->prepare("SELECT * FROM ciudadanos WHERE usuario_sistema = ?");

try{
    $loguser->execute(array($user));
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
$usuario= $loguser->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    if (password_verify($password, $usuario['contrasenia'])) {
        $_SESSION['user'] = $usuario;
        header('Location: admin/');
    }
}else{
    include 'login_fail.html';
}
