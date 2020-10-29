<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}

/* $consulta_procesos = "SELECT c.*, co.*, a.* FROM ciudadanos c, colonias co, altas a WHERE c.id_ciudadano = a.id_ciudadano AND c.id_colonia = co.id AND a.id_programa = p.id_programa GROUP BY b.id_beneficiario ORDER BY b.id_beneficiario DESC";
$sql_query_procesos = $con->prepare($consulta);
$sql_query_procesos->execute();
$procesos = $sql_query_procesos->fetchALL();



$consulta_beneficiarios = "SELECT b.id_beneficiario, b.nombres, b.apellido_p, b.apellido_m, b.id_colonia, b.otra_colonia, b.telefono, p.id_programa, p.abreviatura, p.nombre, c.nombre_colonia, a.id_alta, a.id_beneficiario FROM beneficiarios b, programas_ciudadanos p, colonias c, altas a WHERE b.id_beneficiario = a.id_beneficiario AND b.id_colonia = c.id AND a.id_programa = p.id_programa GROUP BY b.id_beneficiario ORDER BY b.id_beneficiario DESC";
$sql_query_beneficiarios = $con->prepare($consulta);
$sql_query_beneficiarios->execute();
$beneficiarios = $sql_query_beneficiarios->fetchALL(); */



$consulta_ciudadanos = "SELECT c.* FROM ciudadanos c WHERE id_ciudadano NOT IN (SELECT id_alta FROM altas);";
$sql_query_ciudadanos = $con->prepare($consulta_ciudadanos);
$sql_query_ciudadanos->execute();
$ciudadanos = $sql_query_ciudadanos->fetchALL();



/* $consulta_servidores = "SELECT b.id_beneficiario, b.nombres, b.apellido_p, b.apellido_m, b.id_colonia, b.otra_colonia, b.telefono, p.id_programa, p.abreviatura, p.nombre, c.nombre_colonia, a.id_alta, a.id_beneficiario FROM beneficiarios b, programas_ciudadanos p, colonias c, altas a WHERE b.id_beneficiario = a.id_beneficiario AND b.id_colonia = c.id AND a.id_programa = p.id_programa GROUP BY b.id_beneficiario ORDER BY b.id_beneficiario DESC";
$sql_query_servidores = $con->prepare($consulta);
$sql_query_servidores->execute();
$servidores = $sql_query_servidores->fetchALL(); */



$sql_colonias = $con->prepare("SELECT * FROM colonias");
$sql_colonias->execute();
$colonias = $sql_colonias->fetchALL();


?>


<a href="../admin/alta_ciudadano.php"><button type="button" class="btn btn-primary btn-lg mt-3">Nuevo Ciudadano</button></a>




<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Zona</th>
			<th scope="col">Secc</th>
			<th scope="col">Colonia</th>
			<th scope="col">Manzana</th>
			<th scope="col">Pos Elec</th>
			<th scope="col">Vulnerable</th>
			<th scope="col">Nombre</th>
			<th scope="col">Perfil</th>
			<th scope="col">Genero</th>
			<th scope="col">Edad</th>
			<th scope="col">Organizacion</th>
			<th scope="col">Simpatia</th>
			<th scope="col">Procesos</th>
			<th scope="col">Iscribir</th>
			<th scope="col">Prog. Federal</th>
			<th scope="col">Prog. Estatal</th>
			<th scope="col">Prog. Municipal</th>
			<th scope="col">Recibio 1</th>
			<th scope="col">Recibio 2</th>
			<th scope="col">Recibio 3</th>
			<th scope="col">Recibio 4</th>
			<th scope="col">Recibio 5</th>
			<th scope="col">Apoyo 1</th>
			<th scope="col">Apoyo 2</th>
			<th scope="col">Apoyo 3</th>
			<th scope="col">Apoyo 4</th>
			<th scope="col">Capt</th>
			<th scope="col">Edit</th>
		</tr>
	</thead>

	<tbody>
		<?php if(isset($procesos)): ?>
        <tr>
			<td></td>
			<td>1</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php endif ?>

		<?php if(isset($beneficiarios)): ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>12</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php endif ?>
<!-- nodos 0382 -->
		<?php if(isset($ciudadanos)):
			foreach ($ciudadanos as $ciudadano):
				$id_colonia = $ciudadano['id_colonia'];
				$year = $ciudadano['fecha_nacimiento'];?>

				<tr>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['seccion_electoral'] ?></td>
					<td><?php echo $colonia = ($ciudadano['id_colonia'] != 1 && $ciudadano['id_colonia'] != '') ? ($colonias[$id_colonia -1]['nombre_colonia'] ) : $ciudadano['otra_colonia']?></td>
					<td><?php echo $ciudadano['manzana'] ?></td>
					<td><?php echo $ciudadano['posicion'] ?></td>
					<td><?php echo $vul = ($ciudadano['vulnerable'] == 1) ? 'SI' : 'NO' ?></td>
					<td><?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></td>
					<td><a href="<?php echo 'alta_ciudadano.php?id=' . $ciudadano['id_ciudadano'] ?>"><i class="fas fa-id-card"></i></a></td>
					<td><?php echo $ciudadano['genero'] ?></td>
					<td><?php echo $edad = ($ciudadano['fecha_nacimiento'] != "") ? (date('Y') - date("Y",strtotime($ciudadano['fecha_nacimiento']))) : "" ?></td>
					<td><i class="fas fa-user-friends"></i></td>
					<td><?php echo 'pendiente' ?></td>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['zona'] ?></td>
				</tr>
			<?php endforeach;
		endif ?>

		<?php if(isset($servidores)): ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>32</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php endif ?>

	</tbody>
</table>


