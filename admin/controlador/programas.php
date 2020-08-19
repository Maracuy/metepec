<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
if(empty($_GET['id'])){
    echo "No exite esta pagina";
    die();
}else{
$id_beneficiario = $_GET['id'];
}

$sql_beneficiario= "SELECT id_beneficiario, nombres, apellido_p, apellido_m FROM beneficiarios WHERE id_beneficiario = $id_beneficiario";
$consulta_beneficiario = $con->prepare($sql_beneficiario);
$consulta_beneficiario->execute();
$beneficiario = $consulta_beneficiario->fetch();


$sql_pagos= "SELECT * FROM pagos_adulto_mayor p, altas a WHERE a.id_beneficiario = $id_beneficiario AND  p.id_alta=a.id_alta GROUP BY a.id_alta;";
$consulta_pagos = $con->prepare($sql_pagos);
$consulta_pagos->execute();
$result_pagos = $consulta_pagos->fetchAll();


$sql_altas= "SELECT a.id_alta, a.id_beneficiario, a.exito, p.id_programas, p.abreviatura, p.nombre, b.nombres, b.apellido_m, b.apellido_p FROM altas a, programas p, beneficiarios b WHERE a.id_beneficiario =? AND b.id_beneficiario=? AND p.id_programas=a.id_programa AND a.exito=1 AND p.id_programas !=1 GROUP BY a.id_alta;";
$consulta_altas = $con->prepare($sql_altas);
$consulta_altas->execute(array($id_beneficiario, $id_beneficiario));
$result_altas = $consulta_altas->fetchAll();


$sql_en_proceso= "SELECT procesos.id_procesos, a.id_alta, a.id_beneficiario, a.exito, p.id_programas, p.abreviatura, p.nombre, b.nombres, b.apellido_m, b.apellido_p FROM altas a, programas p, beneficiarios b, procesos WHERE procesos.id_alta = a.id_alta AND a.id_beneficiario =? AND b.id_beneficiario=? AND p.id_programas=a.id_programa AND a.exito=0 AND p.id_programas !=1 GROUP BY a.id_alta;";
$consulta_en_proceso = $con->prepare($sql_en_proceso);
$consulta_en_proceso->execute(array($id_beneficiario, $id_beneficiario));
$result_en_proceso = $consulta_en_proceso->fetchAll();

echo "<br>";
echo  "<h4>" . $beneficiario['id_beneficiario'] . " - " .$beneficiario['nombres'] . " " . $beneficiario['apellido_p'] . " " . $beneficiario['apellido_m'] . "<h4>";

/* Aqui se muestra la tabla cuando el beneficiario esta en procesos activos
 */
if($result_en_proceso){
    echo  "<br><h3>El beneficiario " . $beneficiario['nombres'] . " " . $beneficiario['apellido_p'] ." tiene en proceso: a:</h3> <br> " ?>
     <table class="table">
         <thead>
             <tr>
                 <th scope="col">Nombre Programa</th>
                 <th scope="col">Abreviatura</th>
                 <th scope="col">Proceso</th>
             </tr>
         </thead>
     <?php foreach($result_en_proceso as $proceso): ?>
 
         <tbody>
             <tr>
                 <td> <?php echo $proceso['nombre'] ?> </td>
                 <td> <?php echo $proceso['abreviatura'] ?> </td>
                 <td> <a href="proceso.php?id_proceso=<?php echo $proceso['id_procesos']?>&id_beneficiario=<?php echo $id_beneficiario ?>" class="btn btn-primary">Ver progreso</a> </td>
 
             </tr>
         
 
 
     <?php endforeach;
 echo "</tbody>";
 echo "</table>";}else{
    echo "<br>";
    echo  "<h5> no tiene ningun proceso activo</h5>";
 }



/* Aqui se muestran las altas existentes (Exito=1) */
echo '<div class="dropdown-divider mt-5"></div>';


if($result_altas){
   echo  "<br><h3>El beneficiario " . $beneficiario['nombres'] . " " . $beneficiario['apellido_p'] ." pertenece a:</h3> <br> " ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre Programa</th>
                <th scope="col">Abreviatura</th>
                <th scope="col">Pagos</th>
                <th scope="col">Registrar Pago</th>
                <th scope="col">Sacar</th>
            </tr>
        </thead>
    <?php foreach($result_altas as $alta): ?>

        <tbody>
            <tr>
                <td> <?php echo $alta['nombre'] ?> </td>
                <td> <?php echo $alta['abreviatura'] ?> </td>
                <td> <?php
                if($result_pagos):
                    foreach($result_pagos as $pagos):
                        if($pagos["bim_1"]){
                            echo "B1   " ;
                        } 
                        if($pagos["bim_2"]){
                            echo ", B2  " ;
                        } 
                        if($pagos["bim_3"]){
                            echo ", B3  " ;
                        }
                        if($pagos["bim_4"]){
                            echo ", B4  " ;
                        }
                        if($pagos["bim_5"]){
                            echo ", B5  " ;
                        }
                        if($pagos["bim_6"]){
                            echo ", B6  " ;
                        }
                    ?>
                <br>
                    <a href="detalles_pagos.php?id=<?php echo $pagos['id_pagos'] ?>" class="btn btn-success btn-sm mt-1"> Detalles pagos </a>
                    <?php endforeach;
                    endif; ?>

                </td>
                <td>
                    <?php
                    if(empty($result_pagos)){
                        $pagando = $alta['id_alta'];
                    }else{
                        $pagando = $result_pagos['id_pagos'];
                    }
                    ?>
                        <a href="registro_pagos.php?id=<?php echo $pagando ?>" class="btn btn-primary">Registrar Pagos</a>
                </td>
                <td> <?php echo '<i class="fas fa-sign-out-alt"></i>' ?> </td>

            </tr>
        


    <?php endforeach;
echo "</tbody>";
echo "</table>";}else{
    echo "<br>";

    echo  "<h5> no pertenece a ningun programa</h5>";
}

echo '<div class="dropdown-divider mt-5"></div>';



echo "<br><h5> Inscribir a un programa nuevo: </h5>";

$sql_programas = "SELECT p.id_programas, p.nombre, a.id_alta FROM programas p JOIN altas a ON p.id_programas != a.id_programa WHERE a.id_beneficiario = ? AND p.id_programas != 1 GROUP BY p.id_programas";
$consulta_programas = $con->prepare($sql_programas);
$consulta_programas->execute(array($id_beneficiario));
$result_programas = $consulta_programas->fetchAll();

echo "<br>";

foreach($result_programas as $programa): ?>
    <div class="alert btn alert-primary col-md-6" role="alert">
        <a href="proceso.php?id_programa=<?php echo $programa['id_programas'] . '&id_beneficiario='. $id_beneficiario?>"> Inscribir al programa <?php echo $programa['nombre'] ?></a>
    </div>

<?php endforeach;



?>
