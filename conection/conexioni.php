<?php
$server = "127.0.0.1"; 
$usuario = "en_linux";
$password = "";
$database = "metepec";

try {
    $mysqli = new mysqli($server, $usuario, $password, $database);
    $mysqli->set_charset("utf8");
  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }