<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
	<?php
		session_start();

		if (isset($_POST['actualtitulo'])){
			$actualtitulo = $_POST['actualtitulo'];
			$actualcolor = $_POST['actualcolor'];
			$actualimagen = $_POST['actualimagen'];
			$actualseccion = $_POST['actualseccion'];
			$_SESSION['actualseccion'] = $actualseccion;
		}
		else{
			$actualtitulo = $_SESSION['actualtitulo'];
			$actualcolor = $_SESSION['actualcolor'];
			$actualimagen = $_SESSION['actualimagen'];
			$actualseccion = $_SESSION['actualseccion'];
		}
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

    <br><br><br><br><br><br><br><br><br>

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

     <br><br><br>

     <h2>Recursos de <?php echo $actualseccion ?></h2>

     <section class="sectionNormal">

	<?php
	$conexion2 = new PDO($dns, $usuario, $contrasenya);

	$consulta2 = "select *  from Recurso where biblioteca=:biblioteca and seccion=:seccion";
	$sentencia2 = $conexion2->prepare($consulta2);
	$sentencia2->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
	$sentencia2->bindValue(":seccion", $actualseccion, PDO::PARAM_STR);
	$sentencia2->execute();

	foreach ($sentencia2->fetchAll() as $fila){
		echo "<article class=recursosIzquierda>
			<form action=recurso1.php method=post>
			<br><br>
			<input type=hidden name=actualtitulo value =" .$actualtitulo. ">
			<input type=hidden name=actualcolor value =" .$actualcolor. ">
			<input type=hidden name=actualimagen value =" .$actualimagen. ">
			<input type=hidden name=actualseccion value =" .$fila['seccion']. ">
			<input type=hidden name=actualid value =" .$fila['id_seccion']. ">
			<input type=submit value=" .$fila['titulo']. " id=" .$actualcolor. ">
			<br><br>
			<p class=centro>".$fila['descripcion']."</p>
			<br><br><br>		
			</form>
		</article>";
	}

	?>

     </section>

	<!-- Enlaces a las páginas -->

     <p class=edalbo>
		<a href=recursosseccion1.php>1</a>
		<a href=recursosseccion1.php>2</a>
		<a href=recursosseccion1.php>3</a>
		<a href=recursosseccion1.php>4</a>
		<a href=recursosseccion1.php>5</a>
     </p>

	<br><br><br><br><br><br><br><br><br><br><br><br>

	<!-- Footer -->
   
    <footer>
      <br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
