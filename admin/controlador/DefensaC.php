<?php
class Defensa{
    private $puesto;



    function LlamarModal($puesto, $seccion, $casilla){
        

    }

    function linkBorrar($id, $posicion){

        return $link_delete = '<a href="deletedefensasql.php?cargo=' . $posicion . '&id=' . $id . '">' . '<i class="fas fa-trash blackiconcolor"></i> </a>';

    }


    function linkAgregar($id, $casilla){
        return $link_Add = '' . $id . '';
    }


}

?>