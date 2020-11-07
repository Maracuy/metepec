<?php
$sql= "SELECT a.*, pf.*, pe.*, pm.* FROM altas a, programas_federales pf, programas_estatales pe, programas_municipales pm WHERE a.id_programa_f IN (SELECT id_programa_federal FROM programas_federales) a.id_ciudadano = ? GROUP BY a.id_alta";
$consulta = $con->prepare($sql);
$consulta->execute(array($id_ciudadano));
$altas = $consulta->fetchAll();

/* $sql_estatales= "SELECT * FROM altas WHERE id_alta IN (SELECT id_programa_federal FROM programas_federales) AND altas.tipo_programa=2 AND id_ciudadano = ?";
$consulta_estatales = $con->prepare($sql_estatales);
$consulta_estatales->execute(array($id_ciudadano));
$estatales = $consulta_estatales->fetchAll();

$sql_municipales= "SELECT * FROM altas WHERE id_alta IN (SELECT id_programa_federal FROM programas_federales) AND altas.tipo_programa=3 AND id_ciudadano = ?";
$consulta_municipales = $con->prepare($sql_municipales);
$consulta_municipales->execute(array($id_ciudadano));
$municipales = $consulta_municipales->fetchAll(); */

?>
<br>
<h4> <?php $ciudadano['id_ciudadano'] . " - " .$ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?> <h4>

<!-- Aqui se muestra la tabla cuando el ciudadano esta en procesos activos -->

<?php if($altas): ?>
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
            <?php foreach($altas as $alta): ?>
            <tr>
                <td> <?php echo $alta['nombre'] ?> </td>
                <td> <?php echo $alta['abreviatura'] ?> </td>
                <td>  </td>
                <td> <a href="proceso.php?id_proceso=<?php //echo $alta['id_procesos']?>&id_ciudadano=<?php echo $id_ciudadano ?>&id_alta=<?php echo $alta['id_alta']?>" class="btn btn-primary">Ver progreso</a> </td>
            </tr>
            <?php endforeach;?>
        </tbody>


<?php endif;?>
    </table>
<br>

<h5> no tiene ningun proceso activo</h5>