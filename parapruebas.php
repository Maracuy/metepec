<?php

require_once 'conection/conexion.php';


// Esto sirve para hacer deletes, no regresa nada.
//$nrows = $con->exec("DELETE FROM programas_federales WHERE id_programa_federal = 9");


//Para requerir informacion sin variables
$stm = $con->query("SELECT * FROM altas WHERE id_alta =");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);

// Para el last ID
$rowid = $con->lastInsertId();

?>