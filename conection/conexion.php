<?php
$conect = 'mysql:host=localhost;dbname=metepec;charset=utf8';
$username = 'en_linux';
$dbpass = '';

try {
    $con = new PDO($conect, $username , $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  } catch(PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
  }


  CREATE USER 'en_linux'@'localhost' IDENTIFIED BY '';

  GRANT ALL PRIVILEGES ON * . * TO 'en_linux'@'localhost';
