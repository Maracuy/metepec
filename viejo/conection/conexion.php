<?php
$conect = 'mysql:host=localhost;dbname=metepec';
$username = 'root';
$dbpass = '';

try {
    $con = new PDO($conect, $username , $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    mysqli_set_charset($con, 'utf8');
  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }
