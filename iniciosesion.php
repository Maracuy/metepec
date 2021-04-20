<?php
require_once 'conection/conexion.php';
session_start();


$user = $_POST['usuario'];
$password = $_POST['password'];
$contador = 0;
$loguser = $con->prepare("SELECT * FROM ciudadanos WHERE usuario_sistema = ?");

try{
    $loguser->execute(array($user));
    $usuarios = $loguser->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


if ($usuarios){
    foreach($usuarios as $usuario){
        $uppass = $usuario['contrasenia'];
        if (password_verify($password, $uppass)){
            $contador++;
        }
    }
}else{
    header('Location: /?fail=2');
}

if($contador > 0){
    $_SESSION['user'] = $usuario;
    header('Location: admin/');
}else{
    header('Location: /?fail=1');
}