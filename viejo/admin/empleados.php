<?php
session_start();
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
require_once '../conection/conexion.php';
require_once '../conection/conexioni.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>

    <!--CSS!!-->
    <link rel="stylesheet" href="../css/menu_izq.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>



    <div class="super">

        <div class="izquierda">
            <?php include 'menus/menuintranet.php'; ?>
        </div> <!--Cierre de Div Izquierda-->

        <div class="contemedorMenuSup">
            <?php include 'menus/menu_superior_intranet.php' ?>
        </div><!--Fin del contenedordel menu superior-->

        
        
        
        <div class="derecha"> <!--Principal-->

            <!--Aqui muestra los usuarios existentes-->
            <h2>Usuarios existentes ñ:</h2> <br>
            <div class="usuariosExistentes">


                <?php
                    $query = "SELECT * FROM empleados";
                    $result = $mysqli->query($query);
                    
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo '<div class="alert alert-dark" role="alert">';
                        echo $row['nombres'] . " " . $row['apellido_p'] . " " . $row['apellido_m'] . " " . $row['edad'] . " " . $row['telefono'] . " " . $row['nivel'] . " " . $row['password'] . " " . $row['email'] . " " . $row['descripcion'] . "<br>";
                        echo "</div>";
                    }
                ?>


            </div> <!--Fin de UsuariosExistentes-->







            <!--Aqui comienza lo de nuevos usuarios-->
            <form action="subir_empleados_mysql.php" method="post">

                <input type="text" placeholder="nombres" id="nombres" name="nombres">
                <input type="text" placeholder="apellido_p" id="apellido_p" name="apellido_p">
                <input type="text" placeholder="apellido_m" id="apellido_m" name="apellido_m">
                <input type="text" placeholder="edad" id="edad" name="edad">
                <input type="text" placeholder="telefono" id="telefono" name="telefono">

                <select name="nivel" id="nivel">
                    <option value="">Seleccione el nivel</option>

                    <?php
                        $query = $mysqli -> query ("SELECT * FROM privilegios");
                        while ($valores = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            echo '<option value="'.$valores['nivel_id'].'">'.$valores['nombre'].'</option>'; }
                    ?>
                </select>

                <input type="text" placeholder="descripcion" id="descripcion" name="descripcion">
                <input type="submit" value="Enviar" formmethod="POST">
            </form>

        </div><!---Fin del Div Derecha-->


    </div> <!-- Este es el cierre de SUPER -->

</body>
</html>
