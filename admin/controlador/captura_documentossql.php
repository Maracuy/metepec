<?php

if(!isset($_POST)){
    die();
}

$id = $_POST['id'];
$dir_subida = '../ciudadanos/' . $id . '/';

$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];

$tamano_archivo = $_FILES['userfile']['size'];


if(!is_dir($dir_subida)){
    mkdir($dir_subida, 0700);
}

function identificacion($nombre_archivo, $tipo_archivo, $tamano_archivo, $dir_subida){

    $fichero_subido = ($dir_subida . $nombre_archivo);

    //compruebo si las características del archivo son las que deseo
    if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1000000000))) {
           echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
    }else{
           if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $fichero_subido)){
                  echo "El archivo ha sido cargado correctamente.";
                  $newname = $dir_subida . 'identificacion.jpg';
                  rename($fichero_subido, $newname);
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
    identificacion($nombre_archivo, $tipo_archivo, $tamano_archivo, $dir_subida);
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





?>