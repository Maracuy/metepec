<?php
require_once 'conection/conexion.php';

$sentencia = 'SELECT p.*, 
c.id_ciudadano, c.nombres, c.apellido_p, c.apellido_m, c.id_colonia, c.seccion_electoral, c.id_registrante, c.origen, c.telefono, 
l.abreviatura, l.nombre_colonia
FROM puestos_defensa p
LEFT JOIN ciudadanos c ON p.id_ciudadano = c.id_ciudadano
LEFT JOIN colonias l ON c.id_colonia = l.id
';
$stm = $con->query($sentencia);
$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);

var_dump($puestos);



?>