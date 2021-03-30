<?php

$id = $_GET['id'];

$stm = $con->query("SELECT * FROM ciudadanos WHERE id_ciudadano = $id");
$ciudadano = $stm->fetch(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM ciudadanos WHERE id_ciudadano = $id");
$ciudadano = $stm->fetch(PDO::FETCH_ASSOC);


include 'menu_proceso.php';

echo "Mi nombre: " . $_SESSION['user']['nombres'] . "  -  Nivel: " . $_SESSION['user']['nivel'] . "<br>";

if($_SESSION['user']['nivel'] == 0){
    echo "Eres Dios, puedes asignarle el nivel que quieras";
}

if($_SESSION['user']['nivel'] >= 1 ){
    echo "Luego vemos";
}
?>
<form action="" method="post">

<div class="form-row"><br>
    <div class="form-group col-md-2">
        <label for="nivel">Nivel</label>
        <select class="form-control" id="nivel" name="nivel">
        <?php if(isset($alta['nivel'])) :?>
            <option <?php if ($alta['nivel'] == 10 ) echo 'selected' ;?> value="">Ninguno</option>
            <option <?php if ($alta['nivel'] == 9 ) echo 'selected' ;?> value=0>Capturista</option>
            <option <?php if ($alta['nivel'] == 8 ) echo 'selected' ;?> value=1>Promotor</option>
        <?php endif ?>
        <?php if(!isset($alta['nivel']) || $alta['nivel'] != "" ) :?>
            <option value=10>Ninguno</option>
            <option value=9>Capturista</option>
            <option value=8>Promotor</option>
        <?php endif ?>
        </select>
    </div> 
</div> 
<button class="btn btn-primary" type="submit" name="actualizar" id="actualizar"> <i class="fas fa-user-edit"></i> Actualizar</button>
</form>