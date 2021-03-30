<?php

session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

if(!isset($_POST)){
    die();
}

include_once '../../conection/conexion.php';

$hoy = date("Y-m-d H:i:s"); 

$id_empleado = $_SESSION['user']['id_ciudadano'];
$id = $_POST['id'];
$dir_subida = '../ciudadanos/' . $id . '/';

$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];

$tamano_archivo = $_FILES['userfile']['size'];


if(!is_dir($dir_subida)){
    mkdir($dir_subida, 0755);
}

function identificacion($con, $nombre_archivo, $tipo_archivo, $tamano_archivo, $dir_subida, $id, $id_empleado, $hoy){

    $fichero_subido = ($dir_subida . $nombre_archivo);

    //compruebo si las características del archivo son las que deseo
    if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1000000000))) {
           echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
    }else{
           if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $fichero_subido)){
                $newname = $dir_subida . 'identificacion.jpg';
                rename($fichero_subido, $newname);
                $sentencia_alta = $con->prepare('INSERT INTO documentos(id_ciudadano_subida, fecha_subida, id_ciudadano_subida, tipo_documento) VALUES(?, ?, ?, ?)');
                $sentencia_alta->execute(array($id_empleado, $hoy, $id, 'id'));
                header("Location: ../archivos_ciudadanos.php?id=$id");
           }else{
                  echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
           }
    }
}




function identificacion_atras($con, $nombre_archivo, $tipo_archivo, $tamano_archivo, $dir_subida, $id, $id_empleado, $hoy){

    $fichero_subido = ($dir_subida . $nombre_archivo);

    //compruebo si las características del archivo son las que deseo
    if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1000000000))) {
           echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
    }else{
           if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $fichero_subido)){
                $newname = $dir_subida . 'identificacion_atras.jpg';
                rename($fichero_subido, $newname);
                

                try {
                    $sentencia_alta = $con->prepare('INSERT INTO documentos(id_ciudadano_subida, fecha_subida, id_ciudadano_subida, tipo_documento) VALUES(?, ?, ?, ?)');
                    $sentencia_alta->execute(array($id_empleado, $hoy, $id, 'id_b'));
                } catch (\Throwable $th) {
                   echo $th;
                }

                header("Location: ../archivos_ciudadanos.php?id=$id");

           }else{
                  echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
           }
    }
}





function actnac(){
    echo 'Entro en la de act nat';
    die();
}

function curp(){
    echo 'Entro en la de curp';
    die();
}

function domicilio(){
    echo 'Entro en la de domicilio';
    die();
}





if(array_key_exists("identificacion",$_POST)){
    identificacion($con, $nombre_archivo, $tipo_archivo, $tamano_archivo, $dir_subida, $id, $id_empleado, $hoy);
}

if(array_key_exists("identificacion_atras",$_POST)){
    identificacion_atras($con, $nombre_archivo, $tipo_archivo, $tamano_archivo, $dir_subida, $id, $id_empleado, $hoy);
}

if(array_key_exists("actnac",$_POST)){
    actnac();
}

if(array_key_exists("curp",$_POST)){
    curp();
}

if(array_key_exists("domicilio",$_POST)){
    domicilio();
}


/* 


Estabamos tratando de encontrar por que no podemos eliminar la primer identificacion, pero si borra la segunda jajaja


la neta esta raro pero no entiendo


*/











function eliminar($id, $tipo){
    $azar = rand(1, 1000);
    if ($tipo = 'id') {
        $tipe = 'identificacion.jpg';
    }
    if ($tipo = 'id_b') {
        $tipe = 'identificacion_atras.jpg';
    }
    $direccion = "../../admin/ciudadanos/" . $id . '/' . $tipe;
    $deletes = "../../admin/ciudadanos/" . $id . '/deletes' . $azar.$tipe;

    rename($direccion, $deletes);
}


if($_GET['delete']){
    $id  = $_GET['id'];
    $tipo = $_GET['delete'];
    eliminar($id, $tipo);
}



?>