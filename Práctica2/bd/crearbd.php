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
	?></p>
      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

     <main>

	<h2>Crea una nueva biblioteca digital</h2>
	
	<!-- Imagen para seleccionar una imagen para la biblioteca -->

	<form action="crearbdgestion.php" method="post" enctype="multipart/form-data">
		<section id="biblioteca">
			<input type=file name="imagen" id="imagen" />
			<p>Elige la imagen que va a represantar a la bibloteca digital</p>
		</section>

		<!-- Formulario-->
		<section id="recursos">
			<label>T&iacute;tulo:&nbsp;</label>
			<input type="text" name="titulo" id=titulo value=""><br>

			<label>Color del t&iacute;tulo:&nbsp;</label>
			<input type="text" name="color" id=color value=""><br>


			<!-- <label>Imagen:&nbsp;</label>
			<input type="text" name="imagen" id=imagen value=""><br>

			<!-- Botón-->
			<a id="entrarFuera">
			  <input type="submit" name="login" value="Crear" id="entrarDentro">
			</a>
		</section>
	</form>
	<br><br><br><br><br><br><br><br><br><br>

     </main>	

	<!-- Footer -->

    <footer>
      <br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
