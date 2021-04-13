<?php
session_start();

if(!$_POST){
    die();
}

if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../conection/conexion.php';

$empleado = $_SESSION['user']['id_ciudadano'];

$id = $_GET['posicion'];
$orden = $_GET['dato'];

$stm = $con->query("SELECT * FROM puestos_defensa WHERE id_defensa = $id");
$actual = $stm->fetch(PDO::FETCH_ASSOC);


if ($orden == 'up') {
    $nid = $id-1;
    $stm = $con->query("SELECT * FROM puestos_defensa WHERE id_defensa = $nid");
    $puesto = $stm->fetch(PDO::FETCH_ASSOC);

    if ($puesto['id_ciudadano'] != '') {

        $id_ocupado = $puesto['id_ciudadano'];
        $previo = $puesto['previo'];
        $posicion_prev = $puesto['posicion_prev'];
        $compromiso = $puesto['compromiso'];
        $afiliacion = $puesto['afiliacion'];
        $origen = $puesto['origen'];
        $cubre = $puesto['cubre'];
        $up = $puesto['up'];
        $confirmacion = $puesto['confirmacion'];



        //ponemos los datos del puesto destino en 



        $sql_editar = "UPDATE puestos_defensa SET 
        previo = $previo, posicion_prev = $posicion_prev, compromiso = $compromiso, afiliacion = $afiliacion, origen = $origen, cubre = $cubre, up = $up, confirmacion = $confirmacion
        WHERE id_ciudadano = $id_ocupado+1";
        $sentencia_agregar = $con->prepare($sql_editar);
        try {
            $sentencia_agregar->execute();
        } catch (\Throwable $th) {
            echo "Error al mover el lugar ocupado: " . $th;
        }


    }

}
$stm = $con->query("SELECT * FROM colonias");
$colonias = $stm->fetchAll(PDO::FETCH_ASSOC);




?>