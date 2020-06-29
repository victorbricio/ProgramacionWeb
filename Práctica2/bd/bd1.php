<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
	<?php
		session_start();

		if ($_SESSION['actualtitulo'] == ""){
			$actualtitulo = $_POST['actualtitulo'];
			$actualcolor = $_POST['actualcolor'];
			$actualimagen = $_POST['actualimagen'];
			$_SESSION['actualtitulo'] = $actualtitulo;
			$_SESSION['actualcolor'] = $actualcolor;
			$_SESSION['actualimagen'] = $actualimagen;
		}
	
		else{
			$actualtitulo = $_SESSION['actualtitulo'];
			$actualcolor = $_SESSION['actualcolor'];
			$actualimagen = $_SESSION['actualimagen'];
		}
	?>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="magic.css">
    <title>Color <?php echo $actualtitulo?></title>
  </head>
  <body>
	
	<!-- Header -->

    <header>
      <aside class="logo">
        <img src="../imagenes/<?php echo $actualimagen?>" height="200" width="200">
      </aside>

      <br><br>
      <h1 id=<?php echo $actualcolor?>>Color <?php echo $actualtitulo?></h1>

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

	<!-- Recursos de la biblioteca -->
    <section id="recursos">

	<article id ="masgrande"> 
	<br><br>
	En esta biblioteca veremos las combinaciones <br><br> con uno de los colores <?php echo $actualtitulo?>. 
	</article>

	<br><br><br>
	<h2> Combinaciones destacadas </h2>
	<br><br>
	<article id="scrolldetipos">

	<?php
	$conexion2 = new PDO($dns, $usuario, $contrasenya);

	$consulta2 = "select *  from Recurso where biblioteca=:biblioteca";
	$sentencia2 = $conexion2->prepare($consulta2);
	$sentencia2->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
	$sentencia2->execute();

	foreach ($sentencia2->fetchAll() as $fila){
		echo "<br><br>
			<article>
				<img src=\"../imagenes/".$fila['imagen']."\" height=100 width=100 class=\"Symbol\">
			<p class=\"manaSymbol\">".$fila['titulo']."<br><br>".$fila['descripcion']."</p>
			<br><br><br>
	      		</article>
			<br><br>";
	}

	?>
    </section>

	<!-- Recusrsos destacados -->

    <section id="combinaciones">
	    <h3 class=centro>Información relevante de la biblioteca:</h3>
	    <?php
		$conexion3 = new PDO($dns, $usuario, $contrasenya);

		$consulta3 = "select *  from Recurso where biblioteca=:biblioteca";
		$sentencia3 = $conexion3->prepare($consulta3);
		$sentencia3->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
		$sentencia3->execute();

		$contador = 0;

		foreach ($sentencia3->fetchAll() as $fila){
			$contador++;
		}

		$conexion3 = new PDO($dns, $usuario, $contrasenya);

		$consulta3 = "select *  from Recurso where biblioteca=:biblioteca";
		$sentencia3 = $conexion3->prepare($consulta3);
		$sentencia3->bindValue(":biblioteca", $actualtitulo, PDO::PARAM_STR);
		$sentencia3->execute();

		foreach ($sentencia3->fetchAll() as $fila){
			if ($contador == $fila['id_biblioteca'] || $contador - 1 == $fila['id_biblioteca'] || $contador - 2 == $fila['id_biblioteca']){
				echo "<article>
					<img src=\"../imagenes/".$fila['imagen']."\" height=100 width=50 class=\"Symbol\">
					<p class=centro>" .$fila['titulo']. "<br>".$fila['descripcion']."</p>
			      	     </article>
				     <br><br><br>";
			}
		}

		?>

	<!-- Edición, alta y borrado de secciones -->

	<article class="edalbo">
		<form action=editarseccion.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
	 		<input type=submit name=login value=Edición>
		</form>
	 	<form action=altaseccion.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
	 		<input type=submit name=login value=Alta>
		</form>
		<form action=borrarseccion.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
	 		<input type=submit name=login value=Borrado>
		</form>
		(secciones)
	</article>

	<!-- Edición, alta y borrado de recursos -->

	<article class="edalbo">
		<form action=editarrecurso.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
	 		<input type=submit name=login value=Edición>
		</form>
	 	<form action=altarecurso.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
	 		<input type=submit name=login value=Alta>
		</form>
		<form action=borrarrecurso.php method=post>
			<input type=hidden name=actualtitulo value =<?php echo $actualtitulo ?>>
			<input type=hidden name=actualcolor value =<?php echo $actualcolor ?>>
			<input type=hidden name=actualimagen value =<?php echo $actualimagen ?>>
	 		<input type=submit name=login value=Borrado>
		</form>
		(de recursos)
	</article>
    </section>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<!-- Footer -->
    <footer>
      <br><br><br><br><br><br>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>
</html>
