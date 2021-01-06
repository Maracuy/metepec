<?php 
$sql_query = $con->prepare("SELECT * FROM ciudadanos WHERE id_ciudadano NOT IN (SELECT id_ciudadano FROM altas_defensa)");
$sql_query->execute();
$ciudadanos = $sql_query->fetchALL();
?>

<table class="table table-striped" id="myTable">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre">

  <thead>
    <tr>

        <?php
        if($_POST){
            echo "<th scope='col'>Seleccionar</th>";
        }
        ?>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>
        <th scope="col">Zona</th>
        <th scope="col">Select</th>

    </tr>
  </thead>

  <tbody>
    <?php

      foreach ($ciudadanos as $dato): ?>
    
        <?php
          if(($dato['id_colonia'] != "1")){
            $la_colonia = $dato['id_colonia'];
            $sql_query_colonias = $con->prepare("SELECT id, nombre_colonia FROM colonias WHERE id=?");
            $sql_query_colonias->execute(array($la_colonia));
            $nombre_colonia = $sql_query_colonias->fetch();
            $colonia=$nombre_colonia["nombre_colonia"];
        }elseif(isset($dato['otra_colonia'])){
            $colonia = $dato['otra_colonia'];} ?>		
        <tr>            
            <td> <?php echo $dato['nombres'] . " " . $dato['apellido_p'] . " " . $dato['apellido_m'] ?> </td>
                        
            <td scope='row'> <?php echo $dato['telefono'] ?>  </td>
            <td scope='row'> <?php echo $dato['zona'] ?>  </td>
            <td scope='row'> <button class="btn btn-primary btn-sm" onclick="AgregarCiudadano(<?php echo $dato['id_ciudadano']?>)"> <i class="fas fa-plus"></i> </button></td>

        </tr>

      <?php
      endforeach;
      ?>      
  </tbody>

  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</table>