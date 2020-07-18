<div class="container-fluid">


    <h4>Nueva tarea</h4>
    <br>
    <form action="tareasql.php" method="post">

        <div class="form-group">

            <input class="form-control col-md-8" type="text" name="titulo" id="titulo" placeholder="Cosas por hacer" >

            <div class="mt-3">
                <textarea class="form-control col-md-8" id="validationTextarea" placeholder="Descripción de la Tarea" required></textarea>
            </div>

            <br>

            <div class="form-row">

                <div class="col-md-3">
                    <label for="medio">Responsable</label>
                    <select id="medio" name="medio" class="form-control">
                        <option value=""> Yo </option>
                        <?php
                        $query = $mysqli -> query ("SELECT * FROM empleados");
                        while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores['id'].'">'.$valores['nombres'].'</option>'; }?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="fech_nacimiento">Fecha Limite</label>
                    <input type="date" value="2020-01-01" class="form-control" id="fech_nacimiento" name="fech_nacimiento">
                </div>
            </div>



                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="fech_nacimiento">Beneficiario ID</label>
                        <input type="number" value="2020-01-01" class="form-control" id="fech_nacimiento" name="fech_nacimiento">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="fech_nacimiento">Buscar</label>
                        <br>
                        <button class="btn btn-primary" type="submit" name="guardar_salir" id="guardar_salir"><i class="fas fa-search"></i> Buscar Beneficiario</button>
                    </div>
                </div>

        </div>




    <button class="btn btn-primary" type="submit" name="continuar" id="continuar" value="Siguiente"> <i class="fas fa-forward mr-2"></i>Enviar Tarea</button>
    

    </form>



</div>