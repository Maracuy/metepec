<?php

if($_POST){
  $datos = $_POST;

  var_dump($datos);

  $datos['casa'] =   intval($datos['casa']);

  $keys = array_keys($datos);
  $values = array_values($datos);
  $keysString = implode(",", $keys);
  echo $keysString;
  echo var_dump($values);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<form method="POST">

	<input type="text" name="nombre" id="nombre">
	<input type="text" name="telefono" id="telefono">
	<input type="text" name="texto" id="texto">
	<input type="text" name="casa" id="casa">

	<input type="submit" value="send">

</form>

</body>
</html>