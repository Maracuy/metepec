
<div class="espaciadormio" style="height: 50px;"></div>


<h3>Beneficiarios:</h3>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Colonia</th>
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
          if(($dato['id_colonia'] != "1")){
            $la_colonia = $dato['id_colonia'];
            $sql_query_colonias = $con->prepare("SELECT id, nombre_colonia FROM colonias WHERE id=?");
            $sql_query_colonias->execute(array($la_colonia));
            $nombre_colonia = $sql_query_colonias->fetch();
            $colonia=$nombre_colonia["nombre_colonia"];

        }
          elseif(isset($dato['otra_colonia'])){
            $colonia = $dato['otra_colonia'];} ?>
      
        <tr>

          <th scope='row'> <?php echo $dato['id_beneficiario'] ?>  </th>
          
          <td> <?php echo $dato['nombres'] . " " . $dato['apellido_p'] . " " . $dato['apellido_m'] ?> </td>

          <td> <?php echo $dato['telefono'] ?></td>
          
          <td><?php echo $colonia?></td>
          
          <td> Status </td>

          <td>
            <a href="alta_beneficiarios.php?id=<?php echo $dato['id_beneficiario']?>">
              <i class='fas fa-info-circle ml-3'></i>
            </a>
          
          </td>
        

          <td>No pertenece</td>


          <td><button type="button" class="btn btn-<?php echo "secondary"?> btn-sm">Cerrado</button>
</td>

          </form>
        </tr>

      <?php
      endforeach;
      ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
  </tbody>
</table>