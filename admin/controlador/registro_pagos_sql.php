<?php
session_start();
require_once '../../conection/conexion.php';

if(!$_POST){
    die();
}

if($_POST){
    $id_pagos = ($_POST['id_pagos'] != "") ? $_POST['id_pagos']  : NULL;
    $forma_de_pago = ($_POST['forma_de_pago'] != "") ? $_POST['forma_de_pago']  : NULL;
    $year_on_curse = ($_POST['year_on_curse'] != "") ? $_POST['year_on_curse']  : NULL;
    $id_alta = ($_POST['id_alta'] != "") ? $_POST['id_alta']  : NULL;
    $fecha_de_pago_bim_1 = ($_POST['fecha_de_pago_bim_1'] != "") ? $_POST['fecha_de_pago_bim_1']  : NULL;
    $fecha_de_pago_bim_2 = ($_POST['fecha_de_pago_bim_2'] != "") ? $_POST['fecha_de_pago_bim_2']  : NULL;
    $fecha_de_pago_bim_3 = ($_POST['fecha_de_pago_bim_3'] != "") ? $_POST['fecha_de_pago_bim_3']  : NULL;
    $fecha_de_pago_bim_4 = ($_POST['fecha_de_pago_bim_4'] != "") ? $_POST['fecha_de_pago_bim_4']  : NULL;
    $fecha_de_pago_bim_5 = ($_POST['fecha_de_pago_bim_5'] != "") ? $_POST['fecha_de_pago_bim_5']  : NULL;
    $fecha_de_pago_bim_6 = ($_POST['fecha_de_pago_bim_6'] != "") ? $_POST['fecha_de_pago_bim_6']  : NULL;

    $pago = array(
        $id_pagos,
        $forma_de_pago,
        $year_on_curse,
        $id_alta,
        $fecha_de_pago_bim_1,
        $fecha_de_pago_bim_2,
        $fecha_de_pago_bim_3,
        $fecha_de_pago_bim_4,
        $fecha_de_pago_bim_5,
        $fecha_de_pago_bim_6
    );

}

function registrarPago($con, $pago){
    $sql_pago = "INSERT INTO pagos_adulto_mayor VALUES ()";
}


if(array_key_exists("registro_nuevo_pago",$_POST)){
    registrarPago($con, $pago);
}