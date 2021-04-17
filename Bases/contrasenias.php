<?php
require_once '../conection/conexion.php';
$id = $_GET['id'];

$stm = $con->query("SELECT * FROM ciudadanos WHERE id_ciudadano = $id");
$ciudadano = $stm->fetch(PDO::FETCH_ASSOC);


?>

<br>

<form action="../admin/controlador/permisossql.php" method="post">

    <input type="hidden" name="id" value="<?=$ciudadano['id_ciudadano']?>">

    <div class="form-row">

        <div class="form-group col-md-2">
        <?php  
            if ($ciudadano['contrasenia']) {
                echo '<label for="contrasenia">Asignar una nueva contraseña</label>'.
                 '<input type="password" class="form-control" id="contrasenia" name="contrasenia">';
            }else{
                echo '<label for="contrasenia">Contraseña</label>'. 
                '<input type="password" class="form-control" id="contrasenia" name="contrasenia">';
            }
    
 ?>
        </div>

            

        <?php
        if ($ciudadano['contrasenia']) {
            echo '<button class="btn btn-primary mt-4" type="submit" name="actualizar" id="actualizar"> <i class="fas fa-user-edit"></i> Actualizar</button>';
        }else{
            echo '<button class="btn btn-primary mt-4" type="submit" name="crear" id="crear"> <i class="fas fa-user-edit"></i> Crear</button>';
        }?> 
        </div>
    </div> 
</form>

