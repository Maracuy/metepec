<?php
$stm = $con->query("SELECT id_ciudadano, nombres, apellido_p, apellido_m FROM ciudadanos");
$ciudadanos = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $con->query("SELECT zona, id_cordinador_zona_defenza FROM zonas");
$zonas = $stm->fetchAll(PDO::FETCH_ASSOC);
if (!$zonas) {
	echo "Algo salió muuuuuy mal, esto se va a autodestruir en 5, 4, 3, 2, 1....";
	die();
}
?>

<h4>Área de administración de la Defensa del Voto</h4>


<?php foreach($zonas as $zona):

	if($zona['id_cordinador_zona_defenza'] != NULL){
		$id_zona = $zona['zona'];
		$id_ciudadano = $zona['id_cordinador_zona_defenza'];
		$nombre_rz = $ciudadanos[$id_ciudadano-1]['nombres'] . " " . $ciudadanos[$id_ciudadano-1]['apellido_p'] . " " . $ciudadanos[$id_ciudadano-1]['apellido_m'];
		$link_delete = '<a href="delete_defensasql.php?cargo=rz&id=<?php echo $id_ciudadano?>"> <i class="fas fa-trash blackiconcolor"></i> </a>';
		$link_add = '<a href="add_defensasql.php?cargo=rz&id=<?php echo $id_ciudadano?>"> <i class="fas fa-plus blackiconcolor"></i> </a>';

		$nombre_rz = $nombre_rz . " " . ' ' . $link_delete;
	}else{
		$nombre_rz = ' '. $link_add;
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

					Representante Geral del la zona <?php echo $zona['zona'] ?>
					<?php
						$stm = $con->query("SELECT * FROM secciones WHERE id_representante_general = $id_representante");
						$secciones = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($secciones as $seccion):
						$id_seccion = $seccion['id']?>
						<div class="container-fluid bg-info bg-gradient text-light">

							<?php
							$stm = $con->query("SELECT * FROM casillas WHERE id_seccion = ");
							$casillas = $stm->fetchAll(PDO::FETCH_ASSOC);
							foreach ($secciones as $seccion):?>
								<div>

								</div>


							<?php ?>
						</div>

				</div>
			<?php endforeach ?>
	</div>
<br>		

<?php endforeach ?> <!-- Este es el foreach de las zonas -->
