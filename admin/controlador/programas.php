<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
if(empty($_GET['id'])){
    echo "No exite esta pagina";
    die();
}else{
$id_ciudadano = $_GET['id'];
}

$sql_ciudadano= "SELECT id_ciudadano, nombres, apellido_p, apellido_m FROM ciudadanos WHERE id_ciudadano = $id_ciudadano";
$consulta_ciudadano = $con->prepare($sql_ciudadano);
$consulta_ciudadano->execute();
$ciudadano = $consulta_ciudadano->fetch();


$sql_altas= "SELECT a.id_alta, a.exito, p.id_programa, p.abreviatura, p.nombre, c.nombres, c.apellido_m, c.apellido_p FROM altas a, programas_ciudadanos p, ciudadanos c WHERE a.id_ciudadano =? AND c.id_ciudadano=? AND p.id_programa=a.id_programa AND a.exito=1 AND p.id_programa !=1 GROUP BY a.id_alta;";
$consulta_altas = $con->prepare($sql_altas);
$consulta_altas->execute(array($id_ciudadano, $id_ciudadano));
$result_altas = $consulta_altas->fetchAll();


$sql_en_proceso= "SELECT pc.id_proceso_ciudadano, a.id_alta, a.id_ciudadano, a.exito, p.id_programa, p.abreviatura, p.nombre, c.nombres, c.apellido_m, c.apellido_p FROM altas a, programas_ciudadanos p, ciudadanos c, procesos_ciudadanos pc WHERE pc.id_alta = a.id_alta AND a.id_ciudadano =? AND c.id_ciudadano=? AND p.id_programa=a.id_programa AND a.exito=0 AND p.id_programa !=1 GROUP BY a.id_alta;";
$consulta_en_proceso = $con->prepare($sql_en_proceso);
$consulta_en_proceso->execute(array($id_ciudadano, $id_ciudadano));
$result_en_proceso = $consulta_en_proceso->fetchAll();

echo "<br>";
echo  "<h4>" . $ciudadano['id_ciudadano'] . " - " .$ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] . "<h4>";

/* Aqui se muestra la tabla cuando el ciudadano esta en procesos activos
 */
if($result_en_proceso){
    echo  "<br><h3>El ciudadano " . $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] ." tiene en proceso: a:</h3> <br> " ?>
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
                 <td> <a href="proceso.php?id_proceso=<?php echo $proceso['id_procesos']?>&id_ciudadano=<?php echo $id_ciudadano ?>&id_alta=<?php echo $proceso['id_alta']?>" class="btn btn-primary">Ver progreso</a> </td>
 
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
   echo  "<br><h3>El ciudadano " . $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] ." pertenece a:</h3> <br> " ?>
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
                        echo $pagos["year_on_curse"];
                        if($pagos["fecha_de_pago_bim_1"]){
                            echo "B1 " ;
                        } 
                        if($pagos["fecha_de_pago_bim_2"]){
                            echo ", B2  " ;
                        } 
                        if($pagos["fecha_de_pago_bim_3"]){
                            echo ", B3  " ;
                        }
                        if($pagos["fecha_de_pago_bim_4"]){
                            echo ", B4  " ;
                        }
                        if($pagos["fecha_de_pago_bim_5"]){
                            echo ", B5  " ;
                        }
                        if($pagos["fecha_de_pago_bim_6"]){
                            echo ", B6  " ;
                        }
                    ?>
                    <a href="detalles_pagos.php?id=<?php echo $pagos['id_pagos'] ?>" class="btn btn-success btn-sm mt-1"> Detalles pagos </a>
                    <?php endforeach;
                    endif; ?>

                </td>
                <td>
                    <?php
                    if(empty($result_pagos)){
                        $pagando = $alta['id_alta'];
                    }else{
                        echo var_dump($result_pagos['id_pagos']);
                        $pagando = $result_pagos['id_pagos'];
                    }
                    ?>
                        <a href="registro_pagos.php?id_ciudadano=<?php echo $id_ciudadano ?>&id_alta=<?php echo $pagando ?>" class="btn btn-primary">Registrar Pagos</a>
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

$sql_programas = "SELECT p.id_programa, p.nombre, a.id_alta FROM programas_ciudadanos p JOIN altas a ON p.id_programa != a.id_programa WHERE a.id_ciudadano = ? AND p.id_programa != 1 GROUP BY p.id_programa";
$consulta_programas = $con->prepare($sql_programas);
$consulta_programas->execute(array($id_ciudadano));
$result_programas = $consulta_programas->fetchAll();

echo "<br>";

foreach($result_programas as $programa): ?>
    <div class="alert btn alert-primary col-md-6" role="alert">
        <a href="proceso.php?id_programa=<?php echo $programa['id_programas'] . '&id_ciudadano='. $id_ciudadano?>"> Inscribir al programa <?php echo $programa['nombre'] ?></a>
    </div>

<?php endforeach;



?>
