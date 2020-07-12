


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
      <th scope="col">Eliminar</th>
      

    </tr>
  </thead>

  <tbody>
    <?php

      foreach ($resultado as $dato): ?>
    
        <?php
          if(isset($dato['id_colonia'])){
            $colonia = $dato['id_colonia'];
            $sql_query = $con->prepare("SELECT nombre_colonia FROM colonias WHERE id=?");
            $sql_query->execute(array($colonia));
            $la_colonia = $sql_query->fetch(); 

        }
          elseif(isset($dato['otra_colonia'])){
            $la_colonia = $dato['otra_colonia'];} ?>
      
        <tr>

          <th scope='row'> <?php echo $dato['id_beneficiario'] ?>  </th>
          
          <td> <?php echo $dato['nombres'] . " " . $dato['apellido_p'] . " " . $dato['apellido_m'] ?> </td>

          <td> <?php echo $dato['telefono'] ?></td>
          
          <td><?php echo $la_colonia['nombre_colonia'] ?></td>
          
          <td> Status </td>

          <td>
          <form method="POST" action="controlador/ajustes/ajustes_mysql.php">

          <button type="submit" value="Enviar este formulario" formmethod="POST" class="btn btn-primary" id="detalles_beneficiario" name="detalles_beneficiario">Registrar Nuevo Origen</button>
            <i class='fas fa-info-circle ml-3'></i>
          </button>
          
          </td>
        

          <td>No pertenece</td>
          </form>
        </tr>

      <?php
      include 'controlador/modal_beneficiarios.php'; 
      endforeach;
      ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
  </tbody>
</table>