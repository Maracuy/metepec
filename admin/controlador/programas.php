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

$sql_altas= "SELECT altas.id_alta, altas.id_beneficiario, programas.id_programas, b.nombres, b.apellido_m, b.apellido_m, b.id_beneficiario FROM altas, programas, beneficiarios b WHERE b.id_beneficiario = 3 AND altas.id_beneficiario=b.id_beneficiario AND programas.id_programas=altas.id_programa; ";
$consulta_altas = $con->prepare($sql_altas);
$consulta_altas->execute(array($id_beneficiario));
$result_beneficiario = $consulta_altas->fetchAll();

echo var_dump($result_beneficiario);

$sql_programas = "SELECT * FROM programas";
$consulta_programas = $con->prepare($sql_programas);
$consulta_programas->execute();
$result_programas = $consulta_programas->fetch();






?>

