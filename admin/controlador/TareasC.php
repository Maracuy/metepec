<?php

class ConsultaTareas extends DBConexion{

    public function MuestraTareas($id_ciudadano){
        $consulta = "SELECT tareas.*, c1.nombres 
        FROM tareas 
        LEFT JOIN ciudadanos ON tareas.id_ciudadano_crea_tarea = ciudadanos.id_ciudadano
        WHERE id_ciudadano_crea_tarea = $id_ciudadano OR id_ciudadano_recibe_tarea = $id_ciudadano";
        $sql = DBConexion::Conexion()->prepare($consulta);
        $sql->execute();
        return $array = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>