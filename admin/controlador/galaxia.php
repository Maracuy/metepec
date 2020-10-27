<?php
if(!($_GET)){
    die();
}
$id = $_GET['id'];


$sql_ciudadanos= "SELECT id_ciudadano, nombres, apellido_p, apellido_m FROM ciudadanos WHERE id_ciudadano = ?";
$consulta_ciudadanos = $con->prepare($sql_ciudadanos);
try {
    $consulta_ciudadanos->execute(array($id));
    $ciudadano = $consulta_ciudadanos->fetch();

    if(!$ciudadano){
        echo 'el ciudadano no existe';
        die();
    }
} catch (\Throwable $th) {
    echo 'error al consultar la base de datos de ciudadanos: ' . $th;
}



$sql_galaxia= "SELECT * FROM galaxias WHERE id_ciudadano = ?";
$consulta_galaxia = $con->prepare($sql_galaxia);
try {
    $consulta_galaxia->execute(array($id));
    $galaxia = $consulta_galaxia->fetch();
    if(!$galaxia){
        $sql_galaxia_nueva= "INSERT INTO galaxias(id_ciudadano) VALUES (?)";
        $consulta_galaxia_nueva = $con->prepare($sql_galaxia_nueva);
        try {
            $consulta_galaxia_nueva->execute(array($id));
            $sentencia_last_galaxia = $con->prepare('SELECT LAST_INSERT_ID()');
            $sentencia_last_galaxia->execute();
            $last_galaxia = $sentencia_last_galaxia->fetch();
            $id_galaxia = intval($last_galaxia[0]);
        } catch (\Throwable $th) {
            echo 'Error al crear la nueva galaxia: ' . $th;
        }

    }
} catch (\Throwable $th) {
    echo 'error al consultar la base de datos de ciudadanos: ' . $th;
}
?>

<h4>Vista de Galaxia de <?php echo $ciudadano['nombres'] . ' ' .  $ciudadano['apellido_p'] . ' ' . $ciudadano['apellido_m'] ?></h4>

<button type="button" class="btn btn-light"><?php echo $ciudadano['nombres'] . ' ' .  $ciudadano['apellido_p'] . ' ' . $ciudadano['apellido_m'] ?></button>




<!-- Button trigger modal -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModalEsposa">
  Agregar esposa
</button>

<!-- Modal -->
<div class="modal fade" id="ModalEsposa" tabindex="-1" role="dialog" aria-labelledby="ModalEsposaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Hola hola!
            <?php include 'beneficiarios_todos.php'?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>


<br>

<button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModaldeHijo">
  Agregar Hijo
</button>

<!-- Modal -->
<div class="modal fade" id="ModaldeHijo" tabindex="-1" role="dialog" aria-labelledby="ModaldeHijoTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Este es el modal del hijo
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>