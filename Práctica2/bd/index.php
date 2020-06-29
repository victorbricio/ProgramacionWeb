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

	<!-- Login-->

	<?php
		session_start();

		if (isset($_SESSION['mal'])){
			if ($_SESSION['mal'] == "mal"){
				echo "<p>Te has equivocado en algo.</p>";
			}
		}
	?>

      <aside class=identificador>
	<form action="entrar.php" method="post">
		<label for="usuario">Usuario</label><br>
		<input type="text" name="usuario" id="usuario" value="" required><br>

		<label for="contrasenya">Contrase&ntilde;a</label><br>
		<input type="password" name="contrasenya" id="contrasenya" value="" required><br>

		<a>
		  <input type="submit" name="login" value="Entrar">
		</a>
	</form>
	
	<!-- Registro-->
	<a href="registro.php">
          <input type="submit" name="login" value="Registrar">
        </a>
	
      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

	<!-- Imagen representativa-->
    <section id="biblioteca">
      <img src="../imagenes/magic.jpg" alt="Magic" height="400" width="620">
    </section>

	<!-- Scroll principal con los cinco colores-->
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
		echo "<br><br><br>
			<article>
          			<img src=\"../imagenes/" .$fila['imagen']. "\" height=100 width=100 class=Symbol onmouseover=show(" .$titulo. ")>

          			<h3 class=\"manaSymbol\" id=\" " .$fila['color']. " \"> " .$fila['titulo']. " </h3>

				<br><br><br><br><br><br><br><br><br>
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
