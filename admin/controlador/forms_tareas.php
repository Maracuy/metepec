<div class="container-fluid">


    <h4>Nueva tarea</h4>
    <br>
    <form action="tareasql.php" method="post">

        <div class="form-group">

            <input class="form-control col-md-8" type="text" name="titulo" id="titulo" placeholder="Cosas por hacer" >

            <div class="mt-3">
                <textarea class="form-control col-md-8" id="validationTextarea" placeholder="Descripcion de la Tarea" required></textarea>
            </div>

            <br>

            <div class="form-row">

                <div class="col-md-3">
                    <label for="medio">Responsable</label>
                    <select id="medio" name="medio" class="form-control">
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
        </div>







    <label>Buscar beneficiario:</label>
    <input type="text" name="articulo" id="articulo" class="form-control input-lg" autocomplete="off"
           placeholder="Beneficiario a Buscar"/>
</div>
<script>
    $(document).ready(function () {
        $("#articulo").typeahead({
            source: function (query, resultado) {
                $.ajax({
                    url: "busquedabenefi.php",
                    type: "POST",
                    dataType: "json",
                    data: {query: query},
                    success: function (data) {
                        resultado($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });
    });
</script>





    </form>



</div>