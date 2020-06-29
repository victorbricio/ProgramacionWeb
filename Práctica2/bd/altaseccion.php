<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
	<?php
		session_start();

		$actualtitulo = $_POST['actualtitulo'];
		$actualcolor = $_POST['actualcolor'];
		$actualimagen = $_POST['actualimagen'];	
	?>
    <meta charset="utf-8;base64">
    <link rel="stylesheet" type="text/css" href="magic.css">
    <title>Color <?php echo $actualtitulo ?></title>
  </head>
  <body>
	<!-- Header -->
    <header>
      <aside class="logo">
        <img src="../imagenes/<?php echo $actualimagen ?>" height="200" width="200">
      </aside>

      <br><br>
      <h1 id=<?php echo $actualcolor ?>>Color <?php echo $actualtitulo ?></h1>

      <aside class="identificador">
        <p><?php
		echo $_SESSION['usuario_actual'];
	?></p>
        <br><br>
      </aside>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br><br>

	<!-- Secciones -->

    <h2>Men&uacute; de Secciones</h2>

	<?php
	$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
	$usuario = "pw47424585";
	$contrasenya = "47424585";

	$conexion = new PDO($dns, $usuario, $contrasenya);

	$consulta = "select *  from Seccion where biblioteca=:biblioteca";
	$sentencia = $conexion->prepare($consulta);
	$sentencia->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
	$sentencia->execute();

	$izquierda = true;
	$clase;

	foreach ($sentencia->fetchAll() as $fila){
		if ($izquierda)
			$clase = "logo";
		else
			$clase = "identificador";
		echo "<section class=secciones>
			<form action=recursosseccion1.php method=post>
					<input type=hidden name=actualtitulo value =" .$actualtitulo. ">
					<input type=hidden name=actualcolor value =" .$actualcolor. ">
					<input type=hidden name=actualimagen value =" .$actualimagen. ">
					<input type=hidden name=actualseccion value =" .$fila['titulo']. ">
					<input type=submit value=" .$fila['titulo']. " id=" .$actualcolor. ">
			</form>
		</section>";

		$izquierda = !$izquierda;
	}

	?>

     <br><br><br><br><br><br><br><br><br>

     <main>

	<h2> Dar de alta una secci&oacute;n</h2>

	<!-- Formulario -->

	<form action=altasecciongestion.php method=post onsubmit="return validate()">
		<section class="sectionNormal">
			<label>Nombre de la secci&oacute;n&nbsp;</label>
			<input type="text" name="titulo" value=""><br>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>

		</section>
		<br><br><br><br>

		<!-- Descripción -->

		<section id="descripcion">
			<label>Descripci&oacute;n:</label><br>
			<input type=text name=descripcion id=desc><br>
		</section>

		<!-- Botón -->

		<a id="entrarFuera">
		  <input type="submit" name="login" value="Crear" id="entrarDentro">
		</a>
	</form>

     </main>	

	<!-- Footer -->

    <footer>
      <br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
	<script type="text/javascript">
		function validate(){
			var descripcion = document.getElementById("desc").value;
			var ret = true;

			if (descripcion.length > 20){
				alert("La descripción debe tener menos de 20 caracteres .\n");
				ret = false;
			}

			return ret;
		}
	</script>
</html>
