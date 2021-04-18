<?php
require_once 'conection/conexion.php';
session_start();


$user = $_POST['usuario'];
$password = $_POST['password'];
$contado = 0;
$loguser = $con->prepare("SELECT * FROM ciudadanos WHERE usuario_sistema = ?");

try{
    $loguser->execute(array($user));
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
$usuarios = $loguser->fetchAll(PDO::FETCH_ASSOC);


if ($usuarios){
    foreach($usuarios as $usuario){
        $uppass = $usuario['contrasenia'];
        if (password_verify($password, $uppass)){
                $_SESSION['user'] = $usuario;
                header('Location: admin/');
            }
    }
}else{
    include 'login_fail.html';
}
