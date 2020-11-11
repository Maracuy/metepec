<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}


$consulta_procesos = "SELECT c.* FROM ciudadanos c WHERE c.id_ciudadano IN (SELECT id_alta FROM altas WHERE exito = 0);";
$sql_query_procesos = $con->prepare($consulta_procesos);
$sql_query_procesos->execute();
$procesos = $sql_query_procesos->fetchALL();



$consulta_beneficiarios = "SELECT c.* FROM ciudadanos c WHERE c.id_ciudadano IN (SELECT id_alta FROM altas WHERE exito = 1);";
$sql_query_beneficiarios = $con->prepare($consulta_beneficiarios);
$sql_query_beneficiarios->execute();
$beneficiarios = $sql_query_beneficiarios->fetchALL();



$consulta_ciudadanos = "SELECT c.* FROM ciudadanos c WHERE id_ciudadano NOT IN (SELECT id_alta FROM altas);";
$sql_query_ciudadanos = $con->prepare($consulta_ciudadanos);
$sql_query_ciudadanos->execute();
$ciudadanos = $sql_query_ciudadanos->fetchALL();



$consulta_integrantes = "SELECT c.* FROM ciudadanos c WHERE c.nivel != 10;";
$sql_query_integrantes = $con->prepare($consulta_integrantes);
$sql_query_integrantes->execute();
$integrantes = $sql_query_integrantes->fetchALL();



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
			<th scope="col">Inscribir</th>
			<th scope="col">Prog. Federal</th>
			<th scope="col">Prog. Estatal</th>
			<th scope="col">Prog. Municipal</th>
			<th scope="col">Apoyos</th>
		</tr>
	</thead>

	<tbody>
		<?php if(isset($procesos)): 
			foreach ($procesos as $proceso):
				$id_colonia = $proceso['id_colonia'];?>
        <tr>
			<td><?php echo $proceso['zona'] ?></td>
			<td><?php echo $proceso['seccion_electoral'] ?></td>
			<td><?php echo $colonia = ($proceso['id_colonia'] != 1 || $proceso['id_colonia'] != '') ? ($colonias[$id_colonia]['nombre_colonia'] ) : $proceso['otra_colonia']?></td>
			<td><?php echo $proceso['manzana'] ?></td>
			<td><?php echo $proceso['posicion'] ?></td>
			<td><?php echo $vul = ($proceso['vulnerable'] == 1) ? 'SI' : 'NO' ?></td>
			<td><?php echo $proceso['nombres'] . " " . $proceso['apellido_p'] . " " . $proceso['apellido_m'] ?></td>
			<td><a href="<?php echo 'alta_ciudadano.php?id=' . $proceso['id_ciudadano'] ?>"><i class="fas fa-id-card"></i></a></td>
			<td><?php echo $genero = ($proceso['genero'] == 0) ? "M" : "H" ?></td>
			<td><?php echo $edad = ($proceso['fecha_nacimiento'] != "" && $proceso['fecha_nacimiento'] != "0000-00-00") ? (date('Y') - date("Y",strtotime($proceso['fecha_nacimiento']))) : "" ?></td>
			<td><i class="fas fa-user-friends"></i></td>
			<td><?php echo $simpatia = ($proceso['simpatia'] != 0) ? $proceso['simpatia'] : '<a href="simpatia.php?id='.$proceso['id_ciudadano'].'"><i class="fas fa-sliders-h"></i></a>' ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php endforeach;
		endif ?>

		<?php if(isset($beneficiarios)): ?>
		<tr>
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
			<td></td>
			<td></td>
		</tr>
		<?php endif ?>
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
					<td><?php echo $genero = ($ciudadano['genero'] == 0) ? "M" : "H" ?></td>
					<td><?php echo $edad = ($ciudadano['fecha_nacimiento'] != "" && $ciudadano['fecha_nacimiento'] != "0000-00-00") ? (date('Y') - date("Y",strtotime($ciudadano['fecha_nacimiento']))) : "" ?></td>
					<td><i class="fas fa-user-friends"></i></td>
					<td><?php echo $simpatia = ($proceso['simpatia'] != 0) ? $proceso['simpatia'] : '<a href="simpatia.php?id='.$proceso['id_ciudadano'].'"><i class="fas fa-sliders-h"></i></a>' ?></td>
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

	</tbody>
</table>


