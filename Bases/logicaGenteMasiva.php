<?php

require_once "../conection/conexion.php";

$stm = $con->query("SELECT * FROM puestos");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);


foreach($rows as $row){
    
    $id_ciudadano = $row['id'];
    $pos = $row['pos'];
    $seccion = $row['nseccion'];
    $c = $pos[1];

    $stm = $con->query("SELECT id_casilla FROM casillas WHERE id_seccion = $seccion AND casilla = $c");
    $casilla_id = $stm->fetch(PDO::FETCH_ASSOC);
    $casilla_id = intval($casilla_id['id_casilla']);
   
    if ($pos[0] == 'P') {
        $p=0;
    }else{
        $p=1;
    }



    $stm = $con->query("SELECT id_puesto FROM puestos_defensa_casillas WHERE id_casilla = $casilla_id AND tipo_puesto = $p GROUP BY id_casilla");
    $id_puesto = $stm->fetch(PDO::FETCH_ASSOC);

    $id_puesto = intval($id_puesto['id_puesto']);

    
    $nrows = $con->exec("INSERT INTO altas_defensa (id_ciudadano, id_puesto) VALUES ($id_ciudadano, $id_puesto)");

    
 }
