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
<h4>Defensa</h4>
<br>
<h5>Avance General</h5>

<div class="form-row">
    <div class="form-group col-md-3">
        <?='<b>' . count($rz) . '</b> RZs registrados de <b>' . count($nrz) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($rz)/ count($nrz) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rz)/ count($nrz) * 100), 2, '.', '')?>%</div>
        </div>
    </div>

    <br>

    <div class="form-group col-md-3">
        <?='<b>' . count($rg) . '</b> RGs registrados de <b>' . count($nrg) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($rg)/ count($nrg) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($rg)/ count($nrg) * 100), 2, '.', '')?>%</div>
        </div>
    </div>

    <br>

    <div class="form-group col-md-3">
        <?='<b>' . count($cas) . '</b> Puestos registrados de <b>' . count($ncas) . '</b>'?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=(count($cas)/ count($ncas) *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format((count($cas)/ count($ncas) * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>

<br>
<h5>Avance Por Zona</h5>

<br>


<h6>Zona 1</h6>
<?php
$this_zona = 1;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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



    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v) *100?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/$cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 2</h6>
<?php
$this_zona = 2;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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

    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 3</h6>
<?php
$this_zona = 3;
?>
<div class="form-row">
    <div class="form-group col-md-3">
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


    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 4</h6>
<?php
$this_zona = 4;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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


    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 5</h6>
<?php
$this_zona = 5;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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


    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 6</h6>
<?php
$this_zona = 6;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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

    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 7</h6>
<?php
$this_zona = 7;
?>
<div class="form-row">
    <div class="form-group col-md-3">
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


    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 8</h6>
<?php
$this_zona = 8;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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


    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>


<h6>Zona 9</h6>
<?php
$this_zona = 9;
?>

<div class="form-row">
    <div class="form-group col-md-3">
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


    <div class="form-group col-md-3">
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
        <?='<b>' . $rgz1 . '</b> de <b>' . $rgz1v . '</b> RGs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($rgz1/ $rgz1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($rgz1/ $rgz1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>



    <div class="form-group col-md-3">
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
        <?='<b>' . $cas1 . '</b> de <b>' . $cas1v . '</b> RCs Registrados en la Zona ' . $this_zona?>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=($cas1/ $cas1v *100)?>%;" aria-valuemin="0" aria-valuemax="100"><?=number_format(($cas1/ $cas1v * 100), 2, '.', '')?>%</div>
        </div>
    </div>
</div>