<?php

if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}
if(empty($_GET['id'])){
    echo "No existe esta pagina";
    die();
}elseif($_GET['id']){
$id_beneficiario = $_GET['id'];
}

$sql_pagos= "SELECT a.id_alta, a.id_beneficiario, p.id_programas, p.abreviatura, p.nombre, b.nombres, b.apellido_m, b.apellido_p 
FROM altas a, programas p, beneficiarios b 
WHERE a.id_beneficiario = ? AND b.id_beneficiario=? AND p.id_programas=a.id_programa GROUP BY a.id_alta;";
$consulta_pagos = $con->prepare($sql_pagos);
$consulta_pagos->execute(array($id_beneficiario, $id_beneficiario));
$result_pagos = $consulta_pagos->fetchAll();

echo "Todo chido";


?>