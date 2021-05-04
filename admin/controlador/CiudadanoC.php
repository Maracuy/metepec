<?php


class Ciudadano{
    private $SiNo = array(
      array('',''),
      array(0,'No'),
      array(1,'Si'),
    );

    function CampoEditable($ciudadano, $nombre, $nombreCompleto, $size){
        if(isset($ciudadano) && $ciudadano != ''){
            return '
            <div class="form-group col-md-' . $size . '">
                <label for="' . $nombre . '">' . $nombreCompleto . '</label>
                <input type="text" value="' . $ciudadano[$nombre] .'" class="form-control" id="apellido_p" name="apellido_p" required>
            </div>';
        }else{
            return '
            <div class="form-group col-md-' . $size . '">
                <label for="' . $nombre . '">' . $nombreCompleto . '</label>
                <input type="text" class="form-control" id="apellido_p" name="apellido_p">
            </div>';
        }
    }

    function Fechas($ciudadano, $nombre, $nombreCompleto, $size){
        if(isset($ciudadano) && $ciudadano != ''){
            return '
            <div class="form-group col-md-' . $size . '">
                <label for="' . $nombre . '">' . $nombreCompleto . '</label>
                <input type="date" value="' . $ciudadano['fecha_nacimiento'] . '" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>';
        }else{
            return '
            <div class="form-group col-md-' . $size . '">
                <label for="' . $nombre . '">' . $nombreCompleto . '</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>';
        }
    }

    function Selects(){
        
    }

    function ListaSiNo($ciudadano, $nombre, $nombreCompleto, $size){
        $res = '';
        if(isset($ciudadano[$nombre]) && $ciudadano[$nombre] != ''){
            foreach($this->SiNo as $n){
                if($n[0] == $ciudadano[$nombre]){
                    $res.= '<option selected value"' . $n[0] . '"> No </option>';
                }
                $res.= '<option value"' . $n[0] . '"> No </option>';
            }

            return '
            <div class="form-group col-md-' . $size . '">
                <label for="' . $nombre . '">' . $nombreCompleto . '</label>
                <select class="form-control" id="' . $nombre . 'name="' . $nombre . '">' .
                    $res . 
                '</select>
            </div>';
        }else{
            return '
            <div class="form-group col-md-' . $size . '">
                <label for="' . $nombre . '">' . $nombreCompleto . '</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>';
        }
    }
}
?>