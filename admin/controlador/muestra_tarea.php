<?php

if (empty($_SESSION['user'])){
    include '../no_registrado.php';
    die();
}
    $id_tarea = $_GET['id'];

    $myuser = $_SESSION['user']['id_empleado'];
    $sql_query = $con->prepare('SELECT *, empleados.usuario, DATEDIFF(tareas.fecha_limite, CURDATE()) AS "dias" FROM tareas, empleados WHERE tareas.id_empleado_asigna_tarea = empleados.id_empleado AND id_empleado_asigna_tarea =? AND tareas.id_tarea = ?');
    $sql_query->execute(array($myuser, $id_tarea));
    $tarea = $sql_query->fetch();
    $id_beneficiario = $tarea['id_beneficiario'];

    $sql_query = $con->prepare('SELECT beneficiarios.id_beneficiario, beneficiarios.nombres, beneficiarios.apellido_p, beneficiarios.apellido_m FROM beneficiarios WHERE id_beneficiario = ?');
    $sql_query->execute(array($id_beneficiario));
    $beneficiario = $sql_query->fetch();

?>

<div class="espaciadormio" style="height: 20px;"></div>

<h3><?php echo $tarea['tarea_titulo']; ?></h3>
<br>
<h5> <?php echo $tarea['tarea_descripcion']; ?> </h5>
<br>
<?php
if($tarea['id_beneficiario'] != ""){
    echo '<a href="alta_beneficiarios.php?id='. $id_beneficiario . '">';
    echo "<h6> Beneficiario: " . '"' . $beneficiario['id_beneficiario'] . '"' . " " . $beneficiario['nombres'] . " " . $beneficiario['apellido_p'] . " " . $beneficiario['apellido_m'] . " <i class='fas fa-info-circle'></i> Ver mas </h6>";
    echo '</a>';
}
?>

