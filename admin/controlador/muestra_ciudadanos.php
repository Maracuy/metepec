<?php
if (empty($_SESSION['user'])){
    echo "no estas registrado";
    die();
}


$consulta_ciudadanos = "SELECT * FROM ciudadanos";
$sql_query_ciudadanos = $con->prepare($consulta_ciudadanos);
$sql_query_ciudadanos->execute();
$ciudadanos = $sql_query_ciudadanos->fetchALL();


$sql_colonias = $con->prepare("SELECT * FROM colonias");
$sql_colonias->execute();
$colonias = $sql_colonias->fetchALL();
?>

<a href="../admin/alta_ciudadano.php"><button type="button" class="btn btn-primary btn-lg mt-3">Nuevo Ciudadano</button></a>

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col"><a href="?zona=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por ZONA"> Z </a></th>
			<th scope="col"><a href="?seccion=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por SECCIÓN"> SECC </a></th>
			<th scope="col"><a href="?colonia=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por COLONIA"> COL </a></th>
			<th scope="col"><a href="?manzana=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por MANZANA"> MZ </a></th>
			<th scope="col"><a href="?posicion=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por POSICION EN ELECCIONES"> <i class="fas fa-vote-yea"></i> </a></th>
			<th scope="col"><a href="?vulnerable=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por VULNERABLE"> <i class="fas fa-wheelchair"></i> </a></th>
			<th scope="col"><a href="?nombre=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por NOMBRE"> Nombre </a></th>
			<th scope="col">Edit</th>
			<th scope="col">Gen</th>
			<th scope="col"><a href="?edad=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Organizar por NOMBRE"> Edad </a></th>
			<th scope="col"><a href="?org=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="ORGANIZACION"> Org </a></th>
			<th scope="col"><a href="?simpatia=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="SIMPATIA"> Simp </a></th>
			<th scope="col"><a href="?proceso=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Programas Federales"> PROCE </a></th>
			<th scope="col"><a href="?federal=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Programas Federales"> FED </a></th>
			<th scope="col"><a href="?estatal=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Programas Estatales"> EST </a></th>
			<th scope="col"><a href="?municipal=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Programas Municipales"> MUN </a></th>
			<th scope="col"><a href="?apoyos=1" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Apoyos"> APY </a></th>
		</tr>
	</thead>

	<tbody>
		<?php if(isset($ciudadanos)):
			foreach ($ciudadanos as $ciudadano):
				echo '<tr>';
				$id_ciudadano = $ciudadano['id_ciudadano'];
				$id_colonia = $ciudadano['id_colonia'];
				$year = $ciudadano['fecha_nacimiento'];
				
				$stm = $con->query("SELECT * FROM altas WHERE id_ciudadano = $id_ciudadano");
				$programas = $stm->fetchAll(PDO::FETCH_ASSOC);

				$stm = $con->query("SELECT a.*, p.* FROM altas a, programas_federales p WHERE a.id_ciudadano = $id_ciudadano AND p.id_programa_federal = a.id_programa_f");
				$federales = $stm->fetchAll(PDO::FETCH_ASSOC);
				$stm = $con->query("SELECT count(id_programa_f) FROM altas WHERE id_ciudadano = $id_ciudadano");
				$numero_federales = $stm->fetch();

				$stm = $con->query("SELECT a.*, p.* FROM altas a, programas_estatales p WHERE a.id_ciudadano = $id_ciudadano AND p.id_programa_estatal = a.id_programa_e");
				$estatales = $stm->fetchAll(PDO::FETCH_ASSOC);
				$stm = $con->query("SELECT count(id_programa_e) FROM altas WHERE id_ciudadano = $id_ciudadano");
				$numero_estatales = $stm->fetch();

				$stm = $con->query("SELECT a.*, p.* FROM altas a, programas_municipales p WHERE a.id_ciudadano = $id_ciudadano AND p.id_programa_municipal = a.id_programa_m");
				$municipales = $stm->fetchAll(PDO::FETCH_ASSOC);
				$stm = $con->query("SELECT count(id_programa_m) FROM altas WHERE id_ciudadano = $id_ciudadano");
				$numero_municipales = $stm->fetch();

				$stm = $con->query("SELECT a.*, p.* FROM altas a, programas_municipales p WHERE a.id_ciudadano = $id_ciudadano AND p.id_programa_municipal = a.id_programa_m AND exito = 0");
				$procesos = $stm->fetchAll(PDO::FETCH_ASSOC);
				$stm = $con->query("SELECT count(id_alta) FROM altas WHERE id_ciudadano = $id_ciudadano AND exito = 0");
				$numero_procesos = $stm->fetch();
				
				$stm = $con->query("SELECT * FROM peticiones WHERE id_ciudadano = $id_ciudadano");
				$peticiones = $stm->fetchAll(PDO::FETCH_ASSOC);
				$stm = $con->query("SELECT count(id_peticion) FROM peticiones WHERE id_ciudadano = $id_ciudadano");
				$numero_peticiones = $stm->fetch();

				?>
					<td><?php echo $ciudadano['zona'] ?></td>
					<td><?php echo $ciudadano['seccion_electoral'] ?></td>
					<td><?php echo $colonia = ($ciudadano['id_colonia'] != 1 && $ciudadano['id_colonia'] != '') ? ($colonias[$id_colonia -1]['nombre_colonia'] ) : $ciudadano['otra_colonia']?></td>
					<td><?php echo $ciudadano['manzana'] ?></td>
					<td><?php echo $ciudadano['posicion'] ?></td>
					<td><?php echo $vul = ($ciudadano['vulnerable'] == 1) ? '<i class="fas fa-wheelchair"></i>' : 'NO' ?></td>
					<td><?php echo $ciudadano['nombres'] . " " . $ciudadano['apellido_p'] . " " . $ciudadano['apellido_m'] ?></td>
					<td><a href="<?php echo 'alta_ciudadano.php?id=' . $ciudadano['id_ciudadano'] ?>"><i class="fas fa-id-card"></i></a></td>
					<td><?php echo $genero = ($ciudadano['genero'] == 0) ? "<i class='fas fa-female'></i>" : "<i class='fas fa-male'></i>" ?></td>
					<td><?php echo $edad = ($ciudadano['fecha_nacimiento'] != "" && $ciudadano['fecha_nacimiento'] != "0000-00-00") ? (date('Y') - date("Y",strtotime($ciudadano['fecha_nacimiento']))) : "" ?></td>
					<td><i class="fas fa-user-friends"></i></td>
					<td><?php echo $simpatia = ($ciudadano['simpatia'] != 0) ? $ciudadano['simpatia'] : '<a href="simpatia.php?id='.$ciudadano['id_ciudadano'].'"><i class="fas fa-sliders-h"></i></a>' ?></td>
					<td><a href="programas.php?id=<?php echo $ciudadano['id_ciudadano']?>">
						<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" data-placement="top" title="
						<?php
						foreach($procesos as $proceso){
							echo $proceso['nombre'] . "<br>";
						}
						?>">
							<?php echo $numero_procesos[0]; ?>
						</button></a>
					</td>
					<td><a href="programas.php?id=<?php echo $ciudadano['id_ciudadano']?>">
						<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" data-placement="top" title="
						<?php
						foreach($federales as $federal){
							echo $federal['nombre'] . "<br>";
						}
						?>">
							<?php echo $numero_federales[0]; ?>
						</button></a>
					</td><!-- Aqui van los programas federales, tambien hay que contar -->
					<td><a href="programas.php?id=<?php echo $ciudadano['id_ciudadano']?>">
						<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" data-placement="top" title="
						<?php
						foreach($estatales as $estatal){
							echo $estatal['nombre'] . "<br>";
						}
						?>">
							<?php echo $numero_estatales[0]; ?>
						</button></a>
					</td>
					<td><a href="programas.php?id=<?php echo $ciudadano['id_ciudadano']?>">
						<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" data-placement="top" title="
						<?php
						foreach($municipales as $municipal){
							echo $municipal['nombre'] . "<br>";
						}
						?>">
							<?php echo $numero_municipales[0]; ?>
						</button></a>
					</td>
					<td><a href="peticiones.php?id=<?php echo $ciudadano['id_ciudadano']?>">
						<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" data-placement="top" title="Ver Peticiones">
							<?php echo $numero_peticiones[0]; ?>
						</button></a>
					</td>
				</tr>
			<?php endforeach;
		endif ?>
	</tbody>
</table>


