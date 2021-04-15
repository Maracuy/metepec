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
                return 'bg-info';
            }else {
                return 'bg-primary';
            }
        }
    }


    function Capacitaciones($puesto,$capacitacion, $numero){
        $link = '<a href="controlador/adddefensasql.php?capacitaciones='. $capacitacion .'&id=' . $puesto . '&numero=' . $numero . '">';
        if($capacitacion == 1){
            return $link . '<i class="far fa-check-square mr-0 ml-1" style="color: #fff;"></i></a>';
        }else{
            return $link . '<i class="far fa-square mr-0 ml-0" style="color: #fff;"></i></a>';
        }
    }

}

?>