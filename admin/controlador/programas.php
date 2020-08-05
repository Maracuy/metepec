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


$sql_altas= "SELECT a.id_alta, a.id_beneficiario, p.id_programas, p.abreviatura, p.nombre, b.nombres, b.apellido_m, b.apellido_p FROM altas a, programas p, beneficiarios b WHERE a.id_beneficiario = $id_beneficiario AND p.id_programas=a.id_programa GROUP BY a.id_alta;";
$consulta_altas = $con->prepare($sql_altas);
$consulta_altas->execute();
$result_altas = $consulta_altas->fetchAll();

if($result_altas[0]['id_programas'] != 1){
   echo  "<br><h3>" . $result_altas[0]['nombres'] . " " . $result_altas[0]['apellido_p'] . " " . $result_altas[0]['apellido_m'] ." pertenece a:</h3> <br> " ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id del programa</th>
                <th scope="col">Nombre</th>
                <th scope="col">Abreviatura</th>
                <th scope="col">Pagos</th>
                <th scope="col">Pagos</th>
            </tr>
        </thead>
    <?php foreach($result_altas as $alta): ?>

        <tbody>
            <tr>
                <th> <?php echo $alta['id_programas'] ?> </th>
                <td> <?php echo $alta['nombre'] ?> </td>
                <td> <?php echo $alta['abreviatura'] ?> </td>
                <td> <?php echo $alta['nombre'] ?> </td>
                <td> <?php echo '<i class="fas fa-hand-holding-usd"></i>' ?> </td>

            </tr>
        


    <?php endforeach;
echo "</tbody>";
echo "</table>";}else{
   echo  "<h4>" . $result_altas[0]['nombres'] . " " . $result_altas[0]['apellido_p'] . " " . $result_altas[0]['apellido_m'] ." no pertenece a ningun programa</h4>";
}

echo "<br><h5> Inscribir a un programa nuevo: </h5>";

$sql_programas = "SELECT * FROM programas";
$consulta_programas = $con->prepare($sql_programas);
$consulta_programas->execute();
$result_programas = $consulta_programas->fetchAll();

echo "<br>";

foreach($result_programas as $programa): 
    if($programa['abreviatura'] != "SPRM"): ?>

    <div class="alert btn alert-primary col-md-6" role="alert">
        <a href="proceso.php"> Inscribir al programa <?php echo $programa['nombre'] ?></a>
    </div>

    <?php endif;
endforeach;



?>
