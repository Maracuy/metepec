<?php
require_once '../conection/conexion.php';
require_once '../conection/conexioni.php';

$sql_query = $con->prepare("SELECT * FROM benefis");
$sql_query->execute();
$resultado = $sql_query->fetchALL();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/d0baa1aa63.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
* {
  box-sizing: border-box;
  font-size: .78rem;
}

#myInput {
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  margin-top: -1px; /* Prevent double borders */
  padding: 12px;
  text-decoration: none !important;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
}
</style>
</head>
<body>


<input id="myInput" type="text" />



<table id="myTable" class="table table-striped">
 <thead>
    <tr>
      <th scope="col" style="min-width:200px !important ;">Nombre </th>
      <th scope="col" style="min-width:150px !important ;">Colonia </th>
      <th scope="col">Fecha de Captura </th>
      <th scope="col">Capturista </th>
      <th scope="col">Numero Local </th>
      <th scope="col">Celular</th>
      <th scope="col">Curp </th>
      <th scope="col">Fecha Nacimiento </th>
      <th scope="col">Edad </th>
      <th scope="col">Genero </th>
      <th scope="col">Vulnerable </th>
      <th scope="col">Clave Electoral </th>
      <th scope="col">Programa </th>
    </tr>
  <thead>


  <tbody>
  <?php foreach ($resultado as $dato): ?>
    <tr>
        <td scope='row'> <?php echo $dato['apellido_p']  . " " . $dato['apellido_m'] . " ". $dato['nombres'] ?>  </td>
        <td scope='row'> <?php echo $dato['colonia'] ?>  </td>
        <td scope='row'> <?php echo $dato['fecha_captura'] ?>  </td>
        <td scope='row'> <?php echo $dato['capturer'] ?>  </td>
        <td scope='row'> <?php echo $dato['num_local'] ?>  </td>
        <td scope='row'> <?php echo $dato['num_celular'] ?>  </td>
        <td scope='row'> <?php echo $dato['curp'] ?>  </td>
        <td scope='row'> <?php echo $dato['fecha_nacim'] ?>  </td>
        <td scope='row'> <?php echo (DATE("Y") - $dato['fecha_nacim'])?>  </td>
        <td scope='row'> <?php echo $dato['genero'] ?>  </td>
        <td scope='row'> <?php echo $dato['vulnerable'] ?>  </td>        
        <td scope='row'> <?php echo $dato['clave_electoral'] ?>  </td>
        <td scope='row'> <?php echo $dato['programa'] ?>  </td>
      <?php endforeach ?>
    </tr>
  </tbody>
</table>







<script>

function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);


</script>

</body>
</html>