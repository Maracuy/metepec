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

if($_GET['id_beneficiario']){
    $id_beneficiario = $_GET['id_beneficiario'];
}

if(isset($_GET['id_programa'])){
    $id_programa = $_GET['id_programa'];

    $sql_query = $con->prepare('SELECT * FROM programas WHERE id_programas =?');
    $sql_query->execute(array($id_programa));
    $existe_programa = $sql_query->fetch();
}else{
    $id_programa = "";
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
    
    $sql_altas = $con->prepare('SELECT a.*, e.id_empleado, e.usuario, e.nombres, e.apellido_p FROM altas a, empleados e WHERE id_alta =? AND e.id_empleado = a.id_responsable ORDER BY a.id_alta');
    $sql_altas ->execute(array($id_alta));
    $alta = $sql_altas->fetch();
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
        if(isset($existe_proceso['respuesta']) && $existe_proceso['respuesta'] != "" ){
            echo '<input type="hidden" name="respuesta" value="'.$existe_proceso['respuesta'].'">';
            echo "<br>" . $existe_proceso['respuesta'];
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
                echo "Beneficiario Informado";}
                echo '<input type="hidden" name="se_informa_beneficiario" value="'.$existe_proceso['se_informa_beneficiario'].'">';

            if($existe_proceso['se_informa_beneficiario'] == 0){
                echo "Beneficiario NO Informado";}
        }else{?>
        <select class="form-control" id="se_informa_beneficiario" name="se_informa_beneficiario">
            <option value="">Aun no</option>
            <option value="0">No</option>
            <option value="1">Si</option>
        </select> <?php }?>
    </div>


    <div class="form-group col-md-2">
        <label for="fecha_de_informe">Fecha de informe</label>
        <?php
        if(isset($existe_proceso['fecha_de_informe'])){
            if($existe_proceso['se_informa_beneficiario'] != 0){
                echo "<br>" . $existe_proceso['fecha_de_informe'];
                echo '<input type="hidden" name="fecha_de_informe" value="'.$existe_proceso['fecha_de_informe'].'">';

            }else{
                echo "<br>Sin fecha"; }
            }else{
                echo '<input type="date" class="form-control" id="fecha_de_informe" name="fecha_de_informe">'; 
            }?>
    </div>
</div>

<br>

<div class="form-row">

    <div class="form-group col-md-2">
        <label for="fecha_solicitud_visita">Fecha Solicitud Visita</label>
        <?php
        if(isset($existe_proceso['fecha_solicitud_visita'])){
            echo "<br>" . $existe_proceso['fecha_solicitud_visita'];
            echo '<input type="hidden" class="form-control" id="fecha_solicitud_visita" name="fecha_solicitud_visita">'; 
        }?>
        <input type="date" class="form-control" id="fecha_solicitud_visita" name="fecha_solicitud_visita">
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_programa_visita">Fecha programa Visita</label>
        <?php
        if(isset($existe_proceso['fecha_programa_visita']) && $existe_proceso['fecha_programa_visita'] != ""){
            echo "<br>" . $existe_proceso['fecha_programa_visita'];
            echo '<input type="hidden" class="form-control" id="fecha_programa_visita" name="fecha_programa_visita">';
        }else{
        echo '<input type="date" class="form-control" id="fecha_programa_visita" name="fecha_programa_visita">';
        }
        ?>
    </div>

    <div class="col-md-3">
        <label for="id_servidor_publico">Servidor de la Nacion</label>
        <select id="id_servidor_publico" name="id_servidor_publico" class="form-control">
            <?php 
            if(isset($existe_proceso['id_servidor_publico']) && $existe_proceso['id_servidor_publico'] != 1){
                echo "<br>" . $existe_proceso['id_servidor_publico'];
                echo '<input type="hidden" class="form-control" id="id_servidor_publico" name="id_servidor_publico">';
            }else{
                $query = $mysqli -> query ("SELECT * FROM servidores_publicos");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id'].'">'. $valores['nombres'] . " " . $valores['apellido_p']. " " . $valores['apellido_m'] . '</option>'; }}?>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_real_visita">Fecha REAL Visita</label>
        <?php 
        if(isset($existe_proceso['fecha_real_visita']) && $existe_proceso['fecha_real_visita'] != ""){
            echo "<br>" . $existe_proceso['fecha_real_visita'];
            echo '<input type="hidden" class="form-control" id="fecha_real_visita" name="fecha_real_visita">';
        }else{
            echo '<input type="date" class="form-control" id="fecha_real_visita" name="fecha_real_visita">';
        }
        ?>
    </div>
</div>

<br>

<div class="form-row">


    <div class="form-group col-md-2">
        <label for="ingreso_al_sistema">Ingreso al sistema?</label>
        <?php
        if(isset($existe_proceso['ingreso_al_sistema']) && $existe_proceso['ingreso_al_sistema'] != ""){
            echo "<br>" . $existe_proceso['ingreso_al_sistema'];
            echo '<input type="hidden" class="form-control" id="ingreso_al_sistema" name="ingreso_al_sistema">';
        }else{?>
        <select class="form-control" id="ingreso_al_sistema" name="ingreso_al_sistema">
            <option value="">No definido</option>
            <option value="0">No</option>
            <option value="1">Si</option>
        </select><?php }?>
    </div>

    <div class="form-group col-md-2">
        <label for="fecha_estimada_activacion">Fecha activacion</label>
        <?php 
        if(isset($existe_proceso['fecha_estimada_activacion']) && $existe_proceso['fecha_estimada_activacion'] != ""){
            echo "<br>" . $existe_proceso['fecha_estimada_activacion'];
            echo '<input type="hidden" class="form-control" id="fecha_estimada_activacion" name="fecha_estimada_activacion">';
        }else{
            echo '<input type="date" class="form-control" id="fecha_estimada_activacion" name="fecha_estimada_activacion">';
        }?>
    </div>

    <div class="form-group col-md-2">
        <label for="estado_pago">Pagando?</label>
        <?php 
        if(isset($existe_proceso['estado_pago']) && $existe_proceso['estado_pago'] != ""){
            echo "<br>" . $existe_proceso['estado_pago'];
            echo '<input type="hidden" class="form-control" id="estado_pago" name="estado_pago">';
        }else{ ?>
            <select class="form-control" id="estado_pago" name="estado_pago">
            <option value="">Sin Especificar</option>
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
        <?php } ?>
       
        
    </div>

    <div class="col-md-2">
        <label for="id_empleado">Responsable</label>
        <?php 
        if(isset($alta['id_responsable']) && $alta['id_responsable'] != 1){
            echo "<br>(" . $alta['usuario'] . ") " . $alta['nombres'] . " " . $alta['apellido_p'];
            echo '<input type="hidden" class="form-control" id="id_empleado" name="id_empleado">';
            }else{
                echo '<select id="id_empleado" name="id_empleado" class="form-control">';
                $query = $mysqli -> query ("SELECT id_empleado, usuario FROM empleados");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id_empleado'].'">'.$valores['usuario'] . '</option>'; }
        echo "</select>";
        } ?>
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
