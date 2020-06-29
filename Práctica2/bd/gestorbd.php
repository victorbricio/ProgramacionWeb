<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="magic.css">
    <title>Colores de MTG</title>
  </head>
  <body>
	
	<!-- Header -->

    <header>
      <aside class="logo">
        <img src="../imagenes/colors.png" alt="Logo MTG" height="200" width="200">
      </aside>

      <br><br>
      <h1>Colores de Magic the Gathering</h1>
	
      <aside class="identificador">
        <p>¡¡Bienvenid@ 
	
	<?php
		session_start();

		echo $_SESSION['usuario_actual'];

		$_SESSION['actualtitulo'] = "";
	?>

	!!</p>
        <br><br>
	<p> 
	<a href=datospersonales.php>Datos Persolanes </a>
	</p>
	
	<a href="index.php">
		<input type="submit" name="log out" value="Log out">
	</a>
      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

	<!-- Creación de una nueva biblioteca -->

    <section id="biblioteca">
      <br><br><br><br><br>
      <br><br><br><br><br>
      <a href="crearbd.php">Crear nueva biblioteca digital</a>
      <br><br><br><br><br>
      <br><br><br><br><br>
    </section>

    <section id="mainscroll">
      <h2>Bibliotecas dadas de alta</h2>

	<?php
	$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
	$usuario = "pw47424585";
	$contrasenya = "47424585";

	$acepta = false;

	$conexion = new PDO($dns, $usuario, $contrasenya);

	$consulta = "select *  from Biblioteca";
	$resultado = $conexion->query($consulta);

	foreach ($resultado as $fila){
		$titulo = "\"" . $fila['titulo'] . "\"";
		echo "<br><br>
			<article>
				<form action=bd1.php method=post>
					<input type=hidden name=actualtitulo value =" .$fila['titulo']. ">
					<input type=hidden name=actualcolor value =" .$fila['color']. ">
					<input type=hidden name=actualimagen value =" .$fila['imagen']. ">
          				<input type=image src=\"../imagenes/" .$fila['imagen']. "\" height=100 width=100 class=Symbol onmouseover=show(" .$titulo. ")>	
				</form>

				<form action=bd1.php method=post>
					<input type=hidden name=actualtitulo value =" .$fila['titulo']. ">
					<input type=hidden name=actualcolor value =" .$fila['color']. ">
					<input type=hidden name=actualimagen value =" .$fila['imagen']. ">
					<input type=submit value=" .$fila['titulo']. " id=" .$fila['color']. ">
				</form>

				<p>
					<form action=borrarbd.php method=post>
						<input type=hidden name=actual value =" .$fila['titulo']. ">
				 		<input type=submit name=login value=Borrar>
					</form>
				 	<form action=editarbd.php method=post>
						<input type=hidden name=actualtitulo value =" .$fila['titulo']. ">
						<input type=hidden name=actualcolor value =" .$fila['color']. ">
						<input type=hidden name=actualimagen value =" .$fila['imagen']. ">
				 		<input type=submit name=login value=Editar>
					</form>
				</p>

				<br><br><br><br>
	      	</article>";
	}

	?>

    </section>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
	<!-- Footer -->

    <footer>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
	<?php
	$conexion2 = new PDO($dns, $usuario, $contrasenya);

	$consulta2 = "select *  from Recurso";
	$resultado2 = $conexion2->query($consulta2);

	$res = array();
	
	foreach ($resultado2 as $fila){
		array_push($res, [$fila['biblioteca'], $fila['titulo']]);
	}

	?>
	<script type="text/javascript">
		function show(titulo){
			var res = <?php echo json_encode($res); ?>;
			var resultado = [];
			var mensaje = "Biblioteca: " + titulo + "\n";

			for (let i = 0; i < res.length; i++){
				if (titulo == res[i][0]){
					resultado.push(res[i]);
				}
			}
			
			for (let i = 0; i < resultado.length; i++){
				mensaje += " -" + resultado[i][1] + "\n";
			}

			alert(mensaje);
		}
	</script>
</html>
