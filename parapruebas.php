<?php
require_once 'conection/conexion.php';

$id_beneficiario = 2914;

$sql_checa = $con->prepare('SELECT id_alta FROM altas WHERE id_beneficiario =? AND id_programa = 1');
$sql_checa->execute(array($id_beneficiario));
$id_alta = $sql_checa->fetch();

if($id_alta){
    $id_alta = $id_alta[0];

    $sql_elimina = $con->prepare('DELETE FROM altas WHERE id_alta = ?');
    $sql_elimina->execute(array($id_alta));
}else{
    echo "no existe el 1";
}

