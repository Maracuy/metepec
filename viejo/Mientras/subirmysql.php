<?php
	// Conexión a la base de datos
    require_once 'conexion.php';

    $CODE = $_POST['CODE'];
    $ST = $_POST['ST'];
    $FECHA = $_POST['FECHA'];
    $REGISTRA = $_POST['REGISTRA'];
    $ORIG = $_POST['ORIG'];
    $GEST = $_POST['GEST'];
    $MEDIO = $_POST['MEDIO'];
    $ATN = $_POST['ATN'];
    $SOLICITUD = $_POST['SOLICITUD'];
    $PFB = $_POST['PFB'];
    $BENEFICIARIO = $_POST['BENEFICIARIO'];
    $PGF = $_POST['PGF'];
    $GESTOR = $_POST['GESTOR'];
    $CONTACTO = $_POST['CONTACTO'];
    $UBICACIÓN = $_POST['UBICACIÓN'];
    $PRGM = $_POST['PRGM'];
    $DEPT = $_POST['DEPT'];
    $P_RSP = $_POST['P_RSP'];
    $ACP = $_POST['ACP'];
    $TIPO = $_POST['TIPO'];
    $REC_DCS = $_POST['REC_DCS'];
    $TERM = $_POST['TERM'];
    $LIST = $_POST['LIST'];
    $ENV = $_POST['ENV'];
    $RESPUESTA = $_POST['RESPUESTA'];
    $SL_VST = $_POST['SL_VST'];
    $FECHA_V = $_POST['FECHA_V'];
    $GEN_D = $_POST['GEN_D'];
    $ENV_D = $_POST['ENV_D'];
    $DOC = $_POST['DOC'];
    $PROGRESO = $_POST['PROGRESO'];
    $ST_FN = $_POST['ST_FN'];


    

$sql_agregar = 'INSERT INTO wpw1_supsystic_membership_activity VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL,NULL,NULL)';
$sentencia_agregar = $con->prepare($sql_agregar);
  
try{
    $sentencia_agregar->execute(array($CODE, $ST, $FECHA, $REGISTRA, $ORIG, $GEST, $MEDIO, $ATN, $SOLICITUD, $PFB, $BENEFICIARIO, $PGF, $GESTOR, $CONTACTO, $UBICACIÓN, $PRGM, $DEPT, $P_RSP, $ACP, $TIPO, $REC_DCS, $TERM, $LIST, $ENV, $RESPUESTA, $SL_VST, $FECHA_V, $GEN_D, $ENV_D, $DOC, $PROGRESO, $ST_FN));
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

