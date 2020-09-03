<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
if($_GET['id_beneficiario'] && $_GET['id_alta']){
    $id_beneficiario = $_GET['id_beneficiario'];
    $id_alta = $_GET['id_alta'];
}else{
    echo "No existe esta pagina";
    die();
}

$sql_pagos = "SELECT *, a.id_alta FROM pagos_adulto_mayor p, altas a WHERE a.id_alta = ? AND p.id_alta = a.id_alta";
$consulta_pagos = $con->prepare($sql_pagos);
$consulta_pagos->execute(array($id_alta));
$result_pagos = $consulta_pagos->fetchAll();


$sql_beneficiario = "SELECT id_beneficiario, nombres, apellido_p, apellido_m FROM beneficiarios WHERE id_beneficiario = ?";
$consuta_beneficiario = $con->prepare($sql_beneficiario);
$consuta_beneficiario->execute(array($id_beneficiario));
$beneficiario = $consuta_beneficiario->fetch();



if($result_pagos):
    foreach($result_pagos as $pago):?>
        <table class="table">
            <thead>
                <tr>
                <th scope="row">Año</th>
                <th scope="col">Bimestre 1</th>
                <th scope="col">Bimestre 2</th>
                <th scope="col">Bimestre 3</th>
                <th scope="col">Bimestre 4</th>
                <th scope="col">Bimestre 5</th>
                <th scope="col">Bimestre 6</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"><?php echo $pago['year_on_curse']?></th>
                <td><?php 
                    if(isset($pago['bim_1']) && $pago['bim_1'] != ""){
                        echo $pago['bim_1'];
                    }?></td>
                <td><?php 
                    if(isset($pago['bim_2']) && $pago['bim_2'] != ""){
                        echo $pago['bim_2'];
                    }?></td>
                <td><?php 
                    if(isset($pago['bim_3']) && $pago['bim_3'] != ""){
                        echo $pago['bim_3'];
                    }?></td>
                <td><?php 
                    if(isset($pago['bim_4']) && $pago['bim_4'] != ""){
                        echo $pago['bim_4'];
                    }?></td>
                <td><?php 
                    if(isset($pago['bim_5']) && $pago['bim_5'] != ""){
                        echo $pago['bim_5'];
                    }?></td>
                <td><?php 
                    if(isset($pago['bim_6']) && $pago['bim_6'] != ""){
                        echo $pago['bim_6'];
                    }?></td>
                </tr>
            </tbody>
        </table>
<?php
    endforeach;
endif;



if(!$result_pagos):
    echo "<h4>" . ucwords($beneficiario['nombres']) . " " . ucwords($beneficiario['apellido_p']) . " no tiene pagos registrados</h4>"; ?>

    <form action="controlador/registro_pagos_sql.php" method="post">

    <input type="hidden" name="id_alta" value="<?php echo $id_alta?>">
    <input type="hidden" name="id_beneficiario" value="<?php echo $id_beneficiario?>">
            
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="year">Año</label>
                <select class="form-control" id="year" name="year">
                    <option value="">Elegir año</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
        </div>


        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="fecha_de_pago_bim_1">Bimestre 1</label>
                <input class="form-control" type="date" name="fecha_de_pago_bim_1" id="fecha_de_pago_bim_1">
            </div>

            <div class="form-group col-md-2">
                <label for="fecha_de_pago_bim_2">Bimestre 2</label>
                <input class="form-control" type="date" name="fecha_de_pago_bim_2" id="fecha_de_pago_bim_2">
            </div>

            <div class="form-group col-md-2">
                <label for="fecha_de_pago_bim_3">Bimestre 3</label>
                <input class="form-control" type="date" name="fecha_de_pago_bim_3" id="fecha_de_pago_bim_3">
            </div>

        </div>


        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="fecha_de_pago_bim_4">Bimestre 4</label>
                <input class="form-control" type="date" name="fecha_de_pago_bim_4" id="fecha_de_pago_bim_4">
            </div>

            <div class="form-group col-md-2">
                <label for="fecha_de_pago_bim_5">Bimestre 5</label>
                <input class="form-control" type="date" name="fecha_de_pago_bim_5" id="fecha_de_pago_bim_5">
            </div>

            <div class="form-group col-md-2">
                <label for="fecha_de_pago_bim_6">Bimestre 6</label>
                <input class="form-control" type="date" name="fecha_de_pago_bim_6" id="fecha_de_pago_bim_6">
            </div>

        </div>

        <button class="btn btn-primary" type="submit" name="registro_nuevo_pago" id="registro_nuevo_pago"> <i class="far fa-save mr-2"></i>  Registrar Pagos</button>


    </form>



<?php endif ?>