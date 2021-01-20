<?php
$stm = $con->query("SELECT id_ciudadano, nombres, apellido_p, apellido_m, id_colonia FROM ciudadanos");
$ciudadanos = $stm->fetchAll(PDO::FETCH_ASSOC);
array_unshift($ciudadanos, 0);

$stm = $con->query("SELECT * FROM colonias");
$colonias = $stm->fetchAll(PDO::FETCH_ASSOC);




$stm = $con->query("SELECT * FROM zonas");
$zonas = $stm->fetchAll(PDO::FETCH_ASSOC);
if (!$zonas) {
	echo "Algo salió muuuuuy mal, esto se va a autodestruir en 5, 4, 3, 2, 1....";
	die();
}
include 'DefensaC.php';
$ciudadano = New Defensa;

?>

<h4>Área de administración de la Defensa del Voto</h4>

<?php foreach($zonas as $zona):
	$id_zona = $zona['zona'];
	$stm = $con->query("SELECT * FROM altas_defensa WHERE id_zona = $id_zona");
	$rzs = $stm->fetch(PDO::FETCH_ASSOC);

	$modalrz = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="zona(' . $zona['zona'] . ')" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button>';

	?>
		
	<div class="container-fluid bg-gradient text-light" style="background-color: #<?php echo $zona['color'] ?>;">
		<h3>Zona: <?php echo $zona['zona']?></h3> 
		<h6>RZ PRINCIPAL: 
			<?php 
			if($rzs){
				echo $ciudadanos[$rzs['id_ciudadano']]['nombres'] . " " . $ciudadanos[$rzs['id_ciudadano']]['apellido_p'] . " " .$ciudadanos[$rzs['id_ciudadano']]['apellido_m'];

			}
			else{
				echo $modalrz;
			}
			?> </h6>

			<?php
				$stm = $con->query("SELECT * FROM representantes_generales WHERE id_zona = $id_zona");
				$representantes = $stm->fetchAll(PDO::FETCH_ASSOC);
				foreach($representantes as $representante):
					$id_representante = $representante['id_representante_general']?>
					<div class="container-fluid bg-gradient text-light" style="background-color: #<?php echo $representante['color'] ?>;">
						
						<?php
						$stm = $con->query("SELECT * FROM altas_defensa WHERE id_rg = $id_representante");
						$rgs = $stm->fetch(PDO::FETCH_ASSOC);
						echo "<h6>RG PRINCIPAL: "; 
						$modalrg = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="representanteg(' . $representante['representante_general'] . ')" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button>';
								if($rgs){
									echo $ciudadanos[$rgs['id_ciudadano']]['nombres'] . " " . $ciudadanos[$rgs['id_ciudadano']]['apellido_p'] . " " .$ciudadanos[$rgs['id_ciudadano']]['apellido_m'];
									echo "</h6>";
								}
								else{
									echo $modalrg;
								}
						$stm = $con->query("SELECT * FROM secciones WHERE id_representante_general = $id_representante");
						$secciones = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($secciones as $seccion):
						$id_seccion = $seccion['seccion']?>
						<div class="container-fluid bg-gradient text-light">
							
							Seccion: <?php echo $seccion['seccion'] ?>

							<table class="table">
											<thead>
												<tr>
												<th scope="col">Puesto</th>
												<th scope="col">Col</th>
												<th scope="col">Local</th>
												<th scope="col">Prev</th>
												<th scope="col">Comp</th>
												<th scope="col">Nombre</th>
												<th scope="col">UP</th>
												<th scope="col">Origen</th>
												<th scope="col">Afiliación</th>
												<th scope="col">Beneficios</th>
												<th scope="col">Colaboración</th>
												<th scope="col">Capacitaciones</th>
												<th scope="col">Cubre</th>
												<th scope="col">Promo</th>
												</tr>
											</thead>
							</table>

							<?php
							$stm = $con->query("SELECT * FROM casillas WHERE id_seccion = $id_seccion");
							$casillas = $stm->fetchAll(PDO::FETCH_ASSOC);

							foreach ($casillas as $casilla):
							$id_casilla = $casilla['id_casilla']?>
								<div class="container-fluid text-light">
									Casilla: <?php echo $casilla['tipo_casilla'] ?> <br>

										<table>
											<tbody>
												<?php
													$stm = $con->query("SELECT * FROM puestos_defensa_casillas WHERE id_casilla = $id_casilla");
													$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);
													foreach($puestos as $puesto):
														$id_puesto = $puesto['id_puesto'];
														$stm = $con->query("SELECT * FROM altas_defensa WHERE id_puesto = $id_puesto");
														$alta = $stm->fetch(PDO::FETCH_ASSOC);
														$col = (isset($ciudadanos[$alta['id_ciudadano']]['id_colonia']) && $ciudadanos[$alta['id_ciudadano']]['id_colonia'] != '') ? $ciudadanos[$alta['id_ciudadano']]['id_colonia'] : '';

														$linkBorrar = $ciudadano->linkBorrar($alta['id_ciudadano'], $puesto['tipo_puesto']);
														$linkAgregar = $ciudadano;
														$modal = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="numero(' . $puesto['id_puesto'] . ')" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button>';
												?>
												
												<tr>
												<td><?php echo $puesto['nombre_puesto'] ?></td>
												<td><?php echo $colo = (isset($col) && $col != '') ? $colonias[$col]['abreviatura'] : '' ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td><?php echo $name = ($alta['id_ciudadano'] != '') ? $ciudadanos[$alta['id_ciudadano']]['nombres'] . " " . $ciudadanos[$alta['id_ciudadano']]['apellido_p'] . " " .$ciudadanos[$alta['id_ciudadano']]['apellido_m'] : "" ?></td>
												<td></td>
												<td></td>
												<td><?php echo $link = ($alta['id_ciudadano'] == '' ) ? $modal : $linkBorrar ?></td>

												</tr>
												<?php endforeach?>
											</tbody>
										</table>

								</div>
							<?php endforeach ?>
						</div>
					<?php endforeach ?>
				</div>
			<?php endforeach ?>
	</div>
<br>		

<?php endforeach ?> <!-- Este es el foreach de las zonas -->

<script>
var casilla;
var rz;
var rg;

function borrarCiudadano(id) {
    if(confirm("my text here")) document.location = 'http://stackoverflow.com?id=' + id;
}

function numero(dato){
	casilla = dato;
}

function zona(dato){
	rz = dato;
}

function representanteg(dato){
	rg = dato;
}

function deleteall(){
	casilla = null;
	rz = null;
	rg = null;
}

function AgregarCiudadano(id) {
	if(rz != null){
		if(confirm("Seguro que desea agregarlo como RZ?")) document.location = 'controlador/adddefensasql.php?id=' + id +'&rz=' + rz;
	}else if(rg != null){
		if(confirm("Seguro que desea agregarlo como RG?")) document.location = 'controlador/adddefensasql.php?id=' + id +'&rg=' + rg;
	}else if(casilla != null)
	if(confirm("Seguro que desea agregarlo a la casilla?")) document.location = 'controlador/adddefensasql.php?id=' + id +'&casilla=' + casilla +'&nuevo=1';
}
</script>


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
