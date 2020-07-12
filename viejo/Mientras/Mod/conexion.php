<?php
$conect = 'mysql:host=localhost;dbname=mtpkbps3_wp873';
$username = 'mtpkbps3_wp873';
$dbpass = '0.kz8M4(!hpS8N[-';

try {
    $con = new PDO($conect, $username , $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    //$datos = $con->query('SELECT * FROM colores');
    //foreach($datos as $row)
    echo "Claro! esto esta conectado";
  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }
