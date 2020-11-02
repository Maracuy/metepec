<?php
session_start();

if(!$_POST){
    die();
}

if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../conection/conexion.php';

$empleado = $_SESSION['user']['id_empleado'];

$datos = $_POST;

$id = ($datos['id'] != '' ) ? intval($datos['id']) : NULL ;

if($id){
    unset($datos['id']);
    unset($datos['fecha_captura']);
}

$datos['id_registrante'] = ($datos['id_registrante'] != '') ? intval($datos['id_registrante']) : $empleado;
$datos['manzana'] = ($datos['manzana'] != '') ? intval($datos['manzana']) : $datos['manzana'];

$keys = array_keys($datos);
array_pop($keys);
$number = count($keys);
$signos = "?";
if ($number > 1){
    for($i=1; $i<$number; $i++){
    $signos = $signos . ",?";
    }
}
$values = array_values($datos);
$keysString = implode(",", $keys);


/* 
$ciudadano = array();

$ciudadano[0] = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : NULL;
$ciudadano[0] = ($ciudadano[0] != NULL) ? intval($ciudadano[0]) : NULL ;
$ciudadano[1] = (isset($_POST['nivel']) && $_POST['nivel'] != "") ? $_POST['nivel'] : 10;
$ciudadano[1] = intval($ciudadano[1]);
$ciudadano[2] = (isset($_POST['usuario_sistema']) && $_POST['usuario_sistema'] != "") ? $_POST['usuario_sistema'] : NULL;
$ciudadano[3] = (isset($_POST['contrasenia']) && $_POST['contrasenia'] != "") ? $_POST['contrasenia'] : NULL;
$ciudadano[4] = (isset($_POST['fecha_captura']) && $_POST['fecha_captura'] != '') ? $_POST['fecha_captura'] : date('Y-m-d h:i:s');
$ciudadano[6] = (isset($_POST['nombres']) && $_POST['nombres'] != '') ? $_POST['nombres'] : NULL;
$ciudadano[7] = (isset($_POST['apellido_p']) && $_POST['apellido_p'] != '') ? $_POST['apellido_p'] : NULL;
$ciudadano[8] = (isset($_POST['apellido_m']) && $_POST['apellido_m'] != '') ? $_POST['apellido_m'] : NULL;
$ciudadano[5] = $ciudadano[6] . " " . $ciudadano[7] . " " . $ciudadano[8];

$ciudadano[9] = ($_POST['vulnerable'] != '') ? $_POST['vulnerable'] : NULL;
$ciudadano[9] = intval($_POST['vulnerable']);
$ciudadano[10] = ($_POST['genero'] != '') ? $_POST['genero'] : NULL;
$ciudadano[10] = intval($_POST['genero']);
$ciudadano[11] = ($_POST['curp'] != '') ? $_POST['curp'] : NULL;
$ciudadano[12] = ($_POST['numero_identificacion'] != '') ? $_POST['numero_identificacion'] : NULL;
$ciudadano[13] = ($_POST['telefono'] != '') ? $_POST['telefono'] : NULL;
$ciudadano[14] = ($_POST['otro_telefono'] != '') ? $_POST['otro_telefono'] : NULL;
$ciudadano[15] = ($_POST['email'] != '') ? $_POST['email'] : NULL;
$ciudadano[16] = ($_POST['whats'] != '') ? $_POST['whats'] : NULL;
$ciudadano[16] = intval($_POST['whats']);

$ciudadano[17] = ($_POST['fecha_nacimiento'] != '') ? $_POST['fecha_nacimiento'] : NULL;

$ciudadano[18] = ($_POST['estado_civil'] != '') ? $_POST['estado_civil'] : NULL;
$ciudadano[19] = ($_POST['num_hijos'] != '') ? $_POST['num_hijos'] : NULL;
$ciudadano[20] = ($_POST['ocupacion'] != '') ? $_POST['ocupacion'] : NULL;
$ciudadano[21] = ($_POST['pensionado'] != '') ? $_POST['pensionado'] : NULL;
$ciudadano[22] = ($_POST['enfermedades_cron'] != '') ? $_POST['enfermedades_cron'] : NULL;

$ciudadano[23] = ($_POST['cp'] != '') ? $_POST['cp'] : NULL;
$ciudadano[24] = ($_POST['dir_calle'] != '') ? $_POST['dir_calle'] : NULL;
$ciudadano[25] = ($_POST['dir_numero'] != '') ? $_POST['dir_numero'] : NULL;
$ciudadano[26] = ($_POST['dir_numero_int'] != '') ? $_POST['dir_numero_int'] : NULL;
$ciudadano[27] = ($_POST['id_colonia'] != '') ? intval($_POST['id_colonia']) : NULL;
$ciudadano[28] = ($_POST['otra_colonia'] != '') ? $_POST['otra_colonia'] : NULL;
$ciudadano[29] = "Metepec";
$ciudadano[30] = ($_POST['zona'] != '') ? $_POST['zona'] : NULL;
$ciudadano[31] = ($_POST['manzana'] != '') ? $_POST['manzana'] : NULL;
$ciudadano[32] = ($_POST['lote'] != '') ? $_POST['lote'] : NULL;
$ciudadano[33] = ($_POST['dir_referencia'] != '') ? $_POST['dir_referencia'] : NULL;

$ciudadano[34] = ($_POST['zona_electoral'] != '') ? $_POST['zona_electoral'] : NULL;
$ciudadano[35] = ($_POST['seccion_electoral'] != '') ? $_POST['seccion_electoral'] : NULL;
$ciudadano[36] = ($_POST['participo_eleccion'] != '') ? $_POST['participo_eleccion'] : NULL;
$ciudadano[37] = ($_POST['posicion'] != '') ? $_POST['posicion'] : NULL;
$ciudadano[38] = ($_POST['asistio'] != '') ? $_POST['asistio'] : NULL;

$ciudadano[39] = ($_POST['afiliacion'] != '') ? $_POST['afiliacion'] : NULL;

$ciudadano[40] = $_SESSION['user']['id_empleado'];

$ciudadano[41] = $_POST['observaciones'];

$id_capturista = $ciudadano[30];
*/


