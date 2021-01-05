<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

if(empty($_GET['id'])){
    echo "No exite esta pagina";
    die();
}else{
    $id_ciudadano = $_GET['id'];
    $id = $_GET['id'];
    include 'controlador/menu_proceso.php';
}

$consulta = $con->query("SELECT * FROM altas_defensa WHERE id_ciudadano = $id_ciudadano");
$alta = $consulta->fetch(PDO::FETCH_ASSOC);
$id_puesto = $alta['id_puesto'];

$consultapues = $con->query("SELECT * FROM puestos_defensa_casillas WHERE id_puesto = $id_puesto");
$puesto = $consultapues->fetch(PDO::FETCH_ASSOC);
$id_casilla = $puesto['id_casilla'];

$consultacas = $con->query("SELECT * FROM casillas WHERE id_casilla = $id_puesto");
$casilla = $consultacas->fetch(PDO::FETCH_ASSOC);
$id_seccion = $casilla['id_seccion'];

$consultasecc = $con->query("SELECT * FROM secciones WHERE seccion = $id_seccion");
$seccion = $consultasecc->fetch(PDO::FETCH_ASSOC);
$id_representante_general = $seccion['id_representante_general'];

$consultarg = $con->query("SELECT * FROM representantes_generales WHERE id_representante_general = $id_representante_general");
$representante = $consultarg->fetch(PDO::FETCH_ASSOC);
$id_zona = $representante['id_zona'];

$consultaz = $con->query("SELECT * FROM zonas WHERE id_zona = $id_zona");
$zona = $consultaz->fetch(PDO::FETCH_ASSOC);

echo "<h4>Electoral</h4>";

echo "Zona: " . $zona['zona'];
echo "<br>";
echo "RG: " . $representante['representante_general'];
echo "<br>";
echo "Seccion: " . $seccion['seccion'];
echo "<br>";
echo "Casilla: " . $casilla['casilla'];
echo "<br>";
echo "Puesto: " . $puesto['nombre_puesto'];
echo "<br>";

?>
<br>
<form method="POST" action="controlador/electoralsql.php">

<input id = "id" name = "id" type = "hidden" value = "<?php echo $id?>">


<div class="form-row"><br>

    <div class="form-group col-md-2">
        <label for="participo_eleccion">Participo Eleccion Previa</label>
        <select class="form-control" id="participo_eleccion" name="participo_eleccion">
        <?php if(isset($ciudadano['participo_eleccion'])) :?>
            <option <?php if ($ciudadano['participo_eleccion'] == 0 ) echo 'selected' ;?> value=0>No</option>
            <option <?php if ($ciudadano['participo_eleccion'] == 1 ) echo 'selected' ;?> value=1>Si</option>
        <?php endif ?>
        <?php if(!isset($ciudadano['participo_eleccion']) || $ciudadano['participo_eleccion'] != "" ) :?>
            <option value=0>No</option>
            <option value=1>Si</option>
        <?php endif ?>
        </select>
    </div> 

    <div class="form-group col-md-2">
        <label for="posicion">Posicion (Opciones)</label>
        <?php if(isset($ciudadano['posicion'])):?>
            <input type="text" value="<?php echo $ciudadano['posicion']?>" class="form-control" id="posicion" name="posicion">
        <?php endif ?>
        <?php if(!isset($ciudadano['posicion'])):?>
            <input type="text" class="form-control" id="posicion" name="posicion">
        <?php endif ?>
    </div>
    
    
    <div class="form-group col-md-1 ">
        <label for="asistio">Asistio</label>
        <select class="form-control" id="asistio" name="asistio">
        <?php if(isset($ciudadano['asistio'])) :?>
            <option <?php if ($ciudadano['asistio'] == 0 ) echo 'selected' ;?> value=0>No</option>
            <option <?php if ($ciudadano['asistio'] == 1 ) echo 'selected' ;?> value=1>Si</option>
            <?php endif ?>
            <?php if(!isset($ciudadano['asistio']) || $ciudadano['asistio'] != "" ) :?>
                <option value=0>No</option>
                <option value=1>Si</option>
                <?php endif ?>
            </select>
        </div> 


    <div class="form-group col-md-1">
        <label for="compromiso">Compromiso</label>
        <select class="form-control" id="compromiso" name="compromiso">
        <?php if(isset($ciudadano['compromiso'])) :?>
            <option <?php if ($ciudadano['compromiso'] == '' ) echo 'selected' ;?> value=''>Vacio</option>
            <option <?php if ($ciudadano['compromiso'] == 1 ) echo 'selected' ;?> value=1>1</option>
            <option <?php if ($ciudadano['compromiso'] == 2 ) echo 'selected' ;?> value=2>2</option>
            <option <?php if ($ciudadano['compromiso'] == 3 ) echo 'selected' ;?> value=3>3</option>
            <option <?php if ($ciudadano['compromiso'] == 4 ) echo 'selected' ;?> value=4>4</option>
            <option <?php if ($ciudadano['compromiso'] == 5 ) echo 'selected' ;?> value=5>5</option>
        <?php endif ?>
        <?php if(!isset($ciudadano['compromiso']) || $ciudadano['compromiso'] != "" ) :?>
            <option value=''>Vacio</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
        <?php endif ?>
        </select>
    </div> 

    <div class="form-group col-md-2">
        <label for="afiliacion">Afiliacion (Opcional)</label>
        <?php if(isset($ciudadano['afiliacion'])):?>
            <input type="text" value="<?php echo $ciudadano['afiliacion']?>" class="form-control" id="afiliacion" name="afiliacion">
            <?php endif ?>
            <?php if(!isset($ciudadano['afiliacion'])):?>
                <input type="text" class="form-control" id="afiliacion" name="afiliacion">
                <?php endif ?>
    </div>   


    <div class="form-group col-md-1">
        <label for="cubre">Cubre?</label>
        <select class="form-control" id="cubre" name="cubre">
        <?php if(isset($ciudadano['cubre'])) :?>
            <option <?php if ($ciudadano['cubre'] == 0 ) echo 'selected' ;?> value=0>No</option>
            <option <?php if ($ciudadano['cubre'] == 1 ) echo 'selected' ;?> value=1>Si</option>
            <?php endif ?>
            <?php if(!isset($ciudadano['cubre']) || $ciudadano['cubre'] != "" ) :?>
                <option value=0>No</option>
                <option value=1>Si</option>
                <?php endif ?>
            </select>
        </div> 


   </div>
    <div class="form-group col-md-2">
        <label for="origen">Origen (Opciones?)</label>
        <?php if(isset($ciudadano['origen'])):?>
            <input type="text" value="<?php echo $ciudadano['origen']?>" class="form-control" id="origen" name="origen">
        <?php endif ?>
        <?php if(!isset($ciudadano['origen'])):?>
            <input type="text" class="form-control" id="origen" name="origen">
        <?php endif ?>
    </div>


    <div class="dropdown-divider"></div>

<br>
    
<?php if(isset($id)):?>
    <button class="btn btn-primary" type="submit" name="actualizar" id="actualizar"> <i class="fas fa-user-edit"></i> Editar</button>
<?php endif ?>

<?php if(!isset($id)):?>
    <button class="btn btn-primary" type="submit" name="continuar" id="continuar"> <i class="fas fa-user-edit"></i> Guardar y Continuar</button>
<?php endif ?>
    <a href="ciudadanos.php" class="btn btn-danger"> <i class="far fa-times-circle"></i>  Salir sin guardar </a>

  
</form>


<?php $con=null?>
<?php mysqli_close($mysqli)?>