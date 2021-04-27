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
		$extra3 = "AND c.nivel != 0";
	}
	if($nivel_admin == 6){ // Quiere decir que es RG
		$zona = $data_usuario['rg'];
		$extra = "WHERE d.zona = " . $zona;
		$extra2 = "WHERE id_registrante = $id_admin";
		$extra3 = "AND c.nivel != 0";
	}

}else{
	$extra = '';
	$extra2 = '';
	$extra3 = "";
}

$sentencia = "SELECT 
c.id_ciudadano, c.nombres, c.apellido_p, c.apellido_m, c.telefono, c.seccion_electoral, c.zona, c.manzana, c.vulnerable, c.genero, c.fecha_nacimiento, c.simpatia,
d.casilla, d.puesto, d.rg
FROM puestos_defensa d
INNER JOIN ciudadanos c ON c.id_ciudadano = d.id_ciudadano $extra AND c.borrado != 1 $extra3";
$sql_query = $con->prepare($sentencia);
$sql_query->execute();
$ciudadanos = $sql_query->fetchALL();

//Ahora extraemos los datos desde los ciudadanos
$sql_query = $con->prepare("SELECT c.id_ciudadano, c.nombres, c.apellido_p, c.apellido_m, c.telefono, c.seccion_electoral, c.zona, c.manzana, c.vulnerable, c.genero, c.fecha_nacimiento, c.simpatia FROM ciudadanos c $extra2 $extra3");
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
		</tr>
	</thead>

	

	<tbody>
		<?php if(isset($ciudadanos)):
			foreach ($ciudadanos as $ciudadano):
				?>
				<tr>
					<td><?= $datos->DatoConfigurable($ciudadano, 'seccion_electoral')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'manzana')?></td>
					<td><?= $datos->DatosConfigurable($ciudadano, 'vulnerable', '<i class="fas fa-wheelchair"></i>', '<i class="fas fa-user-alt"></i>')?></td>
					<td><?= $datos->Posicion($ciudadano) ?></td>
					<td><?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></td>
					<td><a href="<?php echo 'alta_ciudadano.php?id=' . $ciudadano['id_ciudadano'] ?>"><i class="fas fa-user-edit"></i></a></td>
					<td><?= $datos->DatosConfigurable($ciudadano, 'genero', '<i class="fas fa-venus"></i>', '<i class="fas fa-mars"></i>')?></td>
					<td><?= $datos->Edad($ciudadano, 'fecha_nacimiento')?></td>
					<td><?= $datos->DatoConfigurable($ciudadano, 'simpatia')?></td>
				</tr>
			<?php endforeach;
		endif ?>
	</tbody>
</table>

