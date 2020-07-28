<?php
    $myuser = $_SESSION['user']['id_empleado'];
    $sql_query = $con->prepare('SELECT *, empleados.usuario, DATEDIFF(tareas.fecha_limite, CURDATE()) AS "dias" FROM tareas, empleados WHERE tareas.id_empleado_asigna_tarea = empleados.id_empleado AND id_empleado_asigna_tarea =? AND tareas.realizada =0');
    $sql_query->execute(array($myuser));
    $tareas = $sql_query->fetchALL();


    $sql_yo_asigno = $con->prepare('SELECT *, empleados.usuario, DATEDIFF(tareas.fecha_limite, CURDATE()) AS "dias" FROM tareas, empleados WHERE tareas.id_empleado_crea_tarea = ? AND id_empleado_asigna_tarea = empleados.id_empleado AND tareas.realizada =0 ORDER BY creada_date DESC');
    $sql_yo_asigno->execute(array($myuser));
    $yo_asigno = $sql_yo_asigno->fetchALL();

?>


<div class="form-row">
    <div class="form-group col-md-4">
        <h4>Tareas</h4>
    </div>

    <div class="form-group col-md-5">
        <a href="crea_tareas.php" class="btn btn-primary"> <i class="fas fa-tasks"></i> Nueva Tarea </a>
    </div>

    <div class="form-group col-md-3">
        <a  href="tareas_archivadas.php" class="btn btn-success"> <i class="fas fa-clipboard-check"></i> Archivadas </a>
    </div>
</div>



<div class="espaciadormio" style="height: 20px;"></div>




<h5>Tareas para mi</h5>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Creada por</th>
      <th scope="col">Titulo</th>
      <th scope="col">Fecha Limite</th>
      <th scope="col">Vista</th>



    </tr>
  </thead>

  <tbody>
    
    <?php
        foreach($tareas as $tarea):?>
        <tr>
           
            <td> <a href=""> <?php echo $tarea['usuario'] ?> </a></td>
            <td> <?php echo substr($tarea['tarea_titulo'],0, 20)?></td>
            <td> <?php echo $fechas = ($tarea['dias'] < 0 ? "Vencida hace " . -$tarea['dias'] . " dias"  : "Vence en " . $tarea['dias'] . " dias") ?></td>

              <?php $tarea_aceptada = ($tarea['aceptada'] == 0) ? "danger" : "success"; ?>
            <td> <a href="muestra_tarea.php?id=<?php echo $tarea['id_tarea']?>" class="btn btn-<?php echo $tarea_aceptada?>"> <?php echo $echo_tarea_aceptada = ($tarea['aceptada'] == 0) ? "Nueva" : "Vista"; ?> </a> </td>
          <tr>

        <?php endforeach;?>
    
  </tbody>
</table>




<div class="espaciadormio" style="height: 50px;"></div>




<h5>Tareas asignadas</h5>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Asignada a</th>
      <th scope="col">Titulo</th>
      <th scope="col">Fecha Limite</th>
      <th scope="col">Realizada</th>
      <th scope="col">Archivar</th>
    </tr>
  </thead>

  <tbody>
    
    <?php foreach($yo_asigno as $asigno):?>
        <tr> 
            <td> <a href=""> <?php echo $asigno['usuario'] ?> </a></td>
            <td> <?php echo substr($asigno['tarea_titulo'],0, 20)?></td>
            <td> <?php echo $fechas = ($asigno['dias'] < 0 ? "Vencida hace " . -$asigno['dias'] . " dias"  : "Vence en " . $asigno['dias'] . " dias") ?></td>

              <?php $tarea_aceptada = ($asigno['aceptada'] == 0) ? "danger" : "success"; ?>
            <td> <a href="muestra_tarea.php?id=<?php echo $asigno['id_tarea']?>" class="btn btn-<?php echo $tarea_aceptada?>"> <?php echo $echo_tarea_aceptada = ($asigno['aceptada'] == 0) ? "No vista" : "Vista"; ?> </a> </td>

            <td> 
                <?php if($tarea['realizada'] == 0): ?>
                <form method="post" action="controlador/realizar_tarea_sql.php">
                  <input type="hidden" value="<?php echo $asigno['id_tarea'] ?>" name="id_tarea">
                  <button type="submit" formmethod="POST" class="btn btn-primary" id="index_realizada" name="index_realizada">Realizada</button>
                </form>
              <?php endif;?>
            </td>
          <tr>

        <?php endforeach;?>
    
  </tbody>
</table>