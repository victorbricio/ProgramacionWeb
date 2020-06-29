<?php

/*$current_directory = getcwd();
$target_dir = '../imagenes/';

$uploadPath = $target_dir . basename($_FILES["imagen"]["name"]);


if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadPath)){
	echo "OK";
}

else
	echo "NO OK";*/

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

$data = [
	'titulo' => $_POST['titulo'],
	'color' => $_POST['color'],
	'imagen' => $_FILES["imagen"]["name"],
];

$consulta = "INSERT INTO Biblioteca VALUES (:titulo, :color, :imagen)";

$stmt = $conexion->prepare($consulta);
$stmt->execute($data);

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
