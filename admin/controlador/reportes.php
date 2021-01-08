<?php 
  $sql_reportes = $con->prepare("SELECT * FROM messag ORDER BY fecha_captura DESC");
  $sql_reportes->execute();
  $reportes = $sql_reportes->fetchALL();


  $sql_ciudadanos = $con->prepare("SELECT nombres,apellido_p,apellido_m FROM ciudadanos");
  $sql_ciudadanos->execute();
  $ciudadanos = $sql_ciudadanos->fetchALL();
  array_unshift($ciudadanos,0);
?>


<style type="text/css">
#global {
	height: 400px;
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
            echo '<h6>' . $ciudadanos[$reporte['id_ciudadano']]['nombres'] ." ".$ciudadanos[$reporte['id_ciudadano']]['apellido_p']." ".$ciudadanos[$reporte['id_ciudadano']]['apellido_m'].'</h6>';
            echo $reporte['mensaje'];
            $fecha = $reporte['fecha_captura'];
            $newfecha = date("H:i:s d/m/Y",strtotime($fecha));
            ?>
            <p align="right"><?php echo $newfecha?></p>
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
  </div>
</form>

<?php $con=null?>
<?php mysqli_close($mysqli)?>