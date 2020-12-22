<?php
require_once '../conection/conexion.php';
for ($i=1; $i < 282; $i++) { 
    $nrows = $con->exec("INSERT INTO puestos_defensa VALUES (NULL, NULL, 0, 'RCBP', $i)"); 
    $nrows = $con->exec("INSERT INTO puestos_defensa VALUES (NULL, NULL, 1, 'RCBS1', $i)");
    $nrows = $con->exec("INSERT INTO puestos_defensa VALUES (NULL, NULL, 2, 'RCBS2', $i)");
    $nrows = $con->exec("INSERT INTO puestos_defensa VALUES (NULL, NULL, 3, 'RCBS3', $i)");
}