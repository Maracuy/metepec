<?php

require_once 'conection/conexion.php';
//$mensaje = "Andres AO!";

// Esto sirve para hacer deletes, no regresa nada.
//$nrows = $con->exec("DELETE FROM programas_federales WHERE id_programa_federal = 9");


//Para requerir informacion sin variables
/* $stm = $con->query("SELECT * FROM altas WHERE id_alta =");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);

// Para el last ID
$rowid = $con->lastInsertId(); */


/* $id_ciudadano =1;


$stm = $con->query("SELECT a.*, p* FROM altas a, programas_federales p WHERE a.id_ciudadano = $id_ciudadano AND p.id_programa_federal = a.id_programa_f");
$federales = $stm->fetchAll(PDO::FETCH_ASSOC);
var_dump($federales); */


?>



<!-- <p>Click the button to display a confirm box.</p>

<button onclick="myFunction('1')">Try it</button>

nuevo
<input id="EditBanner" type="button" onclick="numero(5);"/>


<p id="demo"></p> -->

<script>
/* function numero(numero){
    alert (numero);
}


function myFunction(p1) {
    if(confirm("my text here")) document.location = 'http://stackoverflow.com?id=' + p1;
}
  

let i = "global";
function foo() {
    i = "local"; // Otra variable local solo para esta función
    console.log(i); // local
}
foo();
console.log(i); // global
 */
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

</body>
</html>