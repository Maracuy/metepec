<?php

require_once 'conection/conexion.php';

$stm = $con->query("SELECT * FROM datita");
$datita = $stm->fetchAll(PDO::FETCH_ASSOC);

$casilla = 0;

foreach ($datita as $data) {

    if($data['casilla'] != 'BA'){
        $casilla = 'cc';
        $casilla.= $data['casilla'][1];
    }
    echo $casilla;
}