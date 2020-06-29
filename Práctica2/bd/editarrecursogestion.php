<?php

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

$data = [
	'titulo' => $_POST['titulo'],
	'nuevotitulo' => $_POST['nuevotitulo'],
	'autor' => $_POST['autor'],
	'seccion' => $_POST['seccion'],
	'tipo' => $_POST['tipo'],
	'metadato1' => $_POST['metadato1'],
	'metadato2' => $_POST['metadato2'],
	'descripcion' => $_POST['descripcion'],
	'imagen' => $_FILES["imagen"]["name"],
	'actualtitulo' => $_POST['actualtitulo'],
];

$consulta = "update Recurso set titulo=:nuevotitulo, autor=:autor, seccion=:seccion, tipo=:tipo, metadato1=:metadato1, metadato2=:metadato2, descripcion=:descripcion, imagen=:imagen where titulo=:titulo and biblioteca=:actualtitulo";

$sentencia = $conexion->prepare($consulta);

$sentencia->bindValue(":titulo", $data['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(":nuevotitulo", $data['nuevotitulo'], PDO::PARAM_STR);
$sentencia->bindValue(":autor", $data['autor'], PDO::PARAM_STR);
$sentencia->bindValue(":seccion", $data['seccion'], PDO::PARAM_STR);
$sentencia->bindValue(":tipo", $data['tipo'], PDO::PARAM_STR);
$sentencia->bindValue(":metadato1", $data['metadato1'], PDO::PARAM_STR);
$sentencia->bindValue(":metadato2", $data['metadato2'], PDO::PARAM_STR);
$sentencia->bindValue(":descripcion", $data['descripcion'], PDO::PARAM_STR);
$sentencia->bindValue(":imagen", $data['imagen'], PDO::PARAM_STR);
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
