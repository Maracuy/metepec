<?php

/**
 * Primero verificamos que el usuario este registrado
 */
if (empty($_SESSION['user']) ){
    echo "no estas registrado";
    die();
}
/**
 * Luego verificamos que se mande el id del ciudadano, si si existe lo asignamos a la variable.
 * Tambien verificamos que se reciba el id del programa, no se puede trabajar sin esos 2 datos.
 */
if(!isset($_GET['id_ciudadano']) OR !isset($_GET['id_programa'])){
    echo "Esta pagina no existe";
    die();
}

$id_ciudadano = $_GET['id_ciudadano'];
$id_programa = $_GET['id_programa'];
$tipo = $_GET['tipo'];


/**
 * Si no existe la alta significa que no tiene ningun registro de actividad, en ese caso asignamos la alta como vacia
 * Pero si la alta existe, quiere decir que al menos tiene un registro, asi que en cuanto la asignamos luego luego vamos a buscar en la base de datos
 */
if(!isset($_GET['id_alta'])){
    $id_alta = NULL;
}else{
    $id_alta = $_GET['id_alta'];
    $sql_procesos = $con->prepare('SELECT * FROM procesos WHERE id_alta = ?');
    $sql_procesos ->execute(array($id_alta));
    $procesos = $sql_procesos->fetchAll();

    $sql_procesos = $con->prepare('SELECT * FROM ciudadanos WHERE id_ciudadano = ?');
    $sql_procesos ->execute(array($id));
    $procesos = $sql_procesos->fetchAll();
}
?>

<a href="programas.php?id=<?php echo $id_ciudadano ?>" class="btn btn-primary mr-3 ml-5 mt-3 "> <i class="fas fa-arrow-left"></i>Regresar</a>

<div class="espaciadormio" style="height: 30px;"></div>

<form method="POST" action="controlador/proceso_sql.php">


    <input type="hidden" name="id_ciudadano" value="<?php echo $id_ciudadano ?>">
    <input type="hidden" name="id_programa" value="<?php echo $id_programa ?>">
    <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
    <?php if(isset($id_alta)):?>
    <input type="hidden" name="id_alta" value="<?php echo $id_alta ?>">
    <?php endif ?>

<?php if(isset($procesos)):
    foreach($procesos as $proceso):?>
        <div class="card bg-light w-75">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_SESSION['user']['nombres'] . " ---  " . $proceso['fecha']?></h5>
            <p class="card-text"><?php echo $proceso['descripcion']?></p>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="proc_sql.php?id=<?php echo $id ?>" type="button" class="btn btn-secondary">Inicio</a>
                <a href="proc_sql.php?id=<?php echo $id ?>" type="button" class="btn btn-secondary">En Proceso</a>
                <a href="proc_sql.php?id=<?php echo $id ?>" type="button" class="btn btn-secondary">Confirmacion</a>
                <a href="proc_sql.php?id=<?php echo $id ?>" type="button" class="btn btn-secondary">Terminado</a>
            </div>
        </div>
        </div>
<?php endforeach;
endif;?>


<br>

<div class="form-row">
    <div class="col-md-7">
        <label for="descripcion">descripcion:</label>
        <textarea class="form-control col-md-7" id="descripcion" name="descripcion" placeholder="Descripcion del proceso"></textarea>
    </div>
</div>

<br>


<button class="btn btn-primary mr-3 ml-5 mt-3 " type="submit" name="nuevo" id="nuevo"> <i class="fas fa-save"></i> Guardar registro</button>

</form>


