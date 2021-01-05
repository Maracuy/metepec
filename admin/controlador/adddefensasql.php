<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../conection/conexion.php';

$id_ciudadano = $_GET['id'];
$puesto = $_GET['casilla'];
$up = $_SESSION['user']['id_empleado'];



function nuevo($con, $id_ciudadano, $puesto, $up){

    $sql_puestos = "INSERT INTO altas_defensa (id_ciudadano, id_puesto, up) VALUES ($id_ciudadano, $puesto, $up)";
    $sentencia_puestos = $con->prepare($sql_puestos);
    try{  
        $sentencia_puestos->execute();
        header("Location: ../electoral.php?id=".$id_ciudadano);
    }catch(Exception $e){
        echo 'Error al agregar un puesto: ',  $e->getMessage(), "\n";
        die();
    }  

}




if ($_GET['nuevo'] == '1'){
    echo 'Entra aqui';
    nuevo($con, $id_ciudadano, $puesto, $up);
}


?>
