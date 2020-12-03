<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

if(empty($_POST)){
    echo "No exite esta pagina";
    die();
}


?>