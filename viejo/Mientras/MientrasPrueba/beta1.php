<?php require_once 'conexioni.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $query = "SELECT * FROM privilegios";
        $result = $mysqli->query($query);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        	echo $row['nivel_id'] . " " . $row['nombre']. "<br>";
    }


    ?>

</body>
</html>