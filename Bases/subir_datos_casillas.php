<?php
require_once '../conection/conexion.php';
for ($i=1; $i < 282; $i++) { 
    $nrows = $con->exec("INSERT INTO puestos_defensa_casillas VALUES (NULL, 0, 'RCBP', $i)"); 
    $nrows = $con->exec("INSERT INTO puestos_defensa_casillas VALUES (NULL, 1, 'RCBS1', $i)");
    $nrows = $con->exec("INSERT INTO puestos_defensa_casillas VALUES (NULL, 2, 'RCBS2', $i)");
    $nrows = $con->exec("INSERT INTO puestos_defensa_casillas VALUES (NULL, 3, 'RCBS3', $i)");
}

echo "Exito perro";