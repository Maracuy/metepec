<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
$consulta = "SELECT b.id_beneficiario, b.nombres, b.apellido_p , b.apellido_m, b.id_colonia, b.otra_colonia, b.telefono, p.abreviatura, p.nombre, c.nombre_colonia FROM beneficiarios b, altas a, programas p, colonias c WHERE a.id_beneficiario=b.id_beneficiario AND a.id_programa=p.id_programas GROUP BY b.id_beneficiario";
$sql_query = $con->prepare($consulta);
$sql_query->execute();
$resultado = $sql_query->fetchALL();
?>

<div class="espaciadormio" style="height: 50px;"></div>


<h3>Beneficiarios:</h3>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Colonia</th>
      <th scope="col">Telefono</th>
      <th scope="col">Estatus</th>
      <th scope="col">Detalles</th>
      <th scope="col">Programa</th>
      <th scope="col">Proceso</th>
      

    </tr>
  </thead>

  <tbody>
    <?php

      foreach ($resultado as $dato): ?>
    
        <?php
          if(($dato['id_colonia'] == "1")){
            $colonia = $dato['otra_colonia'];
        }
          else{
            $colonia = $dato['nombre_colonia'];} ?>
      
        <tr>

          <th scope='row'> <?php echo $dato['id_beneficiario'] ?>  </th>
          
          <td> <?php echo $dato['nombres'] . " " . $dato['apellido_p'] . " " . $dato['apellido_m'] ?> </td>

          <td><?php echo $colonia?></td>
          
          <td> <?php echo $dato['telefono'] ?></td>
          
          <td> Status </td>

          <td>
            <a href="alta_beneficiarios.php?id=<?php echo $dato['id_beneficiario']?>">
              <i class='fas fa-info-circle ml-3'></i>
            </a>
          
          </td>
        

          <td>
            <?php if($dato['abreviatura'] == "" ): ?>
                <a href="programas.php?id=<?php echo $dato['id_beneficiario'] ?>" class="btn btn-danger"> Inscribir </a>
            <?php endif; if($dato['abreviatura'] != "" ){
                echo '<a href="programas.php?id=' . $dato['id_beneficiario'] .'" class="btn btn-success">' . $dato['abreviatura'] . "</a>";
              }?>
          </td>


          <td><button type="button" class="btn btn-<?php echo "secondary"?> btn-sm">Cerrado</button>
</td>

          </form>
        </tr>

      <?php
      endforeach;
      ?>      
  </tbody>
</table>


<!-- UPPER(LEFT( -->