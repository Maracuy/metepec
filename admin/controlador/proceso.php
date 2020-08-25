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

if(isset($_GET['id_alta'])){
    $id_alta = $_GET['id_alta'];
    
    $sql_altas = $con->prepare('SELECT a.*, e.id_empleado, e.usuario, e.nombres, e.apellido_p FROM altas a, empleados e WHERE id_alta =? AND e.id_empleado = a.id_responsable ORDER BY a.id_alta');
    $sql_altas ->execute(array($id_alta));
    $alta = $sql_altas->fetch();
}else{
    $id_alta = NULL;
}

if(isset($_GET['id_proceso'])){
    $id_proceso = $_GET['id_proceso'];
    
    $contar_procesos = $con->prepare('SELECT COUNT(*) FROM procesos, altas WHERE procesos.id_beneficiario=? AND altas.id_alta=?');
    $contar_procesos->execute(array($id_beneficiario, $id_alta));
    $total_procesos = $contar_procesos->fetch();
    $total_procesos = intval($total_procesos[0]);


    //Tambien vamos a buscar si tenemos mas de un proceso

    if($total_procesos>1){
        $old_procesos = $con->prepare('SELECT * FROM procesos, altas WHERE procesos.id_beneficiario =? AND altas.id_beneficiario=? AND altas.id_alta=? AND procesos.id_alta = altas.id_alta GROUP BY id_procesos ORDER BY id_procesos ASC;');
        $old_procesos->execute(array($id_beneficiario, $id_beneficiario, $id_alta));
        $olds_procesos = $old_procesos->fetchALL();
        array_pop($olds_procesos);
    }else{
        $olds_procesos = NULL;
    }


    $sql_query_proceso = $con->prepare('SELECT * FROM procesos, altas WHERE altas.id_alta=? ORDER BY id_procesos DESC');
    $sql_query_proceso->execute(array($id_alta));
    $existe_proceso = $sql_query_proceso->fetch();

}else{
    $id_proceso = NULL;
    $olds_procesos = NULL;
}
?>


