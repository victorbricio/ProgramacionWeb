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
			$actualid = $_POST['actualid'];
			$_SESSION['actualseccion'] = $actualseccion;
			$_SESSION['actualid'] = $actualid;
		}
		else{
			$actualtitulo = $_SESSION['actualtitulo'];
			$actualcolor = $_SESSION['actualcolor'];
			$actualimagen = $_SESSION['actualimagen'];
			$actualseccion = $_SESSION['actualseccion'];
			$actualid = $_SESSION['actualid'];
		}


		$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
		$usuario = "pw47424585";
		$contrasenya = "47424585";

		$conexion0 = new PDO($dns, $usuario, $contrasenya);

		$consulta0 = "select *  from Recurso where biblioteca=:biblioteca and seccion=:seccion";
		$sentencia0 = $conexion0->prepare($consulta0);
		$sentencia0->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
		$sentencia0->bindValue(":seccion", $actualseccion, PDO::PARAM_STR);
		$sentencia0->execute();

		$contador_seccion = 0;

		foreach ($sentencia0->fetchAll() as $fila){
			$contador_seccion++;
		}


		if ($actualid == 0)
			$actualid = $contador_seccion;
		else if($actualid == $contador_seccion + 1)
			$actualid = 1;
	?>
    <meta charset="utf-8">
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

	<?php
	$conexion2 = new PDO($dns, $usuario, $contrasenya);

	$consulta2 = "select *  from Recurso where biblioteca=:biblioteca and seccion=:seccion and id_seccion=:id_seccion";
	$sentencia2 = $conexion2->prepare($consulta2);
	$sentencia2->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
	$sentencia2->bindValue(":seccion", $actualseccion, PDO::PARAM_STR);
	$sentencia2->bindValue(":id_seccion", $actualid, PDO::PARAM_STR);
	$sentencia2->execute();

	foreach ($sentencia2->fetchAll() as $fila){
		echo "<section id=biblioteca>
			<a>
          			<img src=\"../imagenes/" .$fila['imagen']. "\"  height=100 width=100>
        		</a>
		</section>
		
		<section id=recursos>
			<label>T&iacute;tulo:&nbsp;</label>" .$fila['titulo']. "<br>

			<label>Autor:&nbsp;</label>" .$fila['autor']. "<br>

			<label>Secci&oacute;n:&nbsp;</label>" .$fila['seccion']. "<br>	

			<label>Tipo:&nbsp;</label>" .$fila['tipo']. "<br>

			<label>Metadato1:&nbsp;</label>" .$fila['metadato1']. "<br>

			<label>Metadato2:&nbsp;</label>" .$fila['metadato2']. "<br>

			<label>Descripci&oacute;n:</label>" .$fila['descripcion']. "<br>
		</section>";
	}

	?>
	
	<!-- Enlaces a anterior y siguiente -->

	<section class=logo>
		<form action=recurso1.php method=post id=logo>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
			<input type=hidden name=actualseccion value =<?php echo $actualseccion ?>>
			<input type=hidden name=actualid value =<?php echo $actualid - 1?>>
			<input type=submit value=Anterior id=<?php echo $actualcolor ?>>
		</form>
	</section>

	<section class=identificador>
		<form action=recurso1.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
			<input type=hidden name=actualseccion value =<?php echo $actualseccion ?>>
			<input type=hidden name=actualid value =<?php echo $actualid + 1?>>
			<input type=submit value=Siguiente id=<?php echo $actualcolor ?>>
		</form>
	</section>

     </main>	

	<!-- Footer -->

    <footer>
      <br><br><br><br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
