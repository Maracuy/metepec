<?php 
class Elecciones{
    
    function TieneRZ($dato){
        if($dato){
            return "Tiene RZ </b>";
        }else{
            return "Falta RZ </b>";
        }
    }

    function TituloBarra($totales, $existentes, $tipo){
        return
        '<b>' . $existentes . '</b> de <b>' . $totales . '</b> ' . $tipo;
    }

    function BarraProgreso($totales, $existentes){
        $porcentaje = ($existentes/$totales) * 100 . '%';
        return 
            '<div class="progress">' . 
            '<div class="progress-bar" role="progressbar" style="width:' . $porcentaje . ';" aria-valuemin="0" aria-valuemax="100">' . round($porcentaje) . '%</div>' .
            '</div>';
    }
    
    function Cifras($totales, $zona){
        $total = 0;
        $ocupados = 0;
        foreach($totales as $n){
            if($n['zona'] == $zona){
                $total++;
                if($n['id_ciudadano'] != null){
                    $ocupados++;
                }
            }
        }
        return $result =array(
            'total' => $total,
            'ocupados' => $ocupados
        );
    }
}

?>