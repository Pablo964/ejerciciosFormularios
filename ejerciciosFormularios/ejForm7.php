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
		<h1>GENERADOR DE FORMULARIOS (FORMULARIO 1)</h1>
        <p>Escribe el número de controles que va a obtener el 
            formulario</p>
		<form name="formCompra" action="<?=$_SERVER['PHP_SELF'];?>"
				 method="post">
			<?php
			if(isset($_REQUEST['enviar']) && $error == false)
			{
				$elementos=$_REQUEST['total'];

				for ($i=1;$i<=$elementos;$i++)
				{

                    ?>Texto<?php echo $i?>:<input type="text" name="pais<?php echo $i?>"> <input type="text" name="continente<?php echo $i?>"><br>
                    <?php
					
					
				}

                echo'<input type="submit" name="form2" value="enviar" />';
				echo" <a href='ejForm6.php' value='volver'>volver</a>";
            }

            else if(isset($_REQUEST['form2']))
			{
                $elementos=2;

                for ($i=1; $i <= $elementos; $i++) 
                { 
                    $paises[] = $_REQUEST["pais$i"];
                    $continentes[] = $_REQUEST["continente$i"];   
                }
                echo"<select>";
                for ($i=0; $i < $elementos; $i++) 
                { 
                    echo "<option value='".$paises[$i]."'/>".$paises[$i]."";    
                } 
                echo"</select>";
                ?>
                <input type="textarea">
				<a href='ejForm6.php' value='volver'>volver</a>
            <?php
            }
			else if(isset($_REQUEST['enviar']) && $error == true)
			{
				echo'Número de controles:<input name="total" type="text"/>';
				echo $errorElementos;
				echo'<input type="submit" name="enviar" value="enviar" />';
			}
			else 
			{
				echo'Número de controles:<input name="total" type="text"/>';
				echo'<input type="submit" name="enviar" value="enviar" />';				
			}
			?>
		</form>
	</body>
</html>