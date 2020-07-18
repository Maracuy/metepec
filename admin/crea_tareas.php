<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../conection/conexion.php';
require_once '../conection/conexioni.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea</title>
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/d0baa1aa63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <?php include 'estructura_inicio.php' ?>   <!--No menear -->



    <?php include 'controlador/forms_tareas.php' ?>   <!--No menear -->




    <?php include 'estructura_fin.php'?>  <!--No menear -->
</body>
</html>