<?php

if(!isset($_GET)){
    die();
}
$id = $_GET['id']; 

//Obtenemos toda la informacion del beneficiario
$sql_ciudadanos= "SELECT id_ciudadano, nombres, apellido_p, apellido_m FROM ciudadanos WHERE id_ciudadano = ?";
$consulta_ciudadanos = $con->prepare($sql_ciudadanos);
$consulta_ciudadanos->execute(array($id));
$ciudadano = $consulta_ciudadanos->fetch();

//Obtenemos las posibles direcciones de documentos.
//Comenzamos con la INE, tenemos 2 posibles, o JPG o PDF
$raiz = "C:/wamp64/www/metepec/admin/";
$dir_identificacion = "ciudadanos/1/identificacion.jpg";

var_dump(file_exists($dir_identificacion));

?>

<br>

<h5>Capture los documentos del Ciudadano: <?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></h5>
<br>


<!-- El primer CARD donde vamos a mostrar la identificacion o la posibilidad de subir una -->
<?php
if(file_exists($raiz.$dir_identificacion)):?>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $dir_identificacion ?>" alt="INE">
  <div class="card-body">
    <h5 class="card-title">Identificacion (FRENTE)</h5>
    <p class="card-text">Aqui se debera mostrar la fecha de subida y quien la subio.</p>
    <a href="#" class="btn btn-danger">Delete</a>
  </div>
</div>
<?php endif?>

<?php
if(!file_exists($raiz.$dir_identificacion)):?>

<form action="controlador/captura_documentossql.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">

<br> Identificación:  <input name="userfile" type="file"> <input type="submit" name="identificacion" value="Subir"> <br> </form>
<?php endif?>

<!-- <br> CURP:  <input name="userfile" type="file"> <input type="submit" name="curp" value="Subir"> <br>
<br> Acta Nac.:  <input name="userfile" type="file"> <input type="submit" name="actnac" value="Subir"> <br>
<br> Domicilio: <input name="userfile" type="file"> <input type="submit" name="domicilio" value="Subir"> <br>
 -->

<br>

 <a href="galaxia.php?id=<?php echo $id ?>" class="btn btn-primary">Continuar</a>

 <?php 
 //unlink($dir_identificacion);
 ?>