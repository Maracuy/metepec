<?php
    $myuser = $_SESSION['user']['id_empleado'];
    $sql_query = $con->prepare('SELECT * FROM tareas WHERE id_empleado_asigna_tarea =?');
    $sql_query->execute(array($myuser));
    $tareas = $sql_query->fetchALL();

?>


<div class="espaciadormio" style="height: 20px;"></div>

<h4>Tareas para mi</h4>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Mandó</th>
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
           
            <td> <a href=""> <?php echo $tarea['id_empleado_crea_tarea'] ?> </a></td>
            <td> <?php echo $tarea['tarea_titulo']?></td>
            <td> <?php echo $tarea['fecha_limite']?></td>
            <td> <?php echo $tarea['tarea_descripcion']?></td>
        <tr>

        <?php endforeach;?>
    
  </tbody>
</table>


<h5>Tareas asignadas</h5>




