<?php
$sql_federales= "SELECT * FROM altas WHERE altas.id_ciudadano = ?";
$consulta_federales = $con->prepare($sql_federales);
$consulta_federales->execute(array($id_ciudadano));
$federales = $consulta_federales->fetchAll();

/* $sql_estatales= "SELECT * FROM altas WHERE id_alta IN (SELECT id_programa_federal FROM programas_federales) AND altas.tipo_programa=2 AND id_ciudadano = ?";
$consulta_estatales = $con->prepare($sql_estatales);
$consulta_estatales->execute(array($id_ciudadano));
$estatales = $consulta_estatales->fetchAll();

$sql_municipales= "SELECT * FROM altas WHERE id_alta IN (SELECT id_programa_federal FROM programas_federales) AND altas.tipo_programa=3 AND id_ciudadano = ?";
$consulta_municipales = $con->prepare($sql_municipales);
$consulta_municipales->execute(array($id_ciudadano));
$municipales = $consulta_municipales->fetchAll(); */


var_dump($federales);

?>
<br>
<h4> <?php $ciudadano['id_ciudadano'] . " - " .$ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?> <h4>;

<!-- Aqui se muestra la tabla cuando el ciudadano esta en procesos activos -->

<?php if($federales): ?>
    <br><h3>Tiene en proceso:</h3> <br> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre Programa</th>
                <th scope="col">Abreviatura</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($federales as $proceso): ?>
            <tr>
                <td> <?php echo $proceso['nombre'] ?> </td>
                <td> <?php echo $proceso['abreviatura'] ?> </td>
                <td> <a href="proceso.php?id_proceso=<?php echo $proceso['id_procesos']?>&id_ciudadano=<?php echo $id_ciudadano ?>&id_alta=<?php echo $proceso['id_alta']?>" class="btn btn-primary">Ver progreso</a> </td>
            </tr>
            <?php endforeach;?>

            <?php foreach($estatales as $proceso): ?>
            <tr>
                <td> <?php echo $proceso['nombre'] ?> </td>
                <td> <?php echo $proceso['abreviatura'] ?> </td>
                <td> <a href="proceso.php?id_proceso=<?php echo $proceso['id_procesos']?>&id_ciudadano=<?php echo $id_ciudadano ?>&id_alta=<?php echo $proceso['id_alta']?>" class="btn btn-primary">Ver progreso</a> </td>
            </tr>
            <?php endforeach;?>

            <?php foreach($municipales as $proceso): ?>
            <tr>
                <td> <?php echo $proceso['nombre'] ?> </td>
                <td> <?php echo $proceso['abreviatura'] ?> </td>
                <td> <a href="proceso.php?id_proceso=<?php echo $proceso['id_procesos']?>&id_ciudadano=<?php echo $id_ciudadano ?>&id_alta=<?php echo $proceso['id_alta']?>" class="btn btn-primary">Ver progreso</a> </td>
            </tr>
            <?php endforeach;?>
        
        </tbody>


<?php endif;?>
    </table>
<br>

<h5> no tiene ningun proceso activo</h5>