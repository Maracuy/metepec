<?php
date_default_timezone_set('America/Mexico_City');

$conect = 'mysql:host=localhost;dbname=u235387680_metepec;charset=utf8';
$username = 'u235387680_adminmetepec';
$dbpass = 'M3t3p3cSp3rt1k4';

try {
    $con = new PDO($conect, $username , $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }
