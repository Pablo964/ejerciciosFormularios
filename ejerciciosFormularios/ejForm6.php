<html>
	<head>
		<title>Ejercicio 6</title>
		<script>
		function sumar(elementos)
		{
			let total=0;
			for (let i=1;i<=elementos;i++)
				total=total+parseInt(formCompra["precio"+i].value);
			formCompra.total.value=total;
		}
		</script>
	</head>
	<body>
		<?php
			if (isset($_REQUEST['enviar'])) 
			{
				$error = false;
				$elementos=$_REQUEST['total'];
				$errorElementos = "";

				if (trim($elementos) == "") 
				{
					$error = true;
					$errorElementos = "<p style='color:red'>
						Debe rellenar este campo con un número</p>";
				}
				if (!is_numeric($elementos)) 
				{
					$error = true;
					$errorElementos = "<p style='color:red'>
						Se requiere un número</p>";
				}
			}

		?>
		<h1>EJERCICIO 6. CAJA COMPRA</h1>
		<form name="formCompra" action="<?=$_SERVER['PHP_SELF'];?>"
				 method="post">
			<?php
			if(isset($_REQUEST['enviar']) && $error == false)
			{
				$elementos=$_REQUEST['total'];

				for ($i=1;$i<=$elementos;$i++)
				{
					if ($i!=$elementos)
					{
						?>Artículo<?php echo $i?>:<input type="text" name="articulo<?php echo $i?>">Precio<?php echo $i?>:<input type="text" name="precio<?php echo $i?>"><br>
					<?php
					}
					else
					{
						?>Artículo<?php echo $i?>:<input type="text" name="articulo<?php echo $i?>">Precio<?php echo $i?>:<input type="text" name="precio<?php echo $i?>" onblur="sumar(<?php echo $elementos?>);"><br>
					<?php
					}
				}
				echo'Total:<input name="total" type="text"/><br><br>';
				echo"<a href='ejForm6.php' value='volver'>volver</a>";
			}
			else if(isset($_REQUEST['enviar']) && $error == true)
			{
				echo'Total:<input name="total" type="text"/>';
				echo $errorElementos;
				echo'<input type="submit" name="enviar" value="enviar" />';
			}
			else 
			{
				echo'Total:<input name="total" type="text"/>';
				echo'<input type="submit" name="enviar" value="enviar" />';				
			}
			?>
		</form>
	</body>
</html>