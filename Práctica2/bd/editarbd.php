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

		$actualtitulo = $_POST['actualtitulo'];
		$actualcolor = $_POST['actualcolor'];
		$actualimagen = $_POST['actualimagen'];
	?></p>
      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

     <main>

	<h2>Edita una biblioteca digital</h2>

	<!-- Imagen para seleccionar una imagen para la biblioteca -->

	<section id="biblioteca">
		<a href="crearbd.html">
          		<img src="../imagenes/subir.png" alt="upload resource" height="100" width="100">
        	</a>
		<p>Elige la imagen que va a represantar a la bibloteca digital</p>
	</section>

	<!-- Formulario-->
	<section id=recursos>
		<form action=editarbdgestion.php method=post>
			<label>T&iacute;tulo:&nbsp;</label>
			<input type="text" name="titulo" value="<?php echo $actualtitulo; ?>"><br>

			<label>Color del t&iacute;tulo:&nbsp;</label>
			<input type="text" name="color" value="<?php echo $actualcolor; ?>"><br>

			<label>Imagen:&nbsp;</label>
			<input type="text" name="imagen" value="<?php echo $actualimagen; ?>"><br>

			<!-- Botón-->
			<a id="entrarFuera">
			  <input type="submit" name="login" value="Editar" id="entrarDentro">
			</a>
		</form>
	</section>
	<br><br><br><br>

     </main>	

	<!-- Footer -->

    <footer>
      <br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
