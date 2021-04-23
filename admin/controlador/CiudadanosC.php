<?php
class Datos{
    
    function DatoConfigurable($puesto, $nombre){
        $fulllink = '<a class="btn btn-secondary btn-sm" href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] . '">';
        if($puesto[$nombre] != ''){
            return $puesto[$nombre];
        }else{
            return $fulllink . '<i class="fas fa-sliders-h"></i></a>';
        }
    }


    function DatosConfigurable($puesto, $nombre, $icotrue, $icofalse){
        $fulllink = '<a class="btn btn-secondary btn-sm" href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] . '">';
        $boton = '<a class="btn btn-secondary btn-sm">';
        if($puesto[$nombre] != ''){
            if($puesto[$nombre] == 1){
                return $boton . $icotrue . "</a>";
            }else{
                return $boton . $icofalse . "</a>";
            }
        }else{
            return $fulllink . '<i class="fas fa-sliders-h"></i></a>';
        }
    }

    function Edad($puesto, $nombre){
        $fulllink = '<a class="btn btn-secondary btn-sm" href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] . '">';
        if($puesto[$nombre] != '0000-00-00' && $puesto[$nombre] != ""){
            $edad = date('Y') - date("Y",strtotime($puesto[$nombre]));
            return $edad;
        }else{
            return $fulllink . '<i class="fas fa-sliders-h"></i></a>';
        }
    
    }
}



?>