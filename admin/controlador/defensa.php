<?php
$sentencia = 'SELECT p.*, 
c.id_ciudadano as id, c.nombres, c.apellido_p, c.apellido_m, c.id_colonia, c.seccion_electoral, c.id_registrante, c.origen, c.telefono, 
l.abreviatura, l.nombre_colonia
FROM puestos_defensa p
LEFT JOIN ciudadanos c ON p.id_ciudadano = c.id_ciudadano
LEFT JOIN colonias l ON c.id_colonia = l.id
';

$stm = $con->query($sentencia);
$puestos = $stm->fetchAll(PDO::FETCH_ASSOC);

include 'DefensaC.php';
$ciudadano = New Defensa;



$stm = $con->query("SELECT * FROM zonas");
$color_zonas = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<h4>Estructura Para La Defensa Del Voto</h4>

<table class="table">
	<tr>
	<?php
	$zon=0; 
	foreach($puestos as $puesto):
		if($puesto['zona'] != $zon):
			$zon++;
			$z = $puesto['id_defensa']?>
				<th> <a href="#<?=$z?>" class="btn" style="background-color: #<?=$color_zonas[$zon-1]['color']?>; color: white;"> <b> Zona <?= $color_zonas[$zon-1]['zona'] ?> </b></a></th>
		<?php endif;
	endforeach?>
	</tr>
</table>

<table class="table" id="myTable">
  <thead>
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Secc"  maxlength="4" size="4"></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th><input type="text" id="myInputnombre" onkeyup="nombre()" placeholder="Nombres"  maxlength="10" size="10"></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
    <tr>
		<th scope="col">(+)</th>
		<th scope="col">Sta</th>
		<th scope="col">Prev</th>
		<th scope="col">Origen</th>
		<th scope="col">Zn</th>
		<th scope="col">RG</th>
		<th scope="col">Secc</th>
		<th scope="col">Casilla</th>
		<th scope="col">Pos</th>
		<th scope="col">Col</th>
		<th scope="col">RFRN</th>
		<th scope="col">Nombre</th>
		<th scope="col">Tel</th>
		<th scope="col">Comp</th>
		<th scope="col">Afil</th>
		<th scope="col">Cap1</th>
		<th scope="col">Cap2</th>
		<th scope="col">Move</th>

	</tr>
	</thead>
	<tbody>
	<?php foreach($puestos as $puesto):
		$boton_conf = '<a href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';
		$boton_conf_elec = '<a href="electoral.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';

		if($puesto['id_ciudadano']){
			$ciudadano_ocupa_puesto = $puesto['id_ciudadano'];
		}

		$color = $ciudadano->Colores($puesto);

		?>
		
	<tr class="<?=$color?>">  								<!--  Aqui comienza el body de la tabla -->
		
<!-- Aqui van los botones de agregar o de borrar al ciudadano -->
		<td> 
			<!-- Aqui van el indice -->
		<a name="<?=$puesto['id_defensa']?>" id="<?=$puesto['id_defensa']?>"> </a>
		<?php if(!$puesto['id_ciudadano']):?>
				<button type="button" class="btn btn-primary btn-sm" onclick="numero(<?=$puesto['id_defensa']?>)" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button>
			<?php endif;
		if($puesto['id_ciudadano']):?>
			<a href="controlador/adddefensasql.php?id=<?=$puesto['id_defensa']?>&borrar=1" class="btn btn-primary btn-sm"> <i class="fas fa-trash"></i> </a> 
		<?php endif?>
		</td>
		
		<td> <?php if($puesto['id_ciudadano']):?>
		<a href="controlador/adddefensasql.php?id=<?=$puesto['id_defensa'] . '&status=' . $puesto['confirmacion']?>" class="btn btn-<?=($puesto['confirmacion'] == 1) ? 'success' : 'secondary' ?> btn-sm"> <i class="fas fa-dot-circle"></i></a>
		<?php endif ?>
		</td>
		<td><?php
			if ($puesto['id_ciudadano']) {
				if(isset($puesto['previo']) && $puesto['previo'] != ''){
					if(isset($puesto['previo']) && ($puesto['previo'] == 1)){
						echo $ciudadano->tooltipSimple("Previo", '<i class="fas fa-backward"> </i>');
					}else{
						echo $ciudadano->tooltipSimple("Nuevo", '<i class="fas fa-bell"> </i> </i>');
					}
				}else{
					echo '<a href="electoral.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';
				}
			}
			?></td>	
		<td> <?php
			if($puesto['id_ciudadano']){
				if(isset($puesto['id_ciudadano']['seccion_electoral'])){
					echo $puesto['id_ciudadano']['seccion_electoral'];
				}else{
					echo '<a href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';
				}
			}?></td>
		<td> <?=$puesto['zona']?> </td>
		<td> <?=$puesto['rg']?> </td>
		<td> <?=$puesto['seccion']?> </td>
		<td> <?=$puesto['casilla']?> </td>
		<td> <?=$ciudadano->posicion($puesto)?> </td>
		<?php if(!$puesto['id_ciudadano']){
			echo "<td> </td>";
			echo "<td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>";
		}?>
		
<?php if($puesto['id_ciudadano']):?>

	<td> <?=($puesto['abreviatura']) ? $puesto['abreviatura'] : $boton_conf?> </td>
	
	<td> <?php
			if(isset($puesto['origen'])){
				echo $puesto['origen'];
			}else{
				echo '<a href="alta_ciudadano.php?id=' . $puesto['id_ciudadano'] .'"><i class="fas fa-sliders-h"></i></a>';}?></td>
	
	<td> <?=$puesto['apellido_p'] . " " . $puesto['apellido_m'] . " " . $puesto['nombres']?> </td>

	<td><?=$puesto['telefono']?> </td>
	<td><?=($puesto['compromiso']) ? $puesto['compromiso'] : $boton_conf_elec?> </td>
	<td><?=($puesto['afiliacion']) ? $puesto['afiliacion'] : $boton_conf_elec?> </td>
	<td><?=$ciudadano->Capacitaciones($puesto['id_defensa'], $puesto['capacitacion1'], "1")?></td>
	<td> <span style="color: Tomato"> <?=$ciudadano->Capacitaciones($puesto['id_defensa'], $puesto['capacitacion2'], "2")?> </span> </td>
	<td><?= $ciudadano->Flechas($puesto)?></td>
	<td></td>		
</tr>
	<?php 
	endif;
	endforeach?>
  </tbody>
</table>



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






<script>
function numero(dato){
	casilla = dato;
}

function AgregarCiudadano(id) {
	if(confirm("Seguro que desea agregarlo a la casilla?")) document.location = 'controlador/adddefensasql.php?id=' + id +'&casilla=' + casilla +'&nuevo=1';
}




function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function nombre() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputnombre");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[11];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



</script>