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
		$nombre_cor = $ciudadanos[$id_ciudadano-1]['nombres'] . " " . $ciudadanos[$id_ciudadano-1]['apellido_p'] . " " . $ciudadanos[$id_ciudadano-1]['apellido_m'];
	}else{
		$nombre_cor = "Sin Cordinador de Zona";
	}
	?>
		
		
		Zona: <?php echo $zona['zona']?> | RZ: <?php echo $nombre_cor?> 


		<?php 
			$stm = $con->query("SELECT * FROM representantes_generales WHERE id_zona = $id_zona");
			$representantes = $stm->fetchAll(PDO::FETCH_ASSOC);	
			foreach($representantes as $representante):
		?>
		
				<article>
					<?php
						$id_representante = $representante['representante_general'];
						$stm = $con->query("SELECT * FROM secciones WHERE id_representante_general = $id_representante");
						$secciones = $stm->fetchAll(PDO::FETCH_ASSOC);	
						foreach($secciones as $seccion):
					?>
					Sección <?php echo $seccion['seccion']?>
					<?php endforeach?>
				</article>

		<?php endforeach?>
		
		

<?php endforeach ?>