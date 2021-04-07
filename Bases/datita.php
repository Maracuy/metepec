<?php
require_once '../conection/conexion.php';

echo 'welcome';
echo '<br>';
$stm = $con->query("SELECT * FROM datita");
$datita = $stm->fetchAll(PDO::FETCH_ASSOC);





foreach ($datita as $data) {
    $sql_editar = "INSERT INTO ciudadanos(nombres, apellido_p, apellido_m, numero_identificacion, telefono) VALUES (?,?,?,?,?)";
    $sentencia_agregar = $con->prepare($sql_editar);
    try {
        $sentencia_agregar->execute(array($data['nombres'],$data['apellido_p'],$data['apellido_m'],$data['clave_e'],$data['tel']));
    } catch (\Throwable $th) {
        echo  'error al registrar al ciudadano: '. $data['nombres'] . ' ' . $data['apellido_p'] .  ' etapa 1: ' . $th;
    }

    $id = $con->lastInsertId();

$casilla = "";
    if($data['casilla'] == 'BA'){
        $casilla = 'cba';
    }
    if($data['casilla'] != 'BA'){
        $casilla = 'cc';
        $casilla.= $data['casilla'][1];
    }
    if ($data['pos'] == 'PR') {
        $pos = 0;
    }
    if ($data['pos'] == 'S1') {
        $pos = 1;
    }

    $seccion = $data['seccion'];
    
    $stmt = $con->prepare("SELECT id_defensa FROM puestos_defensa WHERE seccion = ? AND puesto = ? AND casilla = ?");
    $stmt->execute(array($seccion, $pos, $casilla));
    $id_puesto = $stmt->fetch(PDO::FETCH_ASSOC);

    if($id_puesto){
    $puesto = $id_puesto['id_defensa'];
    }

    if(!$id_puesto){
        echo 'algo salio mal al encontrarlo';
        echo '<br>';
        var_dump($data);
    }else{
        $sql_editar = "UPDATE puestos_defensa SET id_ciudadano = $id WHERE id_defensa = $puesto";
        $sentencia_agregar = $con->prepare($sql_editar);
        try {
            $sentencia_agregar->execute();
        } catch (\Throwable $th) {
            echo  'error al agregar el ciudadano: '. $data['nombres'] . ' ' . $data['apellido_p'] .  ' al puesto de defensa 1: ' . $th;
        }
    }

}
