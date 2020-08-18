<?php
header("Content-Type: text/html;charset=utf-8");
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

if(!isset($_GET['id_proceso']) and !isset($_GET['id_beneficiario']) and !isset($_GET['id_programa'])){
    header("Location: beneficiarios.php");
    die();
}

if(isset($_GET['id_beneficiario'])){
    $id_beneficiario = $_GET['id_beneficiario'];
}

if(isset($_GET['id_programa'])){
    $id_programa = $_GET['id_programa'];

    $sql_query = $con->prepare('SELECT * FROM programas WHERE id_programas =?');
    $sql_query->execute(array($id_programa));
    $existe_programa = $sql_query->fetch();
}

if(isset($_GET['id_proceso'])){
    $id_proceso = $_GET['id_proceso'];
    
    $sql_query_proceso = $con->prepare('SELECT * FROM procesos WHERE id_procesos =?');
    $sql_query_proceso->execute(array($id_proceso));
    $existe_proceso = $sql_query_proceso->fetch();
}else{
    $id_proceso = NULL;}


if(isset($_GET['id_alta'])){
    $id_alta = $_GET['id_alta'];
}else{
    $id_alta = NULL;
}


?>

<div class="espaciadormio" style="height: 30px;"></div>



<form method="POST" action="controlador/proceso_sql.php">


    <input type="hidden" name="id_beneficiario" value="<?php echo $id_beneficiario ?>">
    <input type="hidden" name="id_proceso" value="<?php echo $id_proceso ?>">
    <input type="hidden" name="id_alta" value="<?php echo $id_alta ?>">
    <input type="hidden" name="id_programa" value="<?php echo $id_programa ?>">




<div class="form-row">

    <div class="form-group col-md-2">
        <label for="fecha_listado">Fecha de Listado</label>
        <?php 
        if(isset($existe_proceso['fecha_listado']) && $existe_proceso['fecha_listado'] != "00-00-0000"){
            echo "<br>" . $existe_proceso['fecha_listado'];
            echo '<input type="hidden" name="fecha_listado" value="'.$existe_proceso['fecha_listado'].'">';

        }else{
            echo '<input type="date" class="form-control" id="fecha_listado" name="fecha_listado">';
        }
        ?>
    </div>


    <div class="form-group col-md-2">
        <label for="fecha_listado">Fecha de Enviado</label>
        <?php 
        if(isset($existe_proceso['fecha_enviado']) && $existe_proceso['fecha_listado'] != "0000-00-00"){
            echo "<br>" . $existe_proceso['fecha_enviado'];
            echo '<input type="hidden" name="fecha_enviado" value="'.$existe_proceso['fecha_enviado'].'">';

        }else{
            echo '<input type="date" class="form-control" id="fecha_enviado" name="fecha_enviado">';
        }
        ?>
    </div>


    <div class="form-group col-md-2">
        <label for="respuesta">Respuesta recibida</label>
        <?php 
        if(isset($existe_proceso['respuesta'])){
            echo "<br>" . $existe_proceso['respuesta'];
            echo '<input type="hidden" name="respuesta" value="'.$existe_proceso['respuesta'].'">';

        }else{
            echo '<input type="text" class="form-control" id="respuesta" name="respuesta">';
        }
        ?>

    </div>

    <div class="form-group col-md-2">
        <label for="se_informa_beneficiario">Se informó al beneficiario?</label>
        <?php 
        if(isset($existe_proceso['se_informa_beneficiario'])){
            if($existe_proceso['se_informa_beneficiario'] == 1){
                echo "Beneficiario Informado";

            }

        }
        
        
        ?>

        <select class="form-control" id="se_informa_beneficiario" name="se_informa_beneficiario">
            <option value="0">No Definir</option>
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_de_informe">Fecha de informe</label>
        <input type="date" class="form-control" id="fecha_de_informe" name="fecha_de_informe">
    </div>
</div>

<br>

<div class="form-row">

    <div class="form-group col-md-2">
        <label for="fecha_solicitud_visita">Fecha Solicitud Visita</label>
        <input type="date" class="form-control" id="fecha_solicitud_visita" name="fecha_solicitud_visita">
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_programa_visita">Fecha programa Visita</label>
        <input type="date" class="form-control" id="fecha_programa_visita" name="fecha_programa_visita">
    </div>

    <div class="col-md-3">
        <label for="id_servidor_publico">Servidor de la Nacion</label>
        <select id="id_servidor_publico" name="id_servidor_publico" class="form-control">
            <?php $query = $mysqli -> query ("SELECT * FROM servidores_publicos");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id'].'">'. $valores['nombres'] . " " . $valores['apellido_p']. " " . $valores['apellido_m'] . '</option>'; }?>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_real_visita">Fecha REAL Visita</label>
        <input type="date" class="form-control" id="fecha_real_visita" name="fecha_real_visita">
    </div>

</div>

<br>

<div class="form-row">


    <div class="form-group col-md-2">
        <label for="ingreso_al_sistema">Ingreso al sistema?</label>
        <select class="form-control" id="ingreso_al_sistema" name="ingreso_al_sistema">
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_estimada_activacion">Fecha activacion</label>
        <input type="date" class="form-control" id="fecha_estimada_activacion" name="fecha_estimada_activacion">
    </div>

    <div class="form-group col-md-2">
        <label for="estado_pago">Pagando?</label>
        <select class="form-control" id="estado_pago" name="estado_pago">
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
    </div>

    <div class="col-md-2">
        <label for="id_responsable">Responsable</label>
        <select id="id_responsable" name="id_responsable" class="form-control">
            <?php $query = $mysqli -> query ("SELECT id_empleado, usuario FROM empleados");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id_empleado'].'">'.$valores['usuario'] . '</option>'; }?>
        </select>
    </div>


</div>

<br>

<div class="form-row">

    <div class="col-md-7">
        <label for="reporte">Reporte</label>
        <textarea class="form-control col-md-7" id="reporte" name="reporte" placeholder="Descripción de la Tarea"> </textarea>
    </div>

</div>

<br>

<?php
if(isset($existe_proceso)){
    echo '<button class="btn btn-primary" type="submit" name="actualizar" id="nuevo">Actualizar registro</button>';
}else{
    echo '<button class="btn btn-primary" type="submit" name="nuevo" id="nuevo">Guardar registro</button>';
}
?>

</form>
