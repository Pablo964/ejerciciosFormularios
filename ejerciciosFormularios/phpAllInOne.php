<html>
	<head>
		<title>PRUEBA</title>
	</head>
	<body>
	
		<?PHP
			
			// Comprobar si estamos en la pantalla inicial o ya hemos pulsado el botón
			if (isset($_REQUEST ['enviar']))
			{
				$error = false;
				$nombre= $_REQUEST['nombre'];
				$edad= $_REQUEST['edad'];
				$errornombre="";
				$erroredad="";
				if (trim($nombre)=="")
				{
					$error=true;
					$errornombre="<p style='color:red'>Se requiere el nombre</p>";
				}
				if (trim($edad)=="")
				{
					$error=true;
					$erroredad="<p style='color:red'>Se requiere la edad</p>";
				}
			}
			// Si los datos son correctos, procesar formulario (segunda pantalla)
			if (isset($_REQUEST ['enviar']) && $error==false)
			{
				print ("Estos son los datos introducidos:<ul>");
				print ("<li>Nombre: $nombre</li>");
				print ("<li>Edad: $edad</li>");
				
				print ("</ul>");

			}
			// Estamos en la primera pantalla porque es la 1 vez que entramos
			// o porque hay errores
			else
			{
				?>
				<fieldset>
				<form name="formu" action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
										
					<label for="nombre">Nombre:</label>
						<input type="text" name="nombre"
						<?php
							if(isset($_REQUEST['enviar']))
							{
								if($errornombre=="")
								{								
									print("value=$nombre />");
								}else
								{
									print("/><br>$errornombre");
								}
							} 
							else
							{
								print("/>");
							}
						
						?>
												
					<br>

					<label for="edad">Edad:</label>
						<input type="text" name="edad"
						<?php
						if(isset($_REQUEST ['enviar']))
						{
							if($erroredad=="")
							{
								print("value=$edad /> €");
							}else
							{
								print("/><br>$erroredad");
							}
						}else
						{
							print("/>");
						}
						
						?>
					<br>
					<input type="submit" value="ENVIAR DATOS" name="enviar"/>
					
				</form>
				</fieldset>

	</body>
</html>
<?php
			}
?>