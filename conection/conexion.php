<?php
$conect = 'mysql:host=127.0.0.1;dbname=metepec;charset=utf8';
$username = 'en_linux';
$dbpass = '';

try {
    $con = new PDO($conect, $username , $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }
