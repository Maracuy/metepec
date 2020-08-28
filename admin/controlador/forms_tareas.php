<?php

if($_POST){
  $tarea_titulo = $_POST['tarea']['titulo'];
  $tarea_descripcion = $_POST['tarea']['descripcion'];
  $tarea_responsable = $_POST['tarea']['responsable'];
  $tarea_fecha_limite = $_POST['tarea']['fecha_limite'];
  $tarea_beneficiario_id = $_POST['tarea']['id_beneficiario'];
}


?>



<div class="container-fluid">
    <h4>Nueva tarea</h4>
    <br>
    <form action="controlador/tareasql.php" method="post">

        <div class="form-group">

            <input class="form-control col-md-7" required type="text" <?php echo $echotitulo = ($_POST) ? 'value="'. $tarea_titulo . '"' : "" ?> name="tarea[titulo]" id="tarea[titulo]" placeholder="Cosas por hacer" >
            

            <div class="mt-3">
                <textarea class="form-control col-md-7" id="tarea[descripcion]" name="tarea[descripcion]" placeholder="Descripción de la Tarea"> <?php echo $echotitulo = ($_POST) ? $tarea_descripcion . '"' : "" ?></textarea>
            </div>

            <br>
<!-- Aqui comienza el modal -->
           



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Seleccionar Beneficiario</button>
<br>
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Busca y selecciona al beneficiario relacionado con la tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <?php include 'beneficiarios_todos.php' ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Aqui termina el modal -->



              <br>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="medio">  Responsable</label>
                    <select id="tarea[responsable]" name="tarea[responsable]" class="form-control">
                        <?php $query = $mysqli -> query ("SELECT * FROM empleados");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id_empleado'].'">'.$valores['usuario'].'</option>'; }?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="tarea[fecha_limite]">Fecha Limite</label>
                    <input type="date" value="<?php echo date("Y-m-d") ?>" <?php echo $echotitulo = ($_POST) ? 'value="'. $tarea_fecha_limite. '"' : "" ?> class="form-control" id="tarea[fecha_limite]" name="tarea[fecha_limite]">
                </div>
            </div>




        </div>




    <button class="btn btn-primary" type="submit" name="registrar_tarea" id="registrar_tarea"> <i class="fas fa-forward mr-2"></i>Enviar Tarea</button>
    

    </form>



</div>