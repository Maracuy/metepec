<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../../conection/conexion.php';

function alta_auxiliar($con){
    
    $empleado = $_SESSION['user']['id_empleado'];
    $sql_unico = $con->prepare('SELECT * FROM beneficiarios WHERE id_empleado = ? ORDER BY id_beneficiario DESC');
    $sql_unico->execute(array($empleado));
    $beneficiario = $sql_unico->fetch();


    $nombres_aux = $_POST['nombres_auxiliar'];
    $apellido_p_aux = $_POST['apellido_p_auxiliar'];
    $apellido_m_aux = $_POST['apellido_m_auxiliar'];
    $telefono_auxiliar = $_POST['telefono_auxiliar'];
    $parentesco = $_POST['parentesco'];
    $id_del_beneficiario = $beneficiario['id_beneficiario'];
    
    $sql_agregar_beneficiario = 'INSERT INTO auxiliares VALUES (NULL, ?, ?, ?, ?, ?, ?)';
    $sentencia_agregar_beneficiario = $con->prepare($sql_agregar_beneficiario);

    try{
        $sentencia_agregar_beneficiario->execute(array($nombres_aux, $apellido_p_aux, $apellido_m_aux, $telefono_auxiliar, $id_del_beneficiario, $parentesco));
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }  

    
}

function alta_beneficiario($con){
    
        if(isset($_POST['nombres']) and isset($_POST['apellido_p']) and isset($_POST['apellido_m'])){
            $nombre_c = $_POST['nombres'] . " " . $_POST['apellido_p'] . " " . $_POST['apellido_m'];
        }
        
    $nombres = $_POST['nombres'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];

    $vulnerable = $_POST['vulnerable'];
    $genero = $_POST['genero'];
    $curp = $_POST['curp'];
    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $whats = $_POST['whats'];

    if(isset($_POST['fech_nacimiento'])){
        $fech_nacimiento = $_POST['fech_nacimiento'];
    }else{
        $fech_nacimiento = "2000-01-01";
    }

    $nivel = $_POST['nivel'];

    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $numero_int = $_POST['numero_int'];
    $colonia = $_POST['colonia'];
    $otra_colonia = (isset($_POST['otra_colonia'])) ? $_POST['otra_colonia'] : NULL;
    $municipio = "Metepec";
    $referencia = $_POST['referencia'];

    $solicitud_basico = $_POST['solicitud_basico'];

    $id_aux = NULL;
    $id_empleado = $_SESSION['user']['id_empleado'];

    if (isset($_POST['medio'])){
        $medio = $_POST['medio'];
    }
    
    $origen = $_POST['origen'];
    $promueve = $_POST['promueve'];


    $sql_agregar = 'INSERT INTO beneficiarios (id_beneficiario, fecha_captura, nombre_c, nombres, apellido_p, apellido_m, vulnerable, genero, curp, tipo_identificacion, numero_identificacion, telefono, email, whats, fech_nacimiento, nivel, dir_calle, dir_numero, dir_numero_int, id_colonia, otra_colonia, municipio, dir_referencia, solicitud_basico, id_empleado, id_medio_contacto, id_origenes, id_promotores) 
    VALUES (NULL, CURRENT_TIMESTAMP(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $sentencia_agregar = $con->prepare($sql_agregar);

    try{
        $sentencia_agregar->execute(array($nombre_c, $nombres, $apellido_p, $apellido_m, $vulnerable, $genero, $curp, $tipo_identificacion, $numero_identificacion, $telefono, $email, $whats, $fech_nacimiento, $nivel, $calle, $numero, $numero_int, $colonia, $otra_colonia, $municipio, $referencia, $solicitud_basico, $id_empleado, $medio, $origen, $promueve));
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }  

}

if(array_key_exists("guardar_salir",$_POST)){
    alta_beneficiario($con);
    if(isset($_POST['nombres_auxiliar'])){
        alta_auxiliar($con);
    }
    header("Location: ../beneficiarios");
}




 
?>

