<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

require_once 'CiudadanosC.php';
$datos = new Datos();

$nivel_admin = $_SESSION['user']['nivel'];
$id_admin = $_SESSION['user']['id_ciudadano'];


require_once 'sql_ciudadanos.php';


?>

<div class="row">
	<div>
		<a href="../admin/alta_ciudadano.php"><button type="button" class="btn btn-primary btn-lg">Nuevo Ciudadano</button></a>
	</div>
	<div>
	Aqui va el texto de la estadistica
	</div>
</div>

<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>Seccion</th>
			<th>Col</th>
			<th>Mz</th>
			<th>Pos</th>
			<th>Vul</th>
			<th>Nombres</th>
			<th>Edit</th>
			<th>Edad</th>
			<th>Ref</th>
			<th>Simp</th>
			<th>c1</th>
			<th>c2</th>
		</tr>
	</thead>

	

	<tbody>
		<?php if(isset($ciudadanos)):
			foreach ($ciudadanos as $ciudadano):
				?>
				<tr>
					<td><?= $datos->DatoConfigurable($ciudadano, 'seccion_electoral')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'manzana')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'manzana')?></td>
					<td><?= $datos->DatosConfigurable($ciudadano, 'vulnerable', '<i class="fas fa-wheelchair"></i>', '<i class="fas fa-user-alt"></i>')?></td>
					<td><?= $datos->Posicion($ciudadano) ?></td>
					<td><?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></td>
					<td><a href="<?php echo 'alta_ciudadano.php?id=' . $ciudadano['id_ciudadano'] ?>"><i class="fas fa-user-edit"></i></a></td>
					<td><?= $datos->DatosConfigurable($ciudadano, 'genero', '<i class="fas fa-venus"></i>', '<i class="fas fa-mars"></i>')?></td>
					<td><?= $datos->Edad($ciudadano, 'fecha_nacimiento')?></td>
					<td><?= $datos->Capacitacion($ciudadano, 'cap1', 'success', 'secondary', '<i class="fas fa-chalkboard-teacher"></i>', 'Capacitada', 'Falta Capacitar')?></td>
					<td><?= $datos->Capacitacion($ciudadano, 'cap2', 'success', 'secondary', '<i class="fas fa-chalkboard-teacher"></i>', 'Capacitada', 'Falta Capacitar')?></td>
				</tr>
			<?php endforeach;
		endif ?>
	</tbody>
</table>

