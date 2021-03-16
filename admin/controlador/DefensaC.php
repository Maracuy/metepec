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

}

?>