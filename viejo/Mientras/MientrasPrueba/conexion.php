<?php
$conect = 'mysql:host=localhost;dbname=metepec';
$username = 'root';
$dbpass = '';

try {
    $con = new PDO($conect, $username , $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    //$datos = $con->query('SELECT * FROM colores');
    //foreach($datos as $row)
    echo "Claro esto esta conectado";
  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }
