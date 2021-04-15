<?php
require_once '../conection/conexion.php';

$sentencia = 'SELECT * FROM borrar';
$stm = $con->query($sentencia);
$borrar = $stm->fetchAll(PDO::FETCH_ASSOC);

$sentencia = 'SELECT id_ciudadano, telefono FROM ciudadanos WHERE id_ciudadano > 3';
$stm = $con->query($sentencia);
$ciudadanos = $stm->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
$i=0;
foreach($ciudadanos as $ciudadano){
    $ntelefono = $borrar[$i]['telefono'];
    $ncalle = $borrar[$i]['dir_calle'];
    $nid = $borrar[$i]['numero_identificacion'];

    $id = $ciudadano['id_ciudadano'];

    $sql_editar = "UPDATE ciudadanos SET numero_identificacion = ? WHERE id_ciudadano = ?";
    $sentencia_agregar = $con->prepare($sql_editar);
    try {
        $sentencia_agregar->execute(array($nid, $id));
    } catch (\Throwable $th) {
        $th;
    }
    $i++;
}

