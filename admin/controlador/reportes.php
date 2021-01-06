<?php 
  $sql_reportes = $con->prepare("SELECT * FROM messag");
  $sql_reportes->execute();
  $reportes = $sql_reportes->fetchALL();


  foreach($reportes as $reporte){
    echo $reporte['mensaje']." ";
    echo $reporte['fecha_captura'];
  }
?>








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
    </div><!-- 
    <input type="hidden" id="id_ciudadano" name="id" value="<?php echo $id?>">
    <input type="hidden" id="fecha_captura" name="fecha_captura" value="<?php echo $reporte['fecha_captura']?>"> -->
</div>
