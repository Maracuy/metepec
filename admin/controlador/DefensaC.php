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

    function linkBorrar($id, $posicion){

        return $link_delete = '<a href="deletedefensasql.php?cargo=' . $posicion . '&id=' . $id . '">' . '<i class="fas fa-trash blackiconcolor"></i> </a>';

    }


    function linkAgregar($id, $casilla){
        return $link_Add = '' . $id . '';
    }


}

?>