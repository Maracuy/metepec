<?php

if($_POST){
  $tarea_titulo = $_POST['tarea']['titulo'];
  $tarea_descripcion = $_POST['tarea']['descripcion'];
  $tarea_responsable = $_POST['tarea']['responsable'];
  $tarea_fecha_limite = $_POST['tarea']['fecha_limite'];
  $tarea_beneficiario_id = $_POST['tarea']['id_beneficiario'];
  echo $tarea_descripcion;
}


?>



<div class="container-fluid">
    <h4>Nueva tarea</h4>
    <br>
    <form action="controlador/tareasql.php" method="post">

        <div class="form-group">

            <input class="form-control col-md-7" type="text" <?php echo $echotitulo = ($_POST) ? 'value="'. $tarea_titulo . '"' : "" ?> name="tarea[titulo]" id="tarea[titulo]" placeholder="Cosas por hacer" >
            

            <div class="mt-3">
                <textarea class="form-control col-md-7" id="tarea[descripcion]" name="tarea[descripcion]" placeholder="Descripción de la Tarea"> <?php echo $echotitulo = ($_POST) ? $tarea_descripcion . '"' : "" ?></textarea>
            </div>

            <br>
                    
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="tarea[beneficiario_id]">Beneficiario ID</label>
                    <input type="number" <?php echo $echotitulo = ($_POST) ? 'value="'. $tarea_beneficiario_id . '"' : "" ?> class="form-control" id="tarea[beneficiario_id]" name="tarea[beneficiario_id]">
                </div>

                <div class="form-group col-md-3">
                    <label for="fech_nacimiento">Buscar</label>
                    <br>
                    <button class="btn btn-primary" type="submit" name="buscar_beneficiario" id="buscar_beneficiario"><i class="fas fa-search"></i> Buscar Beneficiario</button>
                </div>
            </div>

            <div class="form-row">

                <div class="col-md-3">
                    <label for="medio">Responsable</label>
                    <select id="tarea[responsable]" name="tarea[responsable]" class="form-control">
                        <?php $query = $mysqli -> query ("SELECT * FROM empleados");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id_empleado'].'">'.$valores['usuario'].'</option>'; }?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="tarea[fecha_limite]">Fecha Limite</label>
                    <input type="date" value="2020-01-01" <?php echo $echotitulo = ($_POST) ? 'value="'. $tarea_fecha_limite. '"' : "" ?> class="form-control" id="tarea[fecha_limite]" name="tarea[fecha_limite]">
                </div>
            </div>




        </div>




    <button class="btn btn-primary" type="submit" name="registrar_tarea" id="registrar_tarea"> <i class="fas fa-forward mr-2"></i>Enviar Tarea</button>
    

    </form>



</div>