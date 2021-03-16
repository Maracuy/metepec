<?php

$stm = $con->query("SELECT * FROM puestos_promocion");
$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);



$stm = $con->query("SELECT * FROM promovido_promocion");
$promovidos = $stm->fetchAll(PDO::FETCH_ASSOC);


$promo = array();
$promovacio = array('manzana' => '');

foreach($puestos as $puesto){
	if(!$puesto['manzana']){
		array_push($promo, $puesto);
	}
	if($puesto['manzana']){
		$manzana = $puesto['manzana'];
		$stm = $con->query("SELECT * FROM promotor_promocion WHERE manzana = $manzana");
		$promotores = $stm->fetchAll(PDO::FETCH_ASSOC);
		if($promotores){
			if(count($promotores)>1){
				foreach($promotores as $promotor){
					array_push($promo, $promotor);
					$id_promotor = $promotor[''];
					$stm = $con->query("SELECT * FROM promovido_promocion WHERE id_promotor = $id_promotor");
					$promovidos = $stm->fetchAll(PDO::FETCH_ASSOC);
					if($promovidos){
						if(count($promovidos)>1){
							foreach($promovidos as $promovido){
								array_push($promo, $promovido);
							}
						}else{
							array_push($promo, $promovidos[0]);
						}
					}
				}
			}else{
				array_push($promo, $promotores[0]);
				$id_promotor = $promotores[0]['id_promotor'];
				$stm = $con->query("SELECT * FROM promovido_promocion WHERE id_promotor_promovido = $id_promotor");
				$promovido = $stm->fetch(PDO::FETCH_ASSOC);
				if($promovido){
					array_push($promo, $promovido);
				}
			}
		}
		array_push($promo, $puesto);
	}
}

?>

<table class="table">
  <thead>
    <tr>
		<th scope="col">Status</th>
		<th scope="col">Zona</th>
		<th scope="col">Seccion</th>
		<th scope="col">Mz</th>
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
    <?php 
	$zona_aux = 1;
	$seccion_universal = 0;
	foreach($promo as $pro):?>
    <tr>
		<td><?php
		if(isset($pro['id_promocion'])){
			echo $pro['id_promocion'];
		}
		if(isset($pro['id_promotor'])){
			echo $pro['id_promotor'];
		}
		if(isset($pro['id_promovido'])){
			echo $pro['id_promovido'];
		}
		?></td>

		<td><?php
			if(isset($pro['id_promocion'])){
				$zona_aux = $pro['zona'];
				}
				echo $zona_aux;
		?></td>

		<td><?php
			if(isset($pro['seccion'])){
				$seccion_universal = $pro['seccion'];
				echo $pro['seccion'];}else{
					echo $seccion_universal;
				}
		?></td>

		<td><?php
			if(isset($pro['manzana'])){
				echo $pro['manzana'];}
		?></td>

		<td><?php
			if(isset($pro['id_promocion'])){
				if(!$pro['manzana']){
					if(!$pro['seccion']){
						echo 'RZ';
					}else{
						echo 'RC';
					}
				}else{
					echo 'VacioPromo';
				}
			}
			if(isset($pro['id_promotor'])){
				echo 'Promotor';
			}
			if(isset($pro['id_promotor_promovido'])){
				echo 'Promovido';
			}
		?></td>

		<td></td>
		<td></td>
		<td></td>


    </tr> 
    <?php endforeach?>
	</tbody> 
    </table>