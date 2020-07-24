<?php
    $myuser = $_SESSION['user']['id_empleado'];
    $sql_query = $con->prepare('SELECT *, empleados.usuario, DATEDIFF(tareas.fecha_limite, CURDATE()) AS "dias" FROM tareas, empleados WHERE tareas.id_empleado_asigna_tarea = empleados.id_empleado AND id_empleado_asigna_tarea =?');
    $sql_query->execute(array($myuser));
    $tareas = $sql_query->fetchALL();

?>

<div class="espaciadormio" style="height: 20px;"></div>

<h4>Tareas para mi</h4>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Creada por</th>
      <th scope="col">Titulo</th>
      <th scope="col">Fecha Limite</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Status</th>



    </tr>
  </thead>

  <tbody>
    
    <?php
        foreach($tareas as $tarea):?>
        <tr>
           
            <td> <a href=""> <?php echo $tarea['usuario'] ?> </a></td>
            <td> <?php echo $tarea['tarea_titulo']?></td>
            <td> <?php echo $fechas = ($tarea['dias'] < 0 ? "Vencida hace " . -$tarea['dias'] . " dias"  : "Vence en " . $tarea['dias'] . " dias") ?></td>
            <td> <?php echo $tarea['tarea_descripcion']?></td>
            <td> <a href="muestra_tarea.php?id=<?php echo $tarea['id_tarea']?>"><i class="fas fa-check-circle"></i></a> </td>
        <tr>

        <?php endforeach;?>
    
  </tbody>
</table>


<h5>Tareas asignadas</h5>




