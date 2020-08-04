

<form method="GET">

    <input type="text" name="nombre" id="nombre">
    <input type="text" name="apellido" id="apellido">
    
    <input type="submit" value="e">
</form>


<?php

$valor = "4";

echo var_dump($valor);

$valor = intval($valor);

echo var_dump($valor);

if($_GET){

    include 'conection/conexion.php';

    $arreglo= array(41);
    $id=2878;
    $arreglo[0]=$_GET['nombre'];
    $arreglo[1]=$_GET['apellido'];
    $arreglo[2]= "Puebla";
    $arreglo[3]=2;


    


    
    $sql_editar = "UPDATE beneficiarios SET nombres=?, apellido_p=?, municipio=?, id_empleado=? WHERE id_beneficiario=$id";
    $sentencia_agregar = $con->prepare($sql_editar);
    
    try{
      $sentencia_agregar->execute($arreglo);

        echo "Si lo actualizo";
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}