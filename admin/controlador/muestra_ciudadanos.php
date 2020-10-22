<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}



?>

<a href="../admin/alta_ciudadano.php"><button type="button" class="btn btn-primary btn-lg mt-3">Nuevo Ciudadano</button></a>



