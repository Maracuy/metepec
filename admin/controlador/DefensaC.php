<?php
class Defensa{
    private $puesto;

    function posicion($puesto){
        if ($puesto['casilla']) { //
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
            if ($puesto['rg']) {
                return 'RG';
            }else {
                return 'CZ';
            }
        }
    }

    function Flechas($puesto){
        if ($puesto['id_ciudadano']) {
            $dato=0;
            $flecha_ = '';
            $flecha_up = '<a href="controlador/posicionessql.php?posicion=' . $puesto['id_defensa'] . '&dato=up">  <i class="fas fa-chevron-up"></i>  </a>';
            $flecha_down = '<a href="controlador/posicionessql.php?posicion=' . $puesto['id_defensa'] . '&dato=down">  <i class="fas fa-chevron-down"></i>  </a>';
            if ($puesto['casilla']) {
                if($puesto['puesto'] == 0){
                    return $flecha_down;
                }
                if ($puesto['puesto'] == 1 || $puesto['puesto'] == 2 ) {
                    return $flecha_up . $flecha_down;
                }
                if($puesto['puesto'] == 3){
                    return $flecha_up;
                }
            }
        }
    }

    function Colores($puesto){
        if ($puesto['casilla']) { //
            if ($puesto['puesto'] == 0) {
                return 'table-primary';
            }
            if ($puesto['puesto'] == 1) {
                return 'table-secondary';
            }
            if ($puesto['puesto'] == 2) {
                return 'table-secondary';
            }
            if ($puesto['puesto'] == 3) {
                return 'table-secondary';
            }
        }else {
            if ($puesto['rg']) {
                return 'table-warning';
            }else {
                return 'table-danger';
            }
        }
    }


    function ElementoBoton($puesto, $nombre, $colortrue, $colorfalse, $ico, $tooltipTrue, $tooltipFalse){
        if($puesto['id_ciudadano']){
            if($puesto[$nombre] != ''){
                $status = $puesto[$nombre];
                $color = ($puesto[$nombre]) ? $colortrue : $colorfalse;
                $tooltip = ($puesto[$nombre]) ? $tooltipTrue : $tooltipFalse;
                $fulllink = '<a class="btn btn-' . $color .' btn-sm" title="'. $tooltip . '" href="controlador/adddefensasql.php?' . $nombre .  '=' . $status .'&id=' . $puesto['id_defensa'] . '">';
                if($puesto[$nombre] == 1){
                    return $fulllink . $ico . '</a>';
                }else{
                    return $fulllink . $ico . '</a>';
                }
            }
        }
    }


    function Capacitacion($puesto, $nombre, $colortrue, $colorfalse, $ico, $tooltipTrue, $tooltipFalse){
        if($puesto['id_ciudadano']){
            $status = $puesto[$nombre];
            $color = ($puesto[$nombre]) ? $colortrue : $colorfalse;
            $tooltip = ($puesto[$nombre]) ? $tooltipTrue : $tooltipFalse;
            $fulllink = '<a class="btn btn-' . $color .' btn-sm" title="'. $tooltip . '" href="controlador/adddefensasql.php?' . $nombre .  '=' . $status .'&id=' . $puesto['id_ciudadano'] . '&def=' . $puesto['id_defensa'] . '">';
            if($puesto[$nombre] != 0){
                if($puesto[$nombre] == 1){
                    return $fulllink . $ico . '</a>';
                }
            }else{
                return $fulllink . $ico . '</a>';
            }
        }
    }



    //Esta funcion regresa un Boton con Icono True o icono False, Ademas de un Tooltop True o False.
    function ConfBotonIco($puesto, $nombre, $icoTrue, $icoFalse, $tooltipTrue, $tooltipFalse){
        if($puesto['id_ciudadano']){
            if($puesto[$nombre] != ''){
                $status = $puesto[$nombre];
                $ico = ($puesto[$nombre]) ? $icoTrue : $icoFalse;
                $tooltip = ($puesto[$nombre]) ? $tooltipTrue : $tooltipFalse;
                $fulllink = '<a class="btn btn-secondary btn-sm" title="'. $tooltip . '" href="controlador/adddefensasql.php?' . $nombre .  '=' . $status .'&id=' . $puesto['id_defensa'] . '">';
                if($puesto[$nombre] == 1){
                    return $fulllink . $ico . '</a>';
                }else{
                    return $fulllink . $ico . '</a>';
                }
            }else{
                return '<a class="btn btn-secondary btn-sm" href="electoral.php?id=' . $puesto[$nombre] .'"><i class="fas fa-sliders-h"></i></a>';
            }
        }
    }


    function DatoConfigurable($puesto, $nombre){
        if($puesto['id_ciudadano']){
            $fulllink = '<a class="btn btn-secondary btn-sm" href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] . '">';
            if($puesto[$nombre] != ''){
                return $puesto[$nombre];
            }else{
                return $fulllink . '<i class="fas fa-sliders-h"></i></a>';
            }
        }
    }


}

?>