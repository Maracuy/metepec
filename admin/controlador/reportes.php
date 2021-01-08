<?php 
  $sql_reportes = $con->prepare("SELECT * FROM messag");
  $sql_reportes->execute();
  $reportes = $sql_reportes->fetchALL();


  $sql_ciudadanos = $con->prepare("SELECT nombres FROM ciudadanos");
  $sql_ciudadanos->execute();
  $ciudadanos = $sql_ciudadanos->fetchALL();
  array_unshift($ciudadanos,0);
?>


<style type="text/css">
#global {
	height: 450px;
	width: 95%;
	background: #f1f1f1;
	overflow-y: scroll;
}
#mensajes {
	height: auto;
}
.texto {
	padding:4px;
	background:#fff;
}
</style>

<div id="global">
  <div id="mensajes">
    <?php foreach ($reportes as $reporte):?>

        <div class="alert alert-secondary" role="alert">
            
            <?php 
            echo '<h6>' . $ciudadanos[$reporte['id_ciudadano']]['nombres'] . '</h6>';
            echo $reporte['mensaje']?>
        </div>
    <?php endforeach ?>
  </div>
</div>

<form method="POST" action="controlador/reportessql.php">
  <br>
<div class="form-row">  
   <div class="form-group col-md-9">
        <div class="dropdown-divider"></div>
        <textarea type= "text" name="reporte"  rows="4" class="form-control"></textarea>
   </div> 

    <div class="form-group col-md-2">
        <br>
        <button class="btn btn-primary" type="submit" name="enviar" id="enviar" style='width:90px; height:75px'> <i class="fas fa-user-edit" ></i> Enviar</button>
    </div>

    <input type="hidden" id="id_ciudadano" name="id" value="<?php echo $id?>">
    <input type="hidden" id="fecha_captura" name="fecha_captura" value="<?php echo $reporte['fecha_captura']?>">

</div>
</form>