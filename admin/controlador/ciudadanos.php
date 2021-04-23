<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

require_once 'CiudadanosC.php';
$datos = new Datos();

$nivel_admin = $_SESSION['user']['nivel'];
$id_admin = $_SESSION['user']['id_ciudadano'];


$stm = $con->query("SELECT * FROM puestos_defensa WHERE id_ciudadano = 10");
$data_usuario = $stm->fetch(PDO::FETCH_ASSOC);

if($nivel_admin > 3){
	if($nivel_admin == 5){ // Quiere decir que es CZ
		$zona = $data_usuario['zona'];
		$extra = "WHERE d.zona = " . $zona;
		$extra2 = "WHERE id_registrante = $id_admin";
	}
	if($nivel_admin == 6){ // Quiere decir que es RG
		$zona = $data_usuario['rg'];
		$extra = "WHERE d.zona = " . $zona;
		$extra2 = "WHERE id_registrante = $id_admin";
	}

}else{
	$extra = '';
	$extra2 = '';
}

$sentencia = "SELECT c.id_ciudadano, c.nombres, c.apellido_p, c.apellido_m, c.telefono, c.seccion_electoral, c.zona, c.manzana, c.vulnerable, c.genero, c.fecha_nacimiento, c.simpatia
FROM puestos_defensa d
INNER JOIN ciudadanos c ON c.id_ciudadano = d.id_ciudadano $extra AND c.borrado != 1";
$sql_query = $con->prepare($sentencia);
$sql_query->execute();
$ciudadanos = $sql_query->fetchALL();

//Ahora extraemos los datos desde los ciudadanos
$sql_query = $con->prepare("SELECT c.id_ciudadano, c.nombres, c.apellido_p, c.apellido_m, c.telefono, c.seccion_electoral, c.zona, c.manzana, c.vulnerable, c.genero, c.fecha_nacimiento, c.simpatia FROM ciudadanos c $extra2");
$sql_query->execute();
$ciudadanos2 = $sql_query->fetchALL();

foreach($ciudadanos2 as $n){
  array_push($ciudadanos, $n);
}
?>

<div class="row">
	<div>
		<a href="../admin/alta_ciudadano.php"><button type="button" class="btn btn-primary btn-lg">Nuevo Ciudadano</button></a>
	</div>
	<div>
	Aqui va el texto de la estadistica
	</div>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">
				<a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'zona') ? '?orden=zona&by=zona' : '?orden=zona' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por ZONA">
					Z <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'zona') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
					echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'zona') ? $orde : '' ?> 
				</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'seccion_electoral') ? '?orden=seccion_electoral&by=seccion_electoral' : '?orden=seccion_electoral' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por SECCIÓN">
					SECC <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'seccion_electoral') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
					echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'seccion_electoral') ? $orde : '' ?> 
				</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'manzana') ? '?orden=manzana&by=manzana' : '?orden=manzana' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por MANZANA">
					MZ <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'manzana') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'manzana') ? $orde : '' ?> 
			</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'posicion') ? '?orden=posicion&by=posicion' : '?orden=posicion' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por POSICION ELECTORAL">
					POS <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'posicion') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'posicion') ? $orde : '' ?> 
			</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'vulnerable') ? '?orden=vulnerable&by=vulnerable' : '?orden=vulnerable' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por VULNERABLE O NO">
			<i class="fas fa-wheelchair"></i> <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'vulnerable') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'vulnerable') ? $orde : '' ?> 
			</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'nombres') ? '?orden=nombres&by=nombres' : '?orden=nombres' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por PRIMER NOMBRE">
					NOMBRES <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'nombres') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'nombres') ? $orde : '' ?> 
			</a></th>

			<th></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'genero') ? '?orden=genero&by=genero' : '?orden=genero' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por GENERO">
					GEN <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'genero') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'genero') ? $orde : '' ?> 
			</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'fecha_nacimiento') ? '?orden=fecha_nacimiento&by=fecha_nacimiento' : '?orden=fecha_nacimiento' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por EDAD">
					EDAD <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'fecha_nacimiento') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'fecha_nacimiento') ? $orde : '' ?> 
			</a></th>

			<th scope="col"><a href="<?php echo $orden = (isset($_GET['orden']) && $_GET['orden'] == 'simpatia') ? '?orden=simpatia&by=simpatia' : '?orden=simpatia' ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por SIMPATIA">
			<i class="far fa-smile-wink"></i> <?php $orde = (isset($_GET['by']) && $_GET['by'] == 'simpatia') ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
				echo $ordem = (isset($_GET['orden']) && $_GET['orden'] == 'simpatia') ? $orde : '' ?> 
			</a></th>
			</tr>
	</thead>

	

	<tbody>
		<?php if(isset($ciudadanos)):
			foreach ($ciudadanos as $ciudadano):
				?>
				<tr>
					<td><?= $datos->DatoConfigurable($ciudadano, 'zona')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'seccion_electoral')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'manzana')?></td>
					<td></td>
					<td><?= $datos->DatosConfigurable($ciudadano, 'vulnerable', '<i class="fas fa-wheelchair"></i>', '<i class="fas fa-user-alt"></i>')?></td>
					<td><?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></td>
					<td><a href="<?php echo 'alta_ciudadano.php?id=' . $ciudadano['id_ciudadano'] ?>"><i class="fas fa-user-edit"></i></a></td>
					<td><?= $datos->DatosConfigurable($ciudadano, 'genero', '<i class="fas fa-female"></i>', '<i class="fas fa-male"></i>')?></td>
					<td><?= $datos->Edad($ciudadano, 'fecha_nacimiento')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'simpatia')?></td>
				</tr>
			<?php endforeach;
		endif ?>
	</tbody>
</table>


