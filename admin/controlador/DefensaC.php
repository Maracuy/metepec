<?php
class Defensa{
    private $puesto;

    function tooltipSimple($tooltip, $inter){
        $tooltip = '<a href="" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="top" title="' . $tooltip . '">' . $inter . '</a>';
        return $tooltip;
    }

    function tooltipDoble($tooltip, $inter, $link){
        $tooltip = '<a href="' . $link . '" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="top" title="' . $tooltip . '">' . $inter . '</a>'; 
        return $tooltip;
    }

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
        $dato=0;
        $flecha_ = '';
        $flecha_up = '<a href="controlador/posicionessql.php?posicion=' . $puesto['id_defensa'] . '&dato=sube">  <i class="fas fa-chevron-up"></i>  </a>';
        $flecha_down = '<a href="controlador/posicionessql.php?posicion=' . $puesto['id_defensa'] . '&dato=baja">  <i class="fas fa-chevron-down"></i>  </a>';
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

?>