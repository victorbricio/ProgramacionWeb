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
					<input type=submit value=" .$fila['titulo']. " id=" .$actualcolor. ">
			</form>
		</section>";

		$izquierda = !$izquierda;
	}

	?>

     <br><br><br><br><br><br><br><br><br>

     <main>

	<h2> Editar un recurso </h2>

	<!-- Formulario -->

	<form action=editarrecursogestion.php method=post onsubmit="return validate()">
		<section id="biblioteca">
			<input type=file name="imagen" id="imagen" />
			<p>Elige la nueva imagen que va a representar al recurso</p>
		</section>

		<section id="recursos">
			<label>T&iacute;tulo:&nbsp;</label>
			<select name="titulo" id="seccion" size="1">
			<?php 
					$conexion2 = new PDO($dns, $usuario, $contrasenya);

					$consulta2 = "select *  from Recurso where biblioteca=:biblioteca";
					$sentencia2 = $conexion2->prepare($consulta2);
					$sentencia2->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
					$sentencia2->execute();
				
					foreach ($sentencia2->fetchAll() as $fila)
						echo "<option value=".$fila['titulo'].">".$fila['titulo']."</option>";
	
				?></select><br>

			<label>Nuevo t&iacute;tulo:&nbsp;</label>
			<input type="text" name="nuevotitulo" value=""><br>

			<label>Autor:&nbsp;</label>
			<input type="text" name="autor" value=""><br>

			<label>Secci&oacute;n:&nbsp;</label>
			<select name="seccion" id="seccion" size="1">
				<?php 
					$conexion3 = new PDO($dns, $usuario, $contrasenya);

					$consulta3 = "select *  from Seccion where biblioteca=:biblioteca";
					$sentencia3 = $conexion3->prepare($consulta3);
					$sentencia3->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
					$sentencia3->execute();
				
					foreach ($sentencia3->fetchAll() as $fila)
						echo "<option value=".$fila['titulo'].">".$fila['titulo']."</option>";
	
				?>
			</select><br>

			<label>Tipo:&nbsp;</label>
			<select name="tipo" id="tipo" size="1">
				<option value="texto">Texto</option>
				<option value="imagen">Imagen</option>
				<option value="audio">Audio</option>
				<option value="video">Vídeo</option>
			</select><br>

			<label>Metadato1:&nbsp;</label>
			<input type="text" name="metadato1" value=""><br>

			<label>Metadato2:&nbsp;</label>
			<input type="text" name="metadato2" value=""><br>

			<!--<label>Imagen:&nbsp;</label>
			<input type="text" name="imagen" value=""><br>-->
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
		</section>
		<br><br><br><br><br><br><br><br><br><br>

		<section id="descripcion">
			<label>Descripci&oacute;n:</label><br>
			<input type=text id=desc name=descripcion></textarea><br>
		</section>

		<!-- Botón -->

		<a id="entrarFuera">
		  <input type="submit" name="login" value="Editar" id="entrarDentro">
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
