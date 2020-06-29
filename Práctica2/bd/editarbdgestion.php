<?php

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

$data = [
	'titulo' => $_POST['titulo'],
	'color' => $_POST['color'],
	'imagen' => $_POST['imagen'],
];

$consulta = "update Biblioteca set imagen=:imagen, color=:color where titulo=:titulo";

$sentencia = $conexion->prepare($consulta);

$sentencia->bindValue(":titulo", $data['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(":color", $data['color'], PDO::PARAM_STR);
$sentencia->bindValue(":imagen", $data['imagen'], PDO::PARAM_STR);

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
