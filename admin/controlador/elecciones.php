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



<div class="form-row">

    <div class="mr-2">
        <h1>Z1</h1>
        <?php
        $this_zona = 1;
        ?>    
    </div>

    <div class="form-group col-md-1">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona'] == $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }

        echo $rgz1v;
        echo $rgz1;
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v) *100?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($rc_totales as $n){
            if($n['zona'] == $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> PRC de <b>' . $cas1v . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/$cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($s1_totales as $n){
            if($n['zona'] == $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> S1s de <b>' . $cas1v . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/$cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($s2_totales as $n){
            if($n['zona'] == $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> S2s de <b>' . $cas1v . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/$cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($s3_totales as $n){
            if($n['zona'] == $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> S3s de <b>' . $cas1v . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/$cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>

        
</div>


<div class="dropdown-divider"></div>

<!-- Zona 2 -->

<h6>Zona 2</h6>
<?php
$this_zona = 2;
?>

<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>

    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 3</h6>
<?php
$this_zona = 3;
?>
<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 4</h6>
<?php
$this_zona = 4;
?>

<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 5</h6>
<?php
$this_zona = 5;
?>

<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 6</h6>
<?php
$this_zona = 6;
?>

<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>

    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 7</h6>
<?php
$this_zona = 7;
?>
<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 8</h6>
<?php
$this_zona = 8;
?>

<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 9</h6>
<?php
$this_zona = 9;
?>

<div class="form-row">
    <div class="form-group col-md-2">
        <?php
        if($nrz[$this_zona-1]['id_ciudadano']){
            echo "Tiene RZ </b>";
        }else{
            echo "Falta RZ </b>";
        }
        ?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0' ?>%;" aria-valuemin="0" aria-valuemax="100"><?=($nrz[$this_zona-1]['id_ciudadano']) ? '100' : '0'?>%</div>
        </div>
    </div>


    <div class="form-group col-md-2">
    <?php
        $rgz1v = 0;
        $rgz1 = 0;
        foreach($nrg as $n){
            if($n['zona']== $this_zona){
                $rgz1v++;
                if($n['id_ciudadano'] != null){
                    $rgz1++;
                }
            }
        }
    ?>
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-2">
    <?php
        $cas1v = 0;
        $cas1 = 0;
        foreach($ncas as $n){
            if($n['zona']== $this_zona){
                $cas1v++;
                if($n['id_ciudadano'] != null){
                    $cas1++;
                }
            }
        }
    ?>
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> Rcs en Zona  ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 0, '.', '')?>%</div>
        </div>
    </div>
</div>