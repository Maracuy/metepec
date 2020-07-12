<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/menu_izq.css">
    <script src="https://kit.fontawesome.com/d0baa1aa63.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <div class="super">

        <div class="izquierda">
            <?php include 'menus/menuintranet.php'; ?>
        </div> <!--Cierre de Div Izquierda-->

        <div class="contemedorMenuSup">
            <?php include 'menus/menu_superior_intranet.php' ?>
        </div><!--Fin del contenedordel menu superior-->

        <div class="derecha">
            <h1>Hola!</h1>
            

        </div><!---Fin del Div Derecha-->


    </div> <!-- Este es el cierre de SUPER -->
</body>
</html>