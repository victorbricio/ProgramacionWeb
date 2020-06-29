<?php

$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
$usuario = "pw47424585";
$contrasenya = "47424585";

$conexion = new PDO($dns, $usuario, $contrasenya);

$consulta = "select *  from Recurso where biblioteca=:biblioteca and seccion=:seccion";
$sentencia = $conexion->prepare($consulta);
$sentencia->bindValue(":biblioteca", $_POST['actualtitulo'], PDO::PARAM_STR);
$sentencia->bindValue(":seccion", $_POST['seccion'], PDO::PARAM_STR);
$sentencia->execute();

$contador_seccion = 0;

foreach ($sentencia->fetchAll() as $fila){
	$contador_seccion++;
}

$conexion1 = new PDO($dns, $usuario, $contrasenya);

$consulta1 = "select *  from Recurso where biblioteca=:biblioteca";
$sentencia1 = $conexion1->prepare($consulta1);
$sentencia1->bindValue(":biblioteca", $_POST['actualtitulo'], PDO::PARAM_STR);
$sentencia1->execute();

$contador_biblioteca = 0;

foreach ($sentencia1->fetchAll() as $fila){
	$contador_biblioteca++;
}

$conexion2 = new PDO($dns, $usuario, $contrasenya);

$data = [
	'titulo' => $_POST['titulo'],
	'autor' => $_POST['autor'],
	'seccion' => $_POST['seccion'],
	'tipo' => $_POST['tipo'],
	'metadato1' => $_POST['metadato1'],
	'metadato2' => $_POST['metadato2'],
	'descripcion' => $_POST['descripcion'],
	'imagen' => $_FILES["imagen"]["name"],
	'actualtitulo' => $_POST['actualtitulo'],
	'id_seccion' => $contador_seccion + 1,
	'id_biblioteca' => $contador_biblioteca + 1,
];

$consulta2 = "INSERT INTO Recurso VALUES (:titulo, :autor, :seccion, :tipo, :metadato1, :metadato2, :descripcion, :imagen, :actualtitulo, :id_seccion, :id_biblioteca)";

$stmt = $conexion2->prepare($consulta2);
$stmt->execute($data);

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
