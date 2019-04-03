<!DOCTYPE html>
<html>
<body>
    <?php
        if (isset($_REQUEST['enviar'])) 
        {
            $tipoVivienda = $_REQUEST['tipoVivienda'];
            $zona = $_REQUEST['zona'];
            $direccion = $_REQUEST['direccion'];
            $dormitorios = $_REQUEST['dormitorios'];
            $precio = $_REQUEST['precio'];
            $tamanyo = $_REQUEST['tamanyo'];
            $extras = $_REQUEST['extras'];
            $observaciones = $_REQUEST['observaciones'];
                        
            if ($tipoVivienda != "" && $zona != "" && $direccion != "" 
                && $dormitorios != "" && $precio != "" 
                && $tamanyo != "") 
            {
                echo 
                    "<p>Estos son los datos introducidos:</p>
                    <ul>
                        <li>
                            Tipo: $tipoVivienda
                        </li>
                        <li>
                            Zona: $zona
                        </li>
                        <li>
                            Dirección: $direccion
                        </li>
                        <li>
                            Número de dormitorios: $dormitorios
                        </li>
                        <li>
                            Precio: $precio
                        </li>
                        <li>
                            Tamaño: $tamanyo
                        </li>
                        <li>
                            Extras: $extras
                        </li>
                        <li>
                            Observaciones: $observaciones
                        </li>
                    </ul>";
                echo '<a href="ejForm4.php">Insertar otra vivienda</a>';
            }
            else
            {
                echo '<p>No se ha podido realizar la inserción debido
                        a los siguientes errores:</p>';
                
                echo"<ul>";

                if ($tipoVivienda == "") 
                    echo"<li>Se requiere el tipo de vivienda</li>";
                if ($zona == "") 
                    echo"<li>Se requiere la zona</li>";
                if ($direccion == "") 
                    echo"<li>Se requiere la dirección</li>";
                if ($dormitorios == "") 
                    echo"<li>Se requiere un número de dormitorios</li>";
                if ($precio == "") 
                    echo"<li>Se requiere un precio</li>";
                if ($tamanyo == "") 
                    echo"<li>Se requiere un tamaño de vivienda</li>";

                echo"</ul>";
                echo '<a href="ejForm4.php">Volver</a>';
            }
        }
        else
        {
            echo'<h1>Inserción de vivienda</h1>
                <p>Introduzca los datos de la vivienda:</p>
                </br>
                <table>
                    <form action="'.$_SERVER['PHP_SELF'].'" name="formulario"
                        method="POST">
                        <tr>
                            <td>
                                <b>Tipo de vivienda:</b>
                            </td>
                            <td>
                                <select name="tipoVivienda">
                                    <option value="piso">Piso
                                    <option value="adosado">Adosado
                                    <option value="chalet">Chalet
                                    <option value="casa">Casa
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <b>Zona:</b>
                        </td> 
                            <td>
                                <select name="zona">
                                    <option value="centro">Centro
                                    <option value="nervion">Nervion
                                    <option value="triana">Triana
                                    <option value="aljarafe">Aljarafe
                                    <option value="macarena">Macarena
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Dirección:</b>
                            </td>
                            <td>
                                <input type="text" name="direccion" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Número de dormitorios:</b>
                            </td>
                            <td>
                                <input type="radio" name="dormitorios"
                                    value="1" />1
                                <input type="radio" name="dormitorios"
                                    value="2"/>2
                                <input type="radio" name="dormitorios"
                                    value="3"/>3
                                <input type="radio" name="dormitorios"
                                    value="4"/>4
                                <input type="radio" name="dormitorios"
                                    value="5" />5
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Precio:</b>
                            </td>
                            <td>
                                <input type="number" name="precio"> €
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Tamaño:</b>
                            </td>
                            <td>
                                <input type="number" name="tamanyo"> metros
                                    cuadrados
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Extras (marque las que procedan):</b>
                            </td>
                            <td>
                                <input type="checkbox" name="extras" 
                                    value="piscina" />
                                    Piscina
                                <input type="checkbox" name="extras"
                                    value="jardin"/>
                                    Jardín
                                <input type="checkbox" name="extras"
                                    value="garaje"/>
                                    Garaje
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Observaciones:</b>
                            </td>
                            <td>
                                <textarea name="observaciones"> 
                                </textarea> 
                            </td>
                        </tr>
                </table>
                    <input type="submit" name="enviar" value="enviar" />
                </form>';
        }
    ?>   

</body>
</html>