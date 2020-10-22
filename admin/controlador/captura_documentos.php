<?php

if(!isset($_GET)){
    die();
}
$id = $_GET['id']; 

$sql_ciudadanos= "SELECT id_ciudadano, nombres, apellido_p, apellido_m FROM ciudadanos WHERE id_ciudadano = ?";
$consulta_ciudadanos = $con->prepare($sql_ciudadanos);
$consulta_ciudadanos->execute(array($id));
$ciudadano = $consulta_ciudadanos->fetch();

$dir_identificacion = "ciudadanos/" . $id . "/identificacion.jpg";

echo var_dump(is_file($dir_identificacion . "/identificacion.jpg"));
?>

<br>

<h5>Capture los documentos del Ciudadano: <?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></h5>
<br>

    <img src="ciudadanos/1/identificacion.jpg" alt="esta imagen no se encontro">

<form action="controlador/captura_documentossql.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">

<br> Identificación:  <input name="userfile" type="file"> <input type="submit" name="identificacion" value="Subir"> <br> </form>
<!-- <br> CURP:  <input name="userfile" type="file"> <input type="submit" name="curp" value="Subir"> <br>
<br> Acta Nac.:  <input name="userfile" type="file"> <input type="submit" name="actnac" value="Subir"> <br>
<br> Domicilio: <input name="userfile" type="file"> <input type="submit" name="domicilio" value="Subir"> <br>
 -->

    

