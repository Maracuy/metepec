<?php
$sql_programas = $con->prepare("SELECT * FROM programas WHERE id_programas != 1");
$sql_programas->execute();
$resultado_programas = $sql_programas->fetchALL();
?>

<div class="dropdown-divider"></div>

<div class="container-fluid bg-light">

    <h4>Programas existentes:</h4>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Abreviatura</th>
        <th scope="col">Nivel</th>
        <th scope="col">Descripción</th>
        <th scope="col">Eliminar</th>

        </tr>
    </thead>
    <form method="POST" action="controlador/ajustes/ajustes_mysql.php">
        <tbody>
            <?php
                foreach($resultado_programas as $dato_programa): ?>
                <tr>
                <th scope='row'><?php echo $dato_programa['id_programas'] ?> </th>
                
                <td>  <?php echo $dato_programa['nombre']?></td>
                <td>  <?php echo $dato_programa['abreviatura']?> </td>
                <td>  <?php echo $dato_programa['nivel']?> </td>
                <td> <?php echo $dato_programa['descripcion']?> </td>
                
                <td><a href="controlador/ajustes/ajustes_mysql.php?id_programa=<?php echo $dato_programa['id_programas'] ?>"> <i class="far fa-trash-alt ml-3"></i></a></td>
                </tr>
            
            <?php endforeach;?>
        </form>
    </tbody>
    </table>


    <div class="dropdown-divider"></div>


    <h4>Registrar Nuevo Programa</h4>



    <form method="post" action="controlador/ajustes/ajustes_mysql.php">
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="nombre_programa">Nombre de Programa</label>
                <input type="text" class="form-control" id="nombre_programa" name="nombre_programa">
            </div>
            <div class="form-group col-md-2">
                <label for="abreviatura_programa">Abreviatura</label>
                <input type="text" class="form-control" id="abreviatura_programa" name="abreviatura_programa">
            </div>
            <div class="form-group col-md-2">
                <label for="nivel_programa">Nivel</label>
                <select class="form-control" id="nivel_programa" name="nivel_programa">
                    <option value="municipal">Municipal</option>
                    <option value="estatal">Estatal</option>
                    <option value="federal">Federal</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="descripcion_programa">Descripción</label>
                <input type="textarea" class="form-control" id="descripcion_programa" name="descripcion_programa">
            </div>
        </div>

            <button type="submit" value="Enviar este formulario" formmethod="POST" class="btn btn-primary" id="guardar_programa" name="guardar_programa">Registrar Nuevo Origen</button>
        
    </form>

</div>

<div class="dropdown-divider"></div>



                