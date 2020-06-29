<?php

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

$data = [
	'usuario' => $_POST['usuario'],
	'contrasenya' => $_POST['contrasenya'],
	'telefono' => 0,
	'correo' => "",
	'web' => "",
];



/// Si las contraseñas no son iguales vuelve

session_start();

$_SESSION['contrasenyas_distintas'] = "no";

if ($data['contrasenya'] != $_POST['contrasenya2']){
	$_SESSION['contrasenyas_distintas'] = "si";

	echo "<html>
		<head>
		</head>

		<script type=\"text/javascript\"> 
			function volver(){
		    		window.open(\"registro.php\", \"_self\");
			}
		</script>

		<body onload=\"volver()\">
		</body>
	     </html>";
}

else{

	$consulta = "INSERT INTO Usuario VALUES (:usuario, :contrasenya, :telefono, :correo, :web)";

	$stmt = $conexion->prepare($consulta);
	$stmt->execute($data);

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
