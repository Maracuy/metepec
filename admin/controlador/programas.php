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

$stm = $con->query("SELECT * FROM altas WHERE id_ciudadano = $id_ciudadano AND exito = 1");
$altas = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<?php 
if($altas):?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre Programa</th>
                <th scope="col">Abreviatura</th>
                <td> Datos como fechas y asi.. </td>
            </tr>
        </thead>
    <?php foreach($altas as $alta):?>

        <tbody>
            <tr>
                <td> <?php 
                if($alta['id_programa_f'] != ''){
                    echo $federales[$alta['id_programa_f']-1]['nombre'];
                }
                if($alta['id_programa_e'] != ''){   
                    echo $estatales[$alta['id_programa_e']-1]['nombre'];
                }
                if($alta['id_programa_m'] != ''){
                    echo $municipales[$alta['id_programa_m']-1]['nombre'];
                } ?> </td>
                <td> <?php 
                if($alta['id_programa_f'] != ''){
                    echo $federales[$alta['id_programa_f']-1]['abreviatura'];
                }
                if($alta['id_programa_e'] != ''){   
                    echo $estatales[$alta['id_programa_e']-1]['abreviatura'];
                }
                if($alta['id_programa_m'] != ''){
                    echo $municipales[$alta['id_programa_m']-1]['abreviatura'];
                }
                ?> </td>
                <td> Datos como fechas y asi.. </td>

            </tr>
        </tbody>
    <?php endforeach;
    endif?>

