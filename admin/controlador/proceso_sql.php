<?php
session_start();
include_once '../../conection/conexion.php';

if($_POST){

    $id_responsable = (($_POST['id_responsable'] != '') && $_POST['id_responsable'] != 1) ? intval($_POST['id_responsable']) : 1;

    $id_alta = (isset($_POST['id_alta']) && $_POST['id_alta'] != "") ? $_POST['id_alta'] : NULL ;

    $id_beneficiario = $_POST['id_beneficiario'];
    $id_proceso = $_POST['id_proceso'];
    $capturista = $_SESSION['user']['id_empleado'];
    $id_programa = $_POST['id_programa'];

    $fecha_listado = ($_POST['fecha_listado'] != "") ? $_POST['fecha_listado'] : NULL;
    $fecha_enviado = ($_POST['fecha_enviado'] != "") ? $_POST['fecha_enviado'] : NULL;
    $respuesta = (isset($_POST['respuesta'])) ? $_POST['respuesta'] : NULL;
    $se_informa_beneficiario = (isset($_POST['se_informa_beneficiario']) && $_POST['se_informa_beneficiario'] != "") ? $_POST['se_informa_beneficiario'] : NULL;
    $fecha_de_informe = ($_POST['fecha_de_informe'] != "") ? $_POST['fecha_de_informe'] : NULL;
    $fecha_solicitud_visita = ($_POST['fecha_solicitud_visita'] != "") ? $_POST['fecha_solicitud_visita'] : NULL;
    $fecha_programa_visita = ($_POST['fecha_programa_visita'] != "") ? $_POST['fecha_programa_visita'] : NULL;
    $id_servidor_publico = (isset($_POST['id_servidor_publico'])) ? $_POST['id_servidor_publico'] : 1;
    $fecha_real_visita = ($_POST['fecha_real_visita'] != "") ? $_POST['fecha_real_visita'] : NULL;
    $ingreso_al_sistema = ($_POST['ingreso_al_sistema'] != "") ? $_POST['ingreso_al_sistema'] : NULL;
    $fecha_estimada_activacion = ($_POST['fecha_estimada_activacion'] != "") ? $_POST['fecha_estimada_activacion'] : NULL;
    $estado_pago = (isset($_POST['estado_pago']) && $_POST['estado_pago'] != "") ? $_POST['estado_pago'] : NULL;
    $reporte = (isset($_POST['reporte']) &&  $_POST['reporte'] != "") ? nl2br($_POST['reporte']) : NULL;


    $proceso = array(
        NULL,
        $id_beneficiario,
        $id_alta,
        $fecha_listado,
        $fecha_enviado,
        $respuesta,
        $se_informa_beneficiario,
        $fecha_de_informe,
        $fecha_solicitud_visita,
        $fecha_programa_visita,
        $id_servidor_publico,
        $fecha_real_visita,
        $ingreso_al_sistema,
        $fecha_estimada_activacion,
        $estado_pago,
        $reporte);
    }


function regResponsable($con, $id_responsable, $id_alta){

    $sql_responsable = 'UPDATE altas SET id_responsable=? WHERE id_alta=? ';
    $sentencia_alta_responsable = $con->prepare($sql_responsable);
    $sentencia_alta_responsable->execute(array($id_responsable, $id_alta));
    
    return 0;
}

function actualizarProceso($con, $id_proceso, $proceso){
    $proceso = array_slice($proceso,3);
    array_push($proceso, $id_proceso);

    $sql_update = "UPDATE procesos SET fecha_listado=?, fecha_enviado=?, respuesta=?, se_informa_beneficiario=?, fecha_de_informe=?, fecha_solicitud_visita=?, fecha_programa_visita=?, id_servidor_publico=?, fecha_real_visita=?, ingreso_al_sistema=?, fecha_estimada_activacion=?, estado_pago=?, reporte=? WHERE id_procesos =?";
    $consulta_update=$con->prepare($sql_update);

    try{
        $consulta_update->execute($proceso);
    }catch(Exception $e){
        echo 'Algo salio mal con la captura' . $e->getMessage();
    }
}

