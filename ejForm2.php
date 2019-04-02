<!DOCTYPE html>
<html>
<body>
    <?php
        if (isset($_REQUEST['enviar'])) 
        {
            $cantidad = $_REQUEST['cantidad'];
            
            if ($cantidad != "") 
            {
                $opcion = $_REQUEST['opcion'];

                switch ($opcion) 
                {
                    case 'pts':
                        $total = $cantidad * 166.368;
                        break;
                    case 'dolares':
                        $total = $cantidad * 1.325;
                        break;
                    case 'libras':
                        $total = $cantidad * 0.927;                    
                        break;
                    case 'yenes':
                        $total = $cantidad * 118.232;                    
                        break;
                    case 'francos':
                        $total = $cantidad * 1.515;                    
                        break;
                    default:
                        break;
                }

                echo "<p>$cantidad euros equivalen a $total $opcion</p>";
                echo '<a href="ejForm2.php">Volver</a>';
            }
            else
            {
                echo '<p>Debe introducir una cantidad</p>';
                echo '<a href="ejForm2.php">Volver</a>';
            }
        }
        else
        {
            echo '<h1><b>Conversor de monedas</b></h1>
                <p>Cantidad en euros
                <form action="'.$_SERVER['PHP_SELF'].'" name="formulario"
                    method="POST">
                    <input type="number" name="cantidad"/>
                    Convertir a
                    <select name="opcion">
                        <option value="pts">Pesetas
                        <option value="dolares">Dólares USA
                        <option value="libras">Libras esterlinas
                        <option value="yenes">yenes japoneses
                        <option value="francos">Francos suizos
                    </select>
                    <input type="submit" name="enviar" value="enviar" />
                </form><p>';
        }
    ?>   

</body>
</html>