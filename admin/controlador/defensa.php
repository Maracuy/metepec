<?php
$stm = $con->query("SELECT id_ciudadano, nombres, apellido_p, apellido_m, id_colonia, seccion_electoral, id_registrante FROM ciudadanos");
$ciudadanos = $stm->fetchAll(PDO::FETCH_ASSOC);
array_unshift($ciudadanos, 0);

$stm = $con->query("SELECT * FROM colonias");
$colonias = $stm->fetchAll(PDO::FETCH_ASSOC);

include 'DefensaC.php';
$ciudadano = New Defensa;

$stm = $con->query("SELECT * FROM puestos_defensa");
$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);


?>

<h4>Área de administración de la Defensa del Voto</h4>

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
	<?php foreach($puestos as $puesto):
		$boton_conf = '<a href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';
		$boton_conf_elec = '<a href="electoral.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';


		?>
	<tr>
		<td></a> <?php 
		if($puesto['id_ciudadano']):?>
		<a href="controlador/adddefensasql.php?id=<?=$puesto['id_defensa'] . '&status=' . $puesto['confirmacion']?>" class="btn btn-<?=($puesto['confirmacion'] == 1) ? 'success' : 'secondary' ?> btn-sm"> <i class="fas fa-dot-circle"></i></a>
		<?php endif ?>
		</td>
		<td> <?=$puesto['zona']?> </td>
		<td> <?=$puesto['rg']?> </td>
		<td> <?=$puesto['seccion']?> </td>
		<td> <?=$puesto['casilla']?> </td>
		<td> <?=$puesto['puesto']?> </td>

<?php if(!$puesto['id_ciudadano']):?>
	<td> <button type="button" class="btn btn-primary btn-sm" onclick="numero(<?=$puesto['id_defensa']?>)" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button> </td>
<?php endif;
if($puesto['id_ciudadano']):?>

	<td> <?=(isset($ciudadanos[$puesto['id_ciudadano']]['id_colonia']) &&  $ciudadanos[$puesto['id_ciudadano']]['id_colonia'] != "" ) ? $colonias[$ciudadanos[$puesto['id_ciudadano']]['id_colonia']]['abreviatura'] : $boton_conf?> </td>
	<td> <?=(isset($ciudadanos[$puesto['id_ciudadano']]['manzana']) &&  $ciudadanos[$puesto['id_ciudadano']]['manzana'] != "" ) ? $ciudadanos[$puesto['id_ciudadano']]['manzana'] : $boton_conf?> </td>
	<td> <?=$ciudadanos[$puesto['id_ciudadano']]['nombres'] . " " . $ciudadanos[$puesto['id_ciudadano']]['apellido_p'] . " " . $ciudadanos[$puesto['id_ciudadano']]['apellido_m']?> </td>
	<td> <?php
	if(isset($ciudadanos[$puesto['id_ciudadano']]['seccion_electoral']) && $ciudadanos[$puesto['id_ciudadano']]['seccion_electoral'] != ''){
		if($ciudadanos[$puesto['id_ciudadano']]['seccion_electoral'] == $puesto['seccion']){
			echo '<i class="fas fa-map-marker-alt"></i>';
		}else{
			echo '<i class="fas fa-map-marked"></i>';
		}
		}else{
			echo '<a href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';}?></td>

		<td><?php
				if(isset($puesto['previo']) && $puesto['previo'] != ''){
					if(isset($puesto['previo']) && ($puesto['previo'] == 1)){
						echo $ciudadano->tooltipSimple("Previo", '<i class="fas fa-backward"> </i>');
					}else{
						echo $ciudadano->tooltipSimple("Nuevo", '<i class="fas fa-bell"> </i> </i>');
					}
				}else{
					echo '<a href="electoral.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';
				}
		?></td>	
		<td><?=$ciudadanos[$puesto['up']]['nombres'] . " " . $ciudadanos[$puesto['up']]['apellido_p']?> </td>
		<td>o</td>
		<td><?=(isset($puesto['afiliacion']) &&  $puesto['afiliacion'] != "" ) ? $puesto['afiliacion'] : $boton_conf_elec?> </td>
		
		
		</tr>
	<?php 
	endif;
	endforeach?>
  </tbody>
</table>






<div class="modal fade" id="exampleModal" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Seleccionar Ciudadano</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		
			<?php include 'ciudadanos_todos_defensa.php'?>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" onclick="deleteall()" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>






<script>
function numero(dato){
	casilla = dato;
}

function AgregarCiudadano(id) {
	if(confirm("Seguro que desea agregarlo a la casilla?")) document.location = 'controlador/adddefensasql.php?id=' + id +'&casilla=' + casilla +'&nuevo=1';
}

</script>