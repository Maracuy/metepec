<?php
$stm = $con->query("SELECT id_ciudadano, nombres, apellido_p, apellido_m FROM ciudadanos");
$ciudadanos = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT zona, id_cordinador_zona_defenza FROM zonas");
$zonas = $stm->fetchAll(PDO::FETCH_ASSOC);
if (!$zonas) {
	echo "Algo salió muuuuuy mal, esto se va a autodestruir en 5, 4, 3, 2, 1....";
	die();
}
include 'DefensaC.php';
?>

<h4>Área de administración de la Defensa del Voto</h4>


<?php foreach($zonas as $zona):
	$id_zona = $zona['zona'];

	if($zona['id_cordinador_zona_defenza'] != NULL){
		$id_ciudadano = $zona['id_cordinador_zona_defenza'];
		$nombre_rz = $ciudadanos[$id_ciudadano-1]['nombres'] . " " . $ciudadanos[$id_ciudadano-1]['apellido_p'] . " " . $ciudadanos[$id_ciudadano-1]['apellido_m'];
		$link_add = '<a href="add_defensasql.php?cargo=rz&id=<?php echo $id_ciudadano?>"> <i class="fas fa-plus blackiconcolor"></i> </a>';

		$nombre_rz = $nombre_rz . " " . ' ' . $link_delete;
	}else{
		$nombre_rz = '';
	}
	?>
		
	<div class="container-fluid bg-info bg-gradient text-light">
		<h3>Zona: <?php echo $zona['zona']?></h3> <h6>RZ PRINCIPAL: <?php echo $nombre_rz ?> </h6>

			<?php
				$stm = $con->query("SELECT * FROM representantes_generales WHERE id_zona = $id_zona");
				$representantes = $stm->fetchAll(PDO::FETCH_ASSOC);

				foreach($representantes as $representante):
				$id_representante = $representante['id_representante_general'] ?>
				<div class="container-fluid bg-info bg-gradient text-light">

					RG<?php echo $representante['representante_general']?> aqui ponemos un boton para agregar un RG
					<?php
						$stm = $con->query("SELECT * FROM secciones WHERE id_representante_general = $id_representante");
						$secciones = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($secciones as $seccion):
						$id_seccion = $seccion['seccion']?>
						<div class="container-fluid bg-info bg-gradient text-light">
							
							Seccion: <?php echo $seccion['seccion'] ?>

							<?php
							$stm = $con->query("SELECT * FROM casillas WHERE id_seccion = $id_seccion");
							$casillas = $stm->fetchAll(PDO::FETCH_ASSOC);

							foreach ($casillas as $casilla):
							$id_casilla = $casilla['id_casilla']?>
								<div class="container-fluid bg-info bg-gradient text-light">
									Casilla: <?php echo $casilla['tipo_casilla'] ?> <br>

									<div class="container-fluid bg-info bg-gradient text-light">
										<table class="table">
											<thead>
												<tr>
												<th scope="col">Puesto</th>
												<th scope="col">Nombres</th>
												<th scope="col">Apellidos</th>
												<th scope="col">otros datos...</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$stm = $con->query("SELECT * FROM puestos_defensa WHERE id_casilla = $id_casilla");
													$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);
													foreach($puestos as $puesto):
														$ciudadano = New Defensa;
														$linkBorrar = $ciudadano->linkBorrar($puesto['id_ciudadano'], $puesto['tipo_puesto']);
														$linkAgregar = $ciudadano;
												?>
												<tr>
												<td><?php echo $puesto['nombre_puesto'] ?></td>
												<td><?php 
												if($puesto['id_ciudadano'] != ''){
													$ciudadanos[$puesto['id_ciudadano']-1]['nombres'];	
												}
												echo $name = ($puesto['id_ciudadano'] != '') ? $ciudadanos[$puesto['id_ciudadano']-1]['nombres'] : '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Agregar Ciudadano </button>' ?></td>
												<td><?php echo $name = ($puesto['id_ciudadano'] != '') ? $ciudadanos[$puesto['id_ciudadano']-1]['apellido_p'] : "" ?></td>
												<td><?php echo $name = ($puesto['id_ciudadano'] != '') ? $ciudadanos[$puesto['id_ciudadano']-1]['apellido_m'] : "" ?></td>
												<td><?php echo $linkBorrar ?></td>

												</tr>
												<?php endforeach?>
											</tbody>
										</table>

									</div>
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

function borrarCiudadano(id) {
    if(confirm("my text here")) document.location = 'http://stackoverflow.com?id=' + id;
}

</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>