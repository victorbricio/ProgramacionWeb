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
    </header>

    <br><br><br><br><br><br><br><br><br><br><br><br>

	<section class=centro>
		<?php
			session_start();

			if (isset($_SESSION['contrasenyas_distintas'])){
				if ($_SESSION['contrasenyas_distintas'] == "si"){
					echo "<p>Las contrase&ntilde;as son distintas.</p>";
				}
			}
		?>
		<form action="registrar.php" method="post">

			<label for="usuario">Usuario: </label>
			<input type="text" name="usuario" id="usuario" value="" required/><br>

			<label for="contrasenya">Contrase&ntilde;a: </label>
			<input type="password" name="contrasenya" id="contrasenya" value="" required/><br>

			<label for="contrasenya2">Repite la contrase&ntilde;a: </label>
			<input type="password" name="contrasenya2" id="contrasenya2" value="" required/><br>

			<input type="submit" name="registro" id="botonDeEnvio" value="Registrar" /><br>
		</form>
	</section>

	<br><br><br><br><br><br><br><br><br><br><br><br>

	<!-- Footer -->
    <footer>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
