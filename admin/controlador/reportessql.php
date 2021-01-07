<?php
 session_start();

if(!$_POST){
    die();
}
 $ciudadano = $_SESSION['user']['id_ciudadano'];
 $alta_reporte = $_POST;
 var_dump($alta_reporte);
?>