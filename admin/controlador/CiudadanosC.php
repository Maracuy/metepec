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

    function Capacitacion($ciudadano, $nombre, $colortrue, $colorfalse, $ico, $tooltipTrue, $tooltipFalse){
        if($ciudadano['id_ciudadano']){
            $status = $ciudadano[$nombre];
            $color = ($ciudadano[$nombre]) ? $colortrue : $colorfalse;
            $tooltip = ($ciudadano[$nombre]) ? $tooltipTrue : $tooltipFalse;
            $fulllink = '<a class="btn btn-' . $color .' btn-sm" title="'. $tooltip . '" href="controlador/adddefensasql.php?' . $nombre .  '=' . $status .'&id=' . $ciudadano['id_ciudadano'].'">';
            if($ciudadano[$nombre] != 0){
                if($ciudadano[$nombre] == 1){
                    return $fulllink . $ico . '</a>';
                }
            }else{
                return $fulllink . $ico . '</a>';
            }
        }
    }


    function posicion($puesto){
        if (isset($puesto['casilla'])) { //
            if ($puesto['puesto'] == 0) {
                return 'RC';
            }
            if ($puesto['puesto'] == 1) {
                return 'S1';
            }
            if ($puesto['puesto'] == 2) {
                return 'S2';
            }
            if ($puesto['puesto'] == 3) {
                return 'S3';
            }
        }else {
            if(isset($puesto['rg'])) {
                return 'RG';
            }
            if(isset($puesto['zona']) && !isset($puesto['rg']) && !isset($puesto['casilla'])) {
                return 'CZ';
            }
        }
    }

}
?>