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
	
      <aside class="identificador">
        <p>
	
	<?php
		session_start();

		echo $_SESSION['usuario_actual'];

		$dns = "mysql:host=localhost;dbname=db47424585_pw1920";
		$usuario = "pw47424585";
		$contrasenya = "47424585";

		$conexion = new PDO($dns, $usuario, $contrasenya);

		$consulta = "select *  from Usuario where usuario=:usuario";
		$sentencia = $conexion->prepare($consulta);
		$sentencia->bindValue(":usuario", $_SESSION['usuario_actual'], PDO::PARAM_STR);
		$sentencia->execute();

		$telefono; $correo; $web;

		foreach ($sentencia->fetchAll() as $fila){
			$telefono = $fila['telefono'];
			$correo = $fila['correo'];
			$web = $fila['web'];
		}

		if ($telefono == 0)
			$telefono = "";

	?>

      </aside>
    </header>

    <br><br><br><br><br><br><br><br><br><br>

	<form action=datospersonalesgestion.php method=post onsubmit="return validate()">
		<!-- Formulario-->
		<section id=descripcion>
			<label>Nombre:&nbsp;</label><?php echo $_SESSION['usuario_actual'] ?><br>

			<label>Contrase&ntilde;a nueva:&nbsp;</label>
			<input type="password" name="contrasenya" id=contrasenya value=""><br>
			<p>Si no quieres cambiar la contraseña deja el espacio en blanco.</p>

			<label>N&uacute;mero de tel&eacute;fono:&nbsp;</label>
			<input type="tel" name="telefono" id=telefono value=<?php echo $telefono ?>><br>

			<label>Correo electr&oacute;nico:&nbsp;</label>
			<input type="text" name="correo" id=correo value=<?php echo $correo ?>><br>

			<label>P&aacute;gina web:&nbsp;</label>
			<input type="text" name="web" id=web value=<?php echo $web ?>><br>


			<!-- Botón-->
			<a id="entrarFuera">
			  <input type="submit" name="login" value="Modificar" id="entrarDentro">
			</a>
		</section>
	</form>

    

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
	<!-- Footer -->

    <footer>
      <a href="contacto.php">Contacto</a>-<a href="como_se_hizo.pdf">C&oacute;mo se hizo</a>
      <br><br><br>
    </footer>
  </body>

	<script type="text/javascript">
		function validate(){
			var contrasenya = document.getElementById("contrasenya").value;
			var telefono = document.getElementById("telefono").value;
			var correo = document.getElementById("correo").value;
			var web = document.getElementById("web").value;
			var mensaje = "";
			var ret = true;

			if (contrasenya.length < 3 || contrasenya.length > 9){
				if (contrasenya.length != 0){
					mensaje += "La contraseña debe tener más de 2 caracteres y menos de 10 .\n";
					ret = false;
				}
			}

			if (!(/^\d{9}$/.test(telefono))){
				mensaje += "El teléfono debe tener exactamente 9 dígitos .\n";
				ret = false;
			}

			if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(correo)) ) {
				mensaje += "El correo no es correcto.\n";
			 	ret = false;
			}

			if ( !(/^http[s]?:\/\/[\w]+([\.]+[\w]+)+$/.test(web)) ) {
				mensaje += "La página web no es correcta.\n";
			 	ret = false;
			}

			if (mensaje != "")
				alert(mensaje);

			return ret;
		}
	</script>
</html>
