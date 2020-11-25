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
}

$stm = $con->query("SELECT simpatia FROM ciudadanos WHERE id_ciudadano = $id");
$simpatia_actual = $stm->fetch(PDO::FETCH_ASSOC);



include 'controlador/menu_proceso.php';
?>

<h4>Electoral</h4>

<div class="form-row">

<br>

    <div class="form-group col-md-2">
        <label for="participo_eleccion">Participo Eleccion</label>
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
        <label for="posicion">Posicion</label>
        <?php if(isset($ciudadano['posicion'])):?>
            <input type="text" value="<?php echo $ciudadano['posicion']?>" class="form-control" id="posicion" name="posicion">
        <?php endif ?>
        <?php if(!isset($ciudadano['posicion'])):?>
            <input type="text" class="form-control" id="posicion" name="posicion">
        <?php endif ?>
    </div>

    <div class="form-group col-md-2">
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

    <div class="form-group col-md-2">
        <label for="afiliacion">Afiliacion</label>
        <?php if(isset($ciudadano['afiliacion'])):?>
            <input type="text" value="<?php echo $ciudadano['afiliacion']?>" class="form-control" id="afiliacion" name="afiliacion">
        <?php endif ?>
        <?php if(!isset($ciudadano['afiliacion'])):?>
            <input type="text" class="form-control" id="afiliacion" name="afiliacion">
        <?php endif ?>
    </div>   

    <div class="form-group col-md-2">
        <label for="observaciones">Observaciones</label>
        <?php if(isset($ciudadano['observaciones'])):?>
            <textarea type="text" value="<?php echo $ciudadano['observaciones']?>" class="form-control" id="observaciones" name="observaciones"></textarea>
        <?php endif ?>
        <?php if(!isset($ciudadano['observaciones'])):?>
            <textarea type="text" class="form-control" id="observaciones" name="observaciones"></textarea>
        <?php endif ?>
    </div>   


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