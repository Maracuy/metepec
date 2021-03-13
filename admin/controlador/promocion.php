<?php

$stm = $con->query("SELECT * FROM puestos_promocion");
$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);
$promo = array();

foreach($puestos as $puesto){
    if($puesto['promotor'] != 1){
        array_push($promo, $puesto);
    }else{
        $id = $puesto['id_promocion'];
        $stm = $con->query("SELECT * FROM promotor_promocion WHERE id_promocion = $id");
        $puestos = $stm->fetch(PDO::FETCH_ASSOC);
    }
}


?>

<table class="table">
  <thead>
    <tr>
		<th scope="col">Status</th>
		<th scope="col">Zona</th>
		<th scope="col">RG</th>
		<th scope="col">Seccion</th>
		<th scope="col">Casilla</th>
		<th scope="col">Posicion</th>
		<th scope="col">Col</th>
		<th scope="col">Mz</th>
		<th scope="col">Nombre</th>
		<th scope="col">Local</th>
		<th scope="col">Prev</th>
		<th scope="col">UP</th>
		<th scope="col">Origen</th>
		<th scope="col">Afiliación</th>
	</tr>
	</thead>
	<tbody>
    <tr>
    <?php foreach($puestos as $puesto):
		$boton_conf = '<a href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';
		$boton_conf_elec = '<a href="electoral.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';


		?>
    </tr> 
    <?php endforeach?>
	</tbody> 
    </table>