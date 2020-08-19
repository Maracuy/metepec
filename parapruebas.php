<?php
require_once 'conection/conexion.php';

$id_beneficiario = 2914;



$sql_altas= "SELECT a.id_alta, a.id_beneficiario, a.exito, p.id_programas, p.abreviatura, p.nombre, b.nombres, b.apellido_m, b.apellido_p FROM altas a, programas p, beneficiarios b WHERE a.id_beneficiario =? AND b.id_beneficiario=? AND p.id_programas=a.id_programa GROUP BY a.id_alta;";
$consulta_altas = $con->prepare($sql_altas);
$consulta_altas->execute(array($id_beneficiario, $id_beneficiario));
$result_altas = $consulta_altas->fetchAll();

echo "<br>";


if($result_altas[0]['a.exito']){

}

