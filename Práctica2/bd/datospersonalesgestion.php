<?php

session_start();

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

if ($_POST['contrasenya'] == ""){
	
	$data = [
		'usuario' => $_SESSION['usuario_actual'],
		'telefono' => $_POST['telefono'],
		'correo' => $_POST['correo'],
		'web' => $_POST['web'],
	];

	$consulta = "update Usuario set telefono=:telefono, correo=:correo, web=:web  where usuario=:usuario";

	$sentencia = $conexion->prepare($consulta);

	$sentencia->bindValue(":usuario", $data['usuario'], PDO::PARAM_STR);
	$sentencia->bindValue(":telefono", $data['telefono'], PDO::PARAM_INT);
	$sentencia->bindValue(":correo", $data['correo'], PDO::PARAM_STR);
	$sentencia->bindValue(":web", $data['web'], PDO::PARAM_STR);
	}

else{

	$data = [
		'usuario' => $_SESSION['usuario_actual'],
		'contrasenya' => $_POST['contrasenya'],
		'telefono' => $_POST['telefono'],
		'correo' => $_POST['correo'],
		'web' => $_POST['web'],
	];

	$consulta = "update Usuario set contrasenya=:contrasenya, telefono=:telefono, correo=:correo, web=:web  where usuario=:usuario";

	$sentencia = $conexion->prepare($consulta);

	$sentencia->bindValue(":usuario", $data['usuario'], PDO::PARAM_STR);
	$sentencia->bindValue(":contrasenya", $data['contrasenya'], PDO::PARAM_STR);
	$sentencia->bindValue(":telefono", $data['telefono'], PDO::PARAM_INT);
	$sentencia->bindValue(":correo", $data['correo'], PDO::PARAM_STR);
	$sentencia->bindValue(":web", $data['web'], PDO::PARAM_STR);
	}

$sentencia->execute();

echo "<html>
		<head>
		</head>

		<script type=\"text/javascript\"> 
			function volver(){
		    		window.open(\"gestorbd.php\", \"_self\");
			}
		</script>

		<body onload=\"volver()\">
		</body>
	     </html>";

?>
