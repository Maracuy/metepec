<?php require_once 'conexioni.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Es este!</title>
</head>
<body>
<h1>Titulo gigante</h1>
    <form action="subir_empleados_mysql.php" method="post">

        <input type="text" placeholder="Usuario" id="usuario" name="usuario">
        <input type="text" placeholder="nombres" id="nombres" name="nombres">
        <input type="text" placeholder="apellido_p" id="apellido_p" name="apellido_p">
        <input type="text" placeholder="apellido_m" id="apellido_m" name="apellido_m">
        <input type="text" placeholder="edad" id="edad" name="edad">
        <input type="text" placeholder="telefono" id="telefono" name="telefono">

        <select name="nivel" id="nivel">
            
        <?php
            $query = $mysqli -> query ("SELECT * FROM privilegios");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[nivel_id].'">'.$valores[nombre].'</option>'; }
        ?></select>
        

        <input type="text" placeholder="Contraseña" id="password" name="password">
        <input type="text" placeholder="Email" id="email" name="email">
        <input type="text" placeholder="descripcion" id="descripcion" name="descripcion">
        <input type="submit" value="Enviar" formmethod="POST">

    </form>
</body>
</html>
