<?php
$stm = $con->query("SELECT * FROM puestos_defensa WHERE rg=''");
$nrz = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM puestos_defensa WHERE rg='' AND id_ciudadano != ''");
$rz = $stm->fetchAll(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM puestos_defensa WHERE seccion='' AND zona != '' AND rg!=''");
$nrg = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM puestos_defensa WHERE seccion='' AND zona !='' AND rg!='' AND id_ciudadano != '' ");
$rg = $stm->fetchAll(PDO::FETCH_ASSOC);


$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla != '' ");
$ncas = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND id_ciudadano != '' ");
$cas = $stm->fetchAll(PDO::FETCH_ASSOC);


?>


<h3>Estadistica</h3>
<br>
<h5>Defensa</h5>
<?='<b>' . count($rz) . '</b> RZs registrados de <b>' . count($nrz) . '</b>'?>
<div class="form-group col-md-4">
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?=(count($rz)/ count($nrz) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rz)/ count($nrz) * 100), 2, '.', '')?>%</div>
    </div>
</div>

<br>

<?='<b>' . count($rg) . '</b> RGs registrados de <b>' . count($nrg) . '</b>'?>
<div class="form-group col-md-4">
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?=(count($rg)/ count($nrg) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rg)/ count($nrg) * 100), 2, '.', '')?>%</div>
    </div>
</div>

<br>

<?='<b>' . count($cas) . '</b> Puestos registrados de <b>' . count($ncas) . '</b>'?>
<div class="form-group col-md-4">
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?=(count($cas)/ count($ncas) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($cas)/ count($ncas) * 100), 2, '.', '')?>%</div>
    </div>
</div>