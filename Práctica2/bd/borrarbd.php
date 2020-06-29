<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="magic.css">
    <title>Colores MTG</title>
  </head>
  <body>

	<!-- Header -->

    <header>
      <aside class="logo">
        <img src="../imagenes/colors.png" alt="logo MTG" height="200" width="200">
      </aside>

      <br><br>
      <h1>Colores de Magic the Gathering</h1>

      <aside class="identificador">
        <p><?php
		session_start();

		echo $_SESSION['usuario_actual'];

		$actual = $_POST['actual'];
	?></p>
      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

     <main>

	<h2>Borra una biblioteca digital</h2>

	<!-- Formulario-->
	<section class=sectionNormal>
		<form action="borrarbdgestion.php" method="post">
			<label>T&iacute;tulo:&nbsp;</label>
			<input type="text" name="titulo" value=<?php echo $actual; ?>><br>

		<p>Est&aacute;s a punto de eliminar esta base de datos. ¿Quieres hacerlo efectivo?</p>
		
			<!-- Botón de eliminar-->
			<a id="entrarDentro">
			  <input type="submit" name="login" value="Eliminar" id="entrarFuera">
			</a>
		</form>

		<!-- Botón de no eliminar-->
		<a href="gestorbd.php" id="entrarFuera">
		  <input type="submit" name="login" value="No" id="entrarDentro">
		</a>
	</section>
	<br><br><br><br><br>

     </main>	

	<!-- Footer -->

    <footer>
      <br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