function checa_alta1($con, $id_beneficiario){
    $sql_checa = $con->prepare('SELECT id_alta FROM altas WHERE id_beneficiario =? AND id_programa = 1');
    $sql_checa->execute(array($id_beneficiario));
    $id_alta = $sql_checa->fetch();

    if($id_alta){
        $id_alta = $id_alta[0];

        $sql_elimina = $con->prepare('DELETE FROM altas WHERE id_alta = ?');
        $sql_elimina->execute(array($id_alta));
        return 1;
    }else{
        return 0;
    } 
}

function creaAlta($con, $capturista, $id_beneficiario, $id_programa, $id_responsable){

    $alta = array(
        NULL,
        $id_beneficiario,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        $id_programa,
        $id_responsable,
        0,
        $capturista,
        0
    );
    
    $agregar_nueva_alta = 'INSERT INTO altas VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $sentencia_agregar_nueva_alta = $con->prepare($agregar_nueva_alta);
    try{
        $sentencia_agregar_nueva_alta->execute($alta);
        $sql_last_alta = 'SELECT LAST_INSERT_ID()';
        $sentencia_last_alta = $con->prepare($sql_last_alta);
        $sentencia_last_alta->execute();
        $last_alta = $sentencia_last_alta->fetch();
        $last_alta = intval($last_alta[0]);
        return $last_alta;
    }catch(Exception $e){
        echo 'algo salio mal con la alta nueva:' . $e->getMessage();}
        die();    
}


function nuevo_proceso($con, $proceso, $id_alta){    
    $proceso[10] = 1;
    $proceso[2] = $id_alta;

    $agregar_nuevo_proceso = 'INSERT INTO procesos VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $sentencia_agregar_nuevo_proceso = $con->prepare($agregar_nuevo_proceso);
    
    try{        
        $sentencia_agregar_nuevo_proceso->execute($proceso);
    
        $sql_last_proceso = 'SELECT LAST_INSERT_ID()';
        $sentencia_last_proceso = $con->prepare($sql_last_proceso);
        $sentencia_last_proceso->execute();
        $last_proceso = $sentencia_last_proceso->fetch();
        $last_proceso = intval($last_proceso[0]);

        return $last_proceso;



    }catch(Exception $e){
        echo 'Algo salio mal con el registro de proceso:' . $e->getMessage();
        die();
    }
}


function exito($con, $id_alta){
    $sql_exito = $con->prepare("UPDATE altas SET exito = 1 WHERE id_alta =?");
    $sql_exito->execute(array($id_alta));
}


if(array_key_exists("nuevo",$_POST)){
    
    checa_alta1($con, $id_beneficiario); //Verifica y elimina la famosa alta 1
    
    if(!$id_alta){
        $id_alta = creaAlta($con, $capturista, $id_beneficiario, $id_programa, $id_responsable);
    }
    
    $id_proceso = nuevo_proceso($con, $proceso, $id_alta);

    if($id_responsable != 1){
        regResponsable($con, $id_responsable, $id_alta);
    }

    header("Location: ../programas.php?id=$id_beneficiario");
}


if(array_key_exists("actualizar",$_POST)){
    actualizarProceso($con, $id_proceso, $proceso);
    
    if( !empty($id_responsable)){
        regResponsable($con, $id_responsable, $id_alta);
    }
    
    header("Location: ../programas.php?id=$id_beneficiario");
}

if(array_key_exists("exito",$_POST)){
    actualizarProceso($con, $id_proceso, $proceso);
    
    if( !empty($id_responsable)){
        regResponsable($con, $id_responsable, $id_alta);
    }
    
    exito($con, $id_alta);
    
    header("Location: ../programas.php?id=$id_beneficiario");
}




?>