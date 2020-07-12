<?php
	// Conexión a la base de datos
    require_once 'conexion.php';
    
    $SECTOR = $_POST['SECTOR'];
    $ST_IN = $_POST['ST_IN'];
    $REPL = $_POST['REPL'];
    $F_CAPT = $_POST['CAPT'];
    $CAPT = $_POST['CAPT'];
    $FOLIO = $_POST['FOLIO'];
    $ORIG = $_POST['ORIG'];
    $PROM = $_POST['PROM'];
    $MEDI = $_POST['MEDI'];
    $SOLIC = $_POST['SOLIC'];
    $F_LIM = $_POST['F_LIM'];
    $BENEF = $_POST['BENEF'];
    $VULN = $_POST['VULN'];
    $AUXI = $_POST['AUXI'];
    $TEL = $_POST['TEL'];
    $COLO = $_POST['COLO'];
    $PROG = $_POST['PROG'];
    $DEPT = $_POST['DEPT'];
    $RSPN = $_POST['RSPN'];
    $ACEP = $_POST['ACEP'];
    $TIPO = $_POST['TIPO'];
    $D_OFC = $_POST['D_OFC'];
    $D_DCT = $_POST['D_DCT'];
    $D_IDI = $_POST['D_IDI'];
    $D_CDC = $_POST['D_CDC'];
    $D_NDN = $_POST['D_NDN'];
    $D_DDD = $_POST['D_DD'];
    $G_DOC = $_POST['G_DOC'];
    $DOC = $_POST['DOC'];
    $E_DOC = $_POST['E_DOC'];
    $LIST = $_POST['LIST'];
    $E_LST = $_POST['E_LST'];
    $RESP = $_POST['RESP'];
    $ERSP = $_POST['ERSP'];
    $F_SOL = $_POST['F_SOL'];
    $F_VIS = $_POST['F_VIS'];
    $RACO = $_POST['RACO'];
    $CAPF = $_POST['CAPF']; 
    $REPT = $_POST['REPT'];
    $ACCN = $_POST['ACCN'];
    $ST_FN = $_POST['ST_FN'];
    $VAL_J = $_POST['VAL_J'];
    $VAL_S = $_POST['VAL_S'];


echo (var_dump($SECTOR));
    /*

$sql_agregar = 'INSERT INTO wpw1_supsystic_membership_activity VALUES (NULL, ?, ?, ?, NULL, ?, NULL,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL)';
$sentencia_agregar = $con->prepare($sql_agregar);
  
try{
    $sentencia_agregar->execute(array($SECTOR, $ST_IN, $REPL, $CAPT, $ORIG, $PROM, $MEDI, $SOLIC, $F_LIM, $BENEF, $VULN, $AUXI, $TEL, $COLO, $PROG, $DEPT, $RSPN, $ACEP, $TIPO, $D_OFC, $D_DCT, $D_IDI, $D_CDC, $D_NDN, $D_DDD, $G_DOC, $DOC, $E_DOC, $LIST, $E_LST, $RESP, $F_SOL, $F_VIS, $RACO, $CAPF, $REPT, $ACCN, $ST_FN));
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
*/

?>