/* function alta_auxiliar($con){
    
    $empleado = $_SESSION['user']['id_empleado'];
    $sql_unico = $con->prepare('SELECT * FROM ciudadanos WHERE id_empleado = ? ORDER BY id_ciudadano DESC');
    $sql_unico->execute(array($empleado));
    $ciudadano = $sql_unico->fetch();


    $nombres_aux = $_POST['nombres_auxiliar'];
    $apellido_p_aux = $_POST['apellido_p_auxiliar'];
    $apellido_m_aux = $_POST['apellido_m_auxiliar'];
    $telefono_auxiliar = $_POST['telefono_auxiliar'];
    $parentesco = $_POST['parentesco'];
    $id_del_ciudadano = $ciudadano['id_ciudadano'];
    
    $sql_agregar_ciudadano = 'INSERT INTO auxiliares VALUES (NULL, ?, ?, ?, ?, ?, ?)';
    $sentencia_agregar_ciudadano = $con->prepare($sql_agregar_ciudadano);

    try{
        $sentencia_agregar_ciudadano->execute(array($nombres_aux, $apellido_p_aux, $apellido_m_aux, $telefono_auxiliar, $id_del_ciudadano, $parentesco));
    }catch(Exception $e){
        echo 'Error al crear el auxiliar ',  $e->getMessage(), "\n";
    }  
} */


/* 
function altas($con, $id_ciudadano, $id_capturista, $keysString){

    

    $sql_agregar = "INSERT INTO altas(" . $keysString . ") VALUES(?)";
    $sentencia_agregar = $con->prepare($sql_agregar);
    
    try{  
        $sentencia_agregar->execute(array($id_ciudadano, $id_capturista));
        return 0;
    }catch(Exception $e){
        echo 'Error en el alta: ',  $e->getMessage(), "\n";
        die();
    }  

}
 */


function alta_ciudadano($con, $values, $keysString, $signos){
 
    $sql_agregar = "INSERT INTO ciudadanos(" . $keysString . ") VALUES(" . $signos . ")";
    $sentencia_agregar = $con->prepare($sql_agregar);
    try{
        $sentencia_agregar->execute($values);
        $sentencia_alta = $con->prepare('SELECT LAST_INSERT_ID()');
        $sentencia_alta->execute();
        $last_id_ciudadano = $sentencia_alta->fetch();
        $id_ciudadano = intval($last_id_ciudadano[0]);
    }catch(Exception $e){
        echo 'Ocurrio un error al intentar la alta: ',  $e->getMessage(), "\n";
        die();
    }  

}


function actualizar($con, $values, $keys, $id){
    array_pop($values);
    $keysString = "";
    $number = count($keys);
    $i=0;
    foreach ($keys as $key => $value) {
        $keysString = $keysString . "" . $value . "=?";
        $i ++;
        if($number != $i){
            $keysString = $keysString . ",";
        }
    }
    $sql_editar = "UPDATE ciudadanos SET $keysString WHERE id_ciudadano=$id";
    $sentencia_agregar = $con->prepare($sql_editar);
    try{
        $sentencia_agregar->execute($values);

    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        die();
    }  
}



/* if(array_key_exists("guardar_salir",$_POST)){
    $id_ciudadano = alta_ciudadano($con, $ciudadano);
    altas($con, $id_ciudadano, $id_capturista);

    if(($_POST['nombres_auxiliar'] !="")){
        alta_auxiliar($con);
    }
    header("Location: ../ciudadanos.php");
}



if(array_key_exists("inscribir",$_POST)){
    $id_ciudadano = alta_ciudadano($con, $ciudadano);
    altas($con, $id_ciudadano, $id_capturista);
    if(($_POST['nombres_auxiliar'] !="")){
        alta_auxiliar($con);
    }
    header("Location: ../programas.php?id=$id_ciudadano");
} */



if(array_key_exists("continuar",$_POST)){
    array_pop($values);
    $id_ciudadano = alta_ciudadano($con, $values, $keysString, $signos);
    header("Location: ../archivos_ciudadanos.php?id=$id_ciudadano");
}

if(array_key_exists("actualizar",$_POST)){
    actualizar($con, $values, $keys, $id);
    header("Location: ../archivos_ciudadanos.php?id=$id");
}
?>