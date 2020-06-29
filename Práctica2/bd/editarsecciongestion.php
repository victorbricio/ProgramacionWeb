<?php

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

$data = [
	'titulo' => $_POST['titulo'],
	'nuevotitulo' => $_POST['nuevotitulo'],
	'descripcion' => $_POST['descripcion'],
	'actualtitulo' => $_POST['actualtitulo'],
];

$consulta = "update Seccion set titulo=:nuevotitulo, descripcion=:descripcion where biblioteca=:actualtitulo and titulo=:titulo";

$sentencia = $conexion->prepare($consulta);

$sentencia->bindValue(":titulo", $data['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(":nuevotitulo", $data['nuevotitulo'], PDO::PARAM_STR);
$sentencia->bindValue(":descripcion", $data['descripcion'], PDO::PARAM_STR);
$sentencia->bindValue(":actualtitulo", $data['actualtitulo'], PDO::PARAM_STR);


$sentencia->execute();

session_start();

$_SESSION['actualtitulo'] = $_POST['actualtitulo'];
$_SESSION['actualcolor'] = $_POST['actualcolor'];
$_SESSION['actualimagen'] = $_POST['actualimagen'];

echo "<html>
		<head>
		</head>

		<script type=\"text/javascript\"> 
			function volver(){
		    		window.open(\"bd1.php\", \"_self\");
			}
		</script>

		<body onload=\"volver()\">
		</body>
	     </html>";

?>
