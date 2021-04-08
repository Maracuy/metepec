<?php

require_once 'controlador/EstadisticaElecciones.php';
$ele = new Elecciones();

$stm = $con->query("SELECT zona FROM puestos_defensa GROUP BY zona");
$zonas = $stm->fetchAll(PDO::FETCH_ASSOC);

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


       
        //Area de consulta de los suplentes:

    //representantes totales y vacios
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 0");
$rc_totales = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 0 AND id_ciudadano != ''");
$rc_ocupados = $stm->fetchAll(PDO::FETCH_ASSOC);
 
    //Suplentes 1 totales y vacios
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 1");
$s1_totales = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 1 AND id_ciudadano != ''");
$s1_ocupados = $stm->fetchAll(PDO::FETCH_ASSOC);

    //Suplentes 2 totales y vacios
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 2");
$s2_totales = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 2 AND id_ciudadano != ''");
$s2_ocupados = $stm->fetchAll(PDO::FETCH_ASSOC);

    //Suplentes 3 totales y vacios
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 3");
$s3_totales = $stm->fetchAll(PDO::FETCH_ASSOC);
$stm = $con->query("SELECT * FROM puestos_defensa WHERE casilla !='' AND puesto = 3 AND id_ciudadano != ''");
$s3_ocupados = $stm->fetchAll(PDO::FETCH_ASSOC);



?>


<h3>Estadistica</h3>
<br>
<h4>Defensa</h4>
<br>
<h5>Avance General</h5>
<div class="dropdown-divider"></div>

<div class="form-row">
    <div class="form-group col-md-2">
        <?='<b>' . count($rz) . '</b> RZs   de <b>' . count($nrz) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($rz)/ count($nrz) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rz)/ count($nrz) * 100), 0, '.', '')?>%</div>
        </div>
    </div>

    <br>

    <div class="form-group col-md-2">
        <?='<b>' . count($rg) . '</b> RGs   de <b>' . count($nrg) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($rg)/ count($nrg) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rg)/ count($nrg) * 100), 0, '.', '')?>%</div>
        </div>
    </div>

    <br>

    <div class="form-group col-md-2">
        <?='<b>' . count($rc_ocupados) . '</b> PRC <b>' . count($rc_totales) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($rc_ocupados)/ count($rc_totales) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rc_ocupados)/ count($rc_totales) * 100), 0, '.', '')?>%</div>
        </div>
    </div>

    <div class="form-group col-md-2">
        <?='<b>' . count($s1_ocupados) . '</b> S1 de <b>' . count($s1_totales) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($s1_ocupados)/ count($s1_totales) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($s1_ocupados)/ count($s1_totales) * 100), 0, '.', '')?>%</div>
        </div>
    </div>

    <div class="form-group col-md-2">
        <?='<b>' . count($s2_ocupados) . '</b> S2 de <b>' . count($s2_totales) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($s2_ocupados)/ count($s2_totales) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($s2_ocupados)/ count($s2_totales) * 100), 0, '.', '')?>%</div>
        </div>
    </div>

    <div class="form-group col-md-2">
        <?='<b>' . count($s3_ocupados) . '</b> S3 de <b>' . count($s3_totales) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($s3_ocupados)/ count($s3_totales) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($s3_ocupados)/ count($s3_totales) * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>



<br>
<h5>Avance Por Zona</h5>
<div class="dropdown-divider"></div>
<br>

<?php foreach($zonas as $zona):
    $this_zona = $zona['zona']?>


    <div class="form-row">

        <div class="mr-2">
            <h1>Z<?=$this_zona?></h1>   
        </div>

        <div class="form-group col-md-1">
            <?= $ele->TieneRZ($nrz[$this_zona-1]['id_ciudadano'])?>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
            </div>
        </div>



        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($nrg, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'RGs')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'])?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($rc_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'PRC')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'])?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($s1_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'S1')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'])?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($s2_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'S1')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'])?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($s3_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'S1')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'])?>
        </div>
    </div>


    <div class="dropdown-divider"></div>
<?php endforeach?>