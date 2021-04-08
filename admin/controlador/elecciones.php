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
        <?=$ele->TituloBarra(count($nrz), count($rz), 'CZs')?>
        <?=$ele->BarraProgreso(count($nrz), count($rz), '')?>
    </div>

    <div class="form-group col-md-2">
        <?=$ele->TituloBarra(count($nrg), count($rg), 'RGs')?>
        <?=$ele->BarraProgreso(count($nrg), count($rg), '')?>
    </div>

    <div class="form-group col-md-2">
        <?=$ele->TituloBarra(count($rc_totales), count($rc_ocupados), 'PRs')?>
        <?=$ele->BarraProgreso(count($rc_totales), count($rc_ocupados), '')?>
    </div>

    <div class="form-group col-md-2">
        <?=$ele->TituloBarra(count($s1_totales), count($s1_ocupados), 'S1s')?>
        <?=$ele->BarraProgreso(count($s1_totales), count($s1_ocupados), '')?>
    </div>

    <div class="form-group col-md-2">
        <?=$ele->TituloBarra(count($s2_totales), count($s2_ocupados), 'S1s')?>
        <?=$ele->BarraProgreso(count($s2_totales), count($s2_ocupados), '')?>
    </div>

    <div class="form-group col-md-2">
        <?=$ele->TituloBarra(count($s3_totales), count($s3_ocupados), 'S1s')?>
        <?=$ele->BarraProgreso(count($s3_totales), count($s3_ocupados), '')?>
    </div>

</div>



<br>
<h5>Avance Por Zona</h5>
<div class="dropdown-divider"></div>
<br>

<?php foreach($zonas as $zona):
    $this_zona = $zona['zona']?>


    <div class="form-row">

        <div class="col-md-1">
            <h1 class="ml-2">Z<?=$this_zona?></h1>   
        </div>

        <div class="form-group col-md-1">
            <?= $ele->TieneRZ($nrz[$this_zona-1]['id_ciudadano'])?>
        </div>


<!-- Aqui comienza el area de las estadisticas por rg, pr, etc -->
        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($nrg, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'RGs')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'], '')?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($rc_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'PR')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'], 'bg-warning')?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($s1_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'S1')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'], '')?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($s2_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'S1')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'], '')?>
        </div>

        <div class="form-group col-md-2">
            <?php $result = $ele->Cifras($s3_totales, $this_zona)?>
            <?= $ele->TituloBarra($result['total'], $result['ocupados'], 'S1')?>
            <?= $ele->BarraProgreso($result['total'],$result['ocupados'], '')?>
        </div>
    </div>


    <div class="dropdown-divider"></div>
<?php endforeach?>