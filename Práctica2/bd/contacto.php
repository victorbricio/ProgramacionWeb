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
        <img src="../imagenes/colors.png" alt="logo MTG" height="200" width="200">
      </aside>

      <br><br>
      <h1>Colores de Magic the Gathering</h1>

      <aside class="identificador">
        <p><?php
		if (isset($_SESSION['usuario_actual']))
			echo $_SESSION['usuario_actual'];
	?></p>
      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

     <main>

	<!-- Contacto -->

	<h2>Contacto</h2>

	<section id="descripcion">
		<p>V&iacute;ctor Bricio Blázquez <br>vbricio@correo.ugr.es <br>
		Pr&aacute;cticas de Programaci&oacute;n Web <br> 3º/4º Ingenier&iacute;a Inform&aacute;tica</p>
	</section>

     </main>	

	<!-- Footer -->

    <footer>
      <br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