<?php if(($olds_procesos)):
    $i=1;?>

    <div class="form-row">
        <div class="form-group col-md-10">
    
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <?php foreach($olds_procesos as $dato):?>
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $dato['id_procesos'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                    Intento No. <?php echo $i ?>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne<?php echo $dato['id_procesos'] ?>"" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body"> <!-- Comienza el espacio para mostrar -->
                                
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="fecha_listado">Fecha de Listado</label>
                                        <?php 
                                        if(isset($dato['fecha_listado']) && $dato['fecha_listado'] != "00-00-0000"){
                                            echo "<br>" . $dato['fecha_listado'];
                                        }else{
                                            echo 'No se capturó';
                                        }?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="fecha_listado">Fecha de Enviado</label>
                                        <?php 
                                        if(isset($dato['fecha_enviado']) && $dato['fecha_listado'] != "0000-00-00"){
                                            echo "<br>" . $dato['fecha_enviado'];

                                        }else{
                                            echo 'No se capturó';
                                        } ?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="respuesta">Respuesta recibida</label>
                                        <?php
                                        if(isset($dato['respuesta']) && $dato['respuesta'] != "" ){
                                            echo "<br>" . $dato['respuesta'];
                                        }else{
                                            echo 'No se capturó';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="se_informa_beneficiario">Se informó al beneficiario?</label>
                                        <?php 
                                        if(isset($dato['se_informa_beneficiario'])){
                                            if($dato['se_informa_beneficiario'] == 1){
                                                echo "Informado";
                                            }else{
                                                echo "NO Informado";}
                                        }else{
                                            echo "No se capturó";
                                        }?>
                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="fecha_de_informe">Fecha de informe</label>
                                        <?php
                                            if(isset($dato['fecha_de_informe']) &&  $dato['fecha_de_informe'] != ""){
                                                echo "<br>" . $dato['fecha_de_informe'];
                                            }else{
                                                echo "<br>Sin fecha"; 
                                            }?>
                                    </div>
                                </div>

                                <br>

                                <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label for="fecha_solicitud_visita">Fecha Solicitud Visita</label>
                                        <?php
                                        if(isset($dato['fecha_solicitud_visita'])){
                                            echo "<br>" . $dato['fecha_solicitud_visita'];
                                        } else{
                                            echo 'No se capturó';
                                        }?>
                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="fecha_programa_visita">Fecha programa Visita</label>
                                        <?php
                                        if(isset($dato['fecha_programa_visita']) && $dato['fecha_programa_visita'] != ""){
                                            echo "<br>" . $dato['fecha_programa_visita'];
                                        }else{
                                            echo 'No se capturó';
                                        }
                                        ?>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="id_servidor_publico">Servidor de la Nacion</label>
                                            <?php 
                                            if(isset($dato['id_servidor_publico']) && $dato['id_servidor_publico'] != 1){
                                                echo "<br>" . $dato['id_servidor_publico'];
                                            }else{
                                                echo 'No se eligió';
                                            }?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="fecha_real_visita">Fecha REAL Visita</label>
                                        <?php 
                                        if(isset($dato['fecha_real_visita']) && $dato['fecha_real_visita'] != ""){
                                            echo "<br>" . $dato['fecha_real_visita'];
                                        }else{
                                            echo 'No se capturó';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <br>

                                <div class="form-row">


                                    <div class="form-group col-md-2">
                                        <label for="ingreso_al_sistema">Ingreso al sistema?</label>
                                        <?php
                                        if(isset($dato['ingreso_al_sistema']) && $dato['ingreso_al_sistema'] != ""){
                                            if($dato['ingreso_al_sistema'] == 1){
                                                echo "<br>Si";
                                            }else{
                                                echo "<br>No";
                                            }}else{
                                                echo "No se capturó";   
                                            }?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="fecha_estimada_activacion">Fecha activacion</label>
                                        <?php 
                                        if(isset($dato['fecha_estimada_activacion']) && $dato['fecha_estimada_activacion'] != ""){
                                            echo "<br>" . $dato['fecha_estimada_activacion'];
                                        }else{
                                                echo "No se capturó";   
                                        }?>
                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="estado_pago">Pagando?</label>
                                        <?php 
                                        if(isset($dato['estado_pago']) && $dato['estado_pago'] != ""){
                                            if($dato['estado_pago'] ==1){
                                                echo "<br>Si";
                                            }else{
                                                echo "<br>No";
                                            }
                                        }else{
                                            echo "No se capturó";
                                         } ?>
                                    </div>


                                    <div class="col-md-2">
                                        <label for="id_empleado">Responsable</label>
                                        <?php 
                                        if(isset($alta['id_responsable']) && $alta['id_responsable'] != 1){
                                            echo "<br>(" . $alta['usuario'] . ") " . $alta['nombres'] . " " . $alta['apellido_p'];
                                            }else{
                                                echo "No se capturó";
                                            }?>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="form-row">

                                    <div class="col-md-7">
                                        <label for="reporte">Reporte:</label>
                                        <?php
                                        if(isset($dato['reporte']) && $dato['reporte'] != ""){
                                            echo "<br>" . $dato['reporte'];
                                        }else{
                                            echo "No se capturó";
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div> <!-- Termina espacio para mostrar -->
                        </div>
                    <?php $i++;
                    endforeach ?>
                </div>
            </div>
        </div>
    </div>
<?php endif?>



<form method="POST" action="controlador/proceso_sql.php">


    <input type="hidden" name="id_beneficiario" value="<?php echo $id_beneficiario ?>">
    <input type="hidden" name="id_proceso" value="<?php echo $id_proceso ?>">
    <input type="hidden" name="id_alta" value="<?php echo $id_alta ?>">
    <input type="hidden" name="id_programa" value="<?php echo $id_programa ?>">



<a href="programas.php?id=<?php echo $id_beneficiario ?>" class="btn btn-primary mr-3 ml-5 mt-3 "> <i class="fas fa-arrow-left"></i>Regresar</a>


<div class="espaciadormio" style="height: 30px;"></div>



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
        if(isset($existe_proceso['se_informa_beneficiario'])){
            if(isset($existe_proceso['fecha_de_informe']) &&  $existe_proceso['fecha_de_informe'] != ""){
                echo "<br>" . $existe_proceso['fecha_de_informe'];
                echo '<input type="hidden" name="fecha_de_informe" value="'.$existe_proceso['fecha_de_informe'].'">';

            }else{
                echo "<br>Sin fecha"; 
                echo '<input type="hidden" name="fecha_de_informe" value="">';
            }
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
            echo '<input type="hidden" class="form-control" value="' . $existe_proceso['fecha_solicitud_visita'] . '" id="fecha_solicitud_visita" name="fecha_solicitud_visita">'; 
        } else{
            echo '<input type="date" class="form-control" id="fecha_solicitud_visita" name="fecha_solicitud_visita">';
        }?>
    </div>


    <div class="form-group col-md-2">
        <label for="fecha_programa_visita">Fecha programa Visita</label>
        <?php
        if(isset($existe_proceso['fecha_programa_visita']) && $existe_proceso['fecha_programa_visita'] != ""){
            echo "<br>" . $existe_proceso['fecha_programa_visita'];
            echo '<input type="hidden" class="form-control" value="' . $existe_proceso['fecha_programa_visita'] . '" id="fecha_programa_visita" name="fecha_programa_visita">';
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
                echo '<input type="hidden" class="form-control" value="' . $existe_proceso['id_servidor_publico'] . '" id="id_servidor_publico" name="id_servidor_publico">';
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
            echo '<input type="hidden" class="form-control" value="' . $existe_proceso['fecha_real_visita'] . '" id="fecha_real_visita" name="fecha_real_visita">';
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
            if($existe_proceso['ingreso_al_sistema'] == 1){
                echo "<br>Si";
            }else{
                echo "<br>No";
            }
            echo '<input type="hidden" class="form-control" value="' . $existe_proceso['ingreso_al_sistema'] . '" id="ingreso_al_sistema" name="ingreso_al_sistema">';
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
            echo '<input type="hidden" value class="form-control" value="' . $existe_proceso['fecha_estimada_activacion'] . '" id="fecha_estimada_activacion" name="fecha_estimada_activacion">';
        }else{
            echo '<input type="date" class="form-control" id="fecha_estimada_activacion" name="fecha_estimada_activacion">';
        }?>
    </div>


    <div class="form-group col-md-2">
        <label for="estado_pago">Pagando?</label>
        <?php 
        if(isset($existe_proceso['estado_pago']) && $existe_proceso['estado_pago'] != ""){
            if($existe_proceso['estado_pago'] ==1){
                echo "<br>Si";
            }else{
                echo "<br>No";
            }
            echo '<input type="hidden" class="form-control" value="' . $existe_proceso['estado_pago'] . '" id="estado_pago" name="estado_pago">';
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
            echo '<input type="hidden" class="form-control" value="' . $alta['id_responsable'] . '" id="id_empleado" name="id_empleado">';
            }else{
                echo '<select id="id_responsable" name="id_responsable" class="form-control">';
                echo '<option value=""> Sin responsable </option>';
                $query=$mysqli->query("SELECT id_empleado, usuario FROM empleados WHERE id_empleado != 1");
                while ($valores = mysqli_fetch_array($query)): ?>
                    <option value="<?php echo $valores['id_empleado']?>"> <?php echo $valores['usuario'] ?></option>
                <?php endwhile;
             }?>
        </select>
    </div>


</div>

<br>

<div class="form-row">

    <div class="col-md-7">
        <label for="reporte">Reporte:</label>
        <?php
        if(isset($existe_proceso['reporte']) && $existe_proceso['reporte'] != ""){
            echo "<br>" . $existe_proceso['reporte'];
            echo '<input type="hidden" name="reporte" id="reporte" value="' . $existe_proceso['reporte'] . '">';
        }else{
            echo '<textarea class="form-control col-md-7" id="reporte" name="reporte" placeholder="Descripción de la Tarea"> </textarea>';
        }
        ?>
    </div>

</div>

<br>

<?php
if(isset($existe_proceso)){
    echo '<button class="btn btn-primary mr-3 ml-5 mt-3 " type="submit" name="actualizar" id="nuevo"> <i class="fas fa-user-edit"></i> Actualizar registro</button>';
}else{
    echo '<button class="btn btn-primary mr-3 ml-5 mt-3 " type="submit" name="nuevo" id="nuevo"> <i class="fas fa-save"></i> Guardar registro</button>';
}
?>
<button class="btn btn-success ml-5 mt-3 mr-3" type="submit" name="exito" id="exito"> <i class="fas fa-user-check"></i> ¡FUNCIONÓ! Se ha registrado</button>

<a href="?id_alta=<?php echo $id_alta?>&id_beneficiario=<?php echo $id_beneficiario?>" class="btn btn-danger ml-5 mt-3 mr-3"> <i class="fas fa-redo"></i> No funciono, REPETIR</a>


</form>


