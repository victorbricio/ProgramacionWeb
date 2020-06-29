<?php

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$acepta = false;

$conexion = new PDO($dns, $usuario, $contrasenya);

$data = [
	'usuario' => $_POST['usuario'],
	'contrasenya' => $_POST['contrasenya'],
];

$consulta = "select *  from Usuario where usuario=:usuario";

$sentencia = $conexion->prepare($consulta);

$sentencia->bindValue(":usuario", $data['usuario'], PDO::PARAM_STR);

$sentencia->execute();

foreach ($sentencia->fetchAll() as $identificacion){
	if ($identificacion['contrasenya'] == $data['contrasenya'])
		$acepta = true;
}

session_start();

$_SESSION['mal'] = "bien";

if ($acepta){

	$_SESSION['usuario_actual'] = $_POST['usuario'];

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
}

else{

	$_SESSION['mal'] = "mal";

	echo "<html>
		<head>
		</head>

		<script type=\"text/javascript\"> 
			function volver(){
		    		window.open(\"index.php\", \"_self\");
			}
		</script>

		<body onload=\"volver()\">
		</body>
	     </html>";
}

?>
