<?php
$id = $_GET['id'];

$stm = $con->query("SELECT * FROM ciudadanos WHERE id_ciudadano = $id");
$ciudadano = $stm->fetch(PDO::FETCH_ASSOC);

include 'menu_proceso.php';
include 'controlador/ClassPermisos.php';

$permiso = new Permisos();

echo 'Administrador: ' . $_SESSION['user']['nombres'] . "  -  Nivel: " . $_SESSION['user']['nivel'] . "<br>";
echo 'Ciudadano actual: ' . $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . "  -  Nivel actual: " . $ciudadano['nivel'] . "<br>";

if($_SESSION['user']['nivel'] >= 2 ){
    echo "Tu no debes ver esto";
    die();
}


?>

<br>

<form action="controlador/permisossql.php" method="post">

    <input type="hidden" name="id" value="<?=$ciudadano['id_ciudadano']?>">

    <div class="form-row">

        <div class="form-group col-md-2">
            <?php if($_SESSION['user']['nombres'] <= 2){
                if ($ciudadano['usuario_sistema']) {
                    echo 'Tiene usuario: ' . '<br> <b>' . $ciudadano['usuario_sistema'] . '</b>';
                }else{
                    echo '<label for="usuario_sistema">Usuario</label>'. 
                    '<input type="text" class="form-control" id="usuario_sistema" name="usuario_sistema">';
                }
            } ?>

        </div>

        <div class="form-group col-md-2">
        <?php  if($_SESSION['user']['nombres'] <= 2){
            if ($ciudadano['contrasenia']) {
                echo '<label for="contrasenia">Asignar una nueva contraseña</label>'.
                 '<input type="password" class="form-control" id="contrasenia" name="contrasenia">';
            }else{
                echo '<label for="contrasenia">Contraseña</label>'. 
                '<input type="password" class="form-control" id="contrasenia" name="contrasenia">';
            }
        }
    
 ?>
        </div>

        <?php if ($_SESSION['user']['nivel'] < $ciudadano['nivel']):?>
            <div class="form-group col-md-2">
                <label for="nivel">Nivel</label>
                <?php if($ciudadano['nivel']):?>
                    <select class="form-control" id="nivel" name="nivel">
                        <option <?php if ($ciudadano['nivel'] == 10 ) echo 'selected' ;?> value="">Ninguno</option>
                        <option <?php if ($ciudadano['nivel'] == 9 ) echo 'selected' ;?> value=9>Capturista</option>
                        <option <?php if ($ciudadano['nivel'] == 8 ) echo 'selected' ;?> value=8>Promotor</option>
                    </select>
                <?php endif ?>
                <?php if(!$ciudadano['nivel']) :?>
                    <select class="form-control" name="nivel" id="nivel">
                        <option value=10>Ninguno</option>
                        <option value=9>Capturista</option>
                        <option value=8>Promotor</option>
                    </select>
                <?php endif ?>
            </div>
        <div class="form-group col-md-2">

        <?php endif;
        if ($ciudadano['contrasenia']) {
            echo '<button class="btn btn-primary mt-4" type="submit" name="actualizar" id="actualizar"> <i class="fas fa-user-edit"></i> Actualizar</button>';
        }else{
            echo '<button class="btn btn-primary mt-4" type="submit" name="crear" id="crear"> <i class="fas fa-user-edit"></i> Crear</button>';
        }?> 
        </div>
    </div> 
</form>


        
    

       