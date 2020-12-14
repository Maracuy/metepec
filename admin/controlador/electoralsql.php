<?php
/* if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
} */

if(empty($_POST)){
    echo "No exite esta pagina";
    die();
}

var_dump($_POST);
/* die(); */
$empleado = $_SESSION['user']['id_empleado'];
$id =  intval($_POST['id']) ;
$participo_eleccion = intval($_POST['participo_eleccion']);
$posicion = $_POST['posicion'];
$asistio = intval($_POST['asistio']);
$afiliacion = $_POST['afiliacion'];
$observaciones =$_POST['observaciones'];

$sql_agregar = "INSERT INTO ciudadanos(" . $keysString . ") VALUES(" . $signos . ")";
    $sentencia_agregar = $con->prepare($sql_agregar);
    try{
        $sentencia_agregar->execute($values);
    }catch(Exception $e){
        echo 'Ocurrio un error al intentar la alta de defensa: ',  $e->getMessage(), "\n";
        die();
    }  
    
?><!-- fin del php -->