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
      <th scope="col" style="min-width:150px !important ;">colonia </th>
      <th scope="col">fecha_captura </th>
      <th scope="col">capturer </th>
      <th scope="col">num_local </th>
      <th scope="col">num_celular</th>
      <th scope="col">incluido_gpo_wa </th>
      <th scope="col">curp </th>
      <th scope="col">fecha_nacim </th>
      <th scope="col">edad </th>
      <th scope="col">rango_edad </th>
      <th scope="col">genero </th>
      <th scope="col">vulnerable </th>
      <th scope="col">estado_civil </th>
      <th scope="col">num_hijos </th>
      <th scope="col">ocupacion </th>
      <th scope="col">pensionado </th>
      <th scope="col">enfermedades_cron </th>
      <th scope="col">ageb </th>
      <th scope="col">codigo_postal </th>
      <th scope="col">municipio </th>
      <th scope="col">calle </th>
      <th scope="col">manzana </th>
      <th scope="col">lote </th>
      <th scope="col">num_exterior </th>
      <th scope="col">num_interior </th>
      <th scope="col">referencia </th>
      <th scope="col">clave_electoral </th>
      <th scope="col">zona_electoral </th>
      <th scope="col">seccion_electoral </th>
      <th scope="col">participo_eleccion </th>
      <th scope="col">posicion </th>
      <th scope="col">asisitio </th>
      <th scope="col">afiliacion </th>
      <th scope="col">nivel_satisfaccion </th>
      <th scope="col">programa </th>
      <th scope="col">activo </th>
      <th scope="col">fecha_activacion </th>
      <th scope="col">id_padron </th>
      <th scope="col">num_tarjeta</th>
      <th scope="col">forma_pago </th>
      <th scope="col">bim_1 </th>
      <th scope="col">bim_2 </th>
      <th scope="col">bim_3</th>
      <th scope="col">bim_4 </th>
      <th scope="col">bim_5 </th>
      <th scope="col">bim_6 </th>
      <th scope="col">otro_fedral </th>
      <th scope="col">despensa </th>
      <th scope="col">dictamen </th>
      <th scope="col">ine </th>
      <th scope="col">curp3 </th>
      <th scope="col">acta_nac </th>
      <th scope="col">c_domicilio </th>
      <th scope="col">otro </th>
      <th scope="col">marca </th>
      <th scope="col">PACK </th>      

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
        <td scope='row'> <?php echo $dato['incluido_gpo_wa'] ?>  </td>
        <td scope='row'> <?php echo $dato['curp'] ?>  </td>
        <td scope='row'> <?php echo $dato['fecha_nacim'] ?>  </td>
        <td scope='row'> <?php echo $dato['edad'] ?>  </td>
        <td scope='row'> <?php echo $dato['rango_edad'] ?>  </td>
        <td scope='row'> <?php echo $dato['genero'] ?>  </td>
        <td scope='row'> <?php echo $dato['vulnerable'] ?>  </td>
        <td scope='row'> <?php echo $dato['estado_civil'] ?>  </td>
        <td scope='row'> <?php echo $dato['num_hijos'] ?>  </td>
        <td scope='row'> <?php echo $dato['ocupacion'] ?>  </td>
        <td scope='row'> <?php echo $dato['pensionado'] ?>  </td>
        <td scope='row'> <?php echo $dato['enfermedades_cron'] ?>  </td>        
        <td scope='row'> <?php echo $dato['ageb'] ?>  </td>
        <td scope='row'> <?php echo $dato['codigo_postal'] ?>  </td>
        <td scope='row'> <?php echo $dato['municipio'] ?>  </td>
        <td scope='row'> <?php echo $dato['calle'] ?>  </td>
        <td scope='row'> <?php echo $dato['manzana'] ?>  </td>
        <td scope='row'> <?php echo $dato['lote'] ?>  </td>
        <td scope='row'> <?php echo $dato['num_exterior'] ?>  </td>
        <td scope='row'> <?php echo $dato['num_interior'] ?>  </td>
        <td scope='row'> <?php echo $dato['referencia'] ?>  </td>        
        <td scope='row'> <?php echo $dato['clave_electoral'] ?>  </td>
        <td scope='row'> <?php echo $dato['zona_electoral'] ?>  </td>
        <td scope='row'> <?php echo $dato['seccion_electoral'] ?>  </td>
        <td scope='row'> <?php echo $dato['participo_eleccion'] ?>  </td>
        <td scope='row'> <?php echo $dato['posicion'] ?>  </td>
        <td scope='row'> <?php echo $dato['asisitio'] ?>  </td>
        <td scope='row'> <?php echo $dato['afiliacion'] ?>  </td>
        <td scope='row'> <?php echo $dato['nivel_satisfaccion'] ?>  </td>
        <td scope='row'> <?php echo $dato['programa'] ?>  </td>
        <td scope='row'> <?php echo $dato['activo'] ?>  </td>        
        <td scope='row'> <?php echo $dato['fecha_activacion'] ?>  </td>
        <td scope='row'> <?php echo $dato['id_padron'] ?>  </td>
        <td scope='row'> <?php echo $dato['num_tarjeta'] ?>  </td>
        <td scope='row'> <?php echo $dato['forma_pago'] ?>  </td>
        <td scope='row'> <?php echo $dato['bim_1'] ?>  </td>
        <td scope='row'> <?php echo $dato['bim_2'] ?>  </td>
        <td scope='row'> <?php echo $dato['bim_3'] ?>  </td>
        <td scope='row'> <?php echo $dato['bim_4'] ?>  </td>
        <td scope='row'> <?php echo $dato['bim_5'] ?>  </td>
        <td scope='row'> <?php echo $dato['bim_6'] ?>  </td>       
        <td scope='row'> <?php echo $dato['otro_fedral'] ?>  </td>
        <td scope='row'> <?php echo $dato['despensa'] ?>  </td>
        <td scope='row'> <?php echo $dato['dictamen'] ?>  </td>
        <td scope='row'> <?php echo $dato['ine'] ?>  </td>
        <td scope='row'> <?php echo $dato['curp3'] ?>  </td>
        <td scope='row'> <?php echo $dato['acta_nac'] ?>  </td>
        <td scope='row'> <?php echo $dato['c_domicilio'] ?>  </td>
        <td scope='row'> <?php echo $dato['otro'] ?>  </td>
        <td scope='row'> <?php echo $dato['marca'] ?>  </td>
        <td scope='row'> <?php echo $dato['PACK'] ?>  </td>


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