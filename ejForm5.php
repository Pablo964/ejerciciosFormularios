<!DOCTYPE html>
<html>
<body>
    <?php
        if (isset($_REQUEST['enviar'])) 
        {
            $error = false;
            $tipoVivienda = $_REQUEST['tipoVivienda'];
            $zona = $_REQUEST['zona'];
            $direccion = $_REQUEST['direccion'];
            $dormitorios = $_REQUEST['dormitorios'];
            $precio = $_REQUEST['precio'];
            $tamanyo = $_REQUEST['tamanyo'];
            $extras = $_REQUEST['extras'];
            $observaciones = $_REQUEST['observaciones'];

            $errorDireccion = "";
            $errorDormitorios = "";
            $errorPrecio = "";
            $errorPrecioNoNumerico = "";
            $errorTamanyo = "";
            $errorTamanyoNoNumerico = "";
            $errorFoto = "";

            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) 
            {
                $nombreDirectorio = "img/";
                $nombreFichero = $_FILES['imagen']['name'];
                $nombreCompleto = $nombreDirectorio . $nombreFichero;
                
                if (is_file($nombreCompleto))
                {
                    $idUnico = time();
                    $nombreFichero = $idUnico . "-" . $nombreFichero;
                }
                
                move_uploaded_file ($_FILES['imagen']['tmp_name'], 
                        $nombreDirectorio . $nombreFichero);
            }
            else
            {
                $error = true;
                $errorFoto = "<p style='color:red'> No se ha podido subir 
                    la foto. tamaño demasiado grande</p>";
            }

            if (trim($direccion) == "") 
            {
                $error = true;
                $errorDireccion = "<p style='color:red'>
                        Se requiere la dirección</p>";
            }
            if (trim($dormitorios) == "") 
            {
                $error = true;
                $errorDormitorios = "<p style='color:red'>
                        Se requiere el número de dormitorios</p>";
            }
            if (trim($precio) == "") 
            {
                $error = true;
                $errorPrecio = "<p style='color:red'>
                        Se requiere el precio</p>";
            }
            if (!is_numeric($precio)) 
            {
                $error = true;
                $errorPrecioNoNumerico = "<p style='color:red'>
                    Se requiere un número</p>";
            }
            if (trim($tamanyo) == "") 
            {
                $error = true;
                $errorTamanyo = "<p style='color:red'>
                        Se requiere el tamaño de la vivienda</p>";
            }
            if (!is_numeric($tamanyo)) 
            {
                $error = true;
                $errorTamanyoNoNumerico = "<p style='color:red'>
                    Se requiere un número</p>";
            }
        }                
        if (isset($_REQUEST['enviar']) && $error == false) 
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
                        Foto: <a href='$nombreCompleto' target='_blank'>
                                $nombreCompleto<a/>
                    </li>
                    <li>
                        Observaciones: $observaciones
                    </li>
                </ul>";
            echo '<a href="ejForm5.php">Insertar otra vivienda</a>';
        }
             
        else
        {
            ?>
            <h1>Inserción de vivienda</h1>
                <p>Introduzca los datos de la vivienda:</p>
                <br>
                <table>
                    <form action="<?=$_SERVER['PHP_SELF'];?>" 
                            name="formulario" method="POST" 
                            enctype="multipart/form-data">
                        <tr>
                            <td>
                                <b>Tipo de vivienda:</b>
                            </td>
                            <td>
                                <select name="tipoVivienda">
                                    <?php
                                    if(isset($_REQUEST['enviar'])
                                        && $tipoVivienda=="piso")
                                    {
                                        print("<option value='piso'
                                            selected >Piso");
                                    }
                                    else
                                        print("<option value='piso'>Piso");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $tipoVivienda=="adosado")
                                    {							
                                        print("<option value='adosado'
                                            selected >Adosado");
                                    }
                                    else
                                        print("<option value='adosado'>
                                            Adosado");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $tipoVivienda=="chalet")
                                    {
                                        print("<option value='chalet'
                                            selected >Chalet");
                                    }
                                    else
                                        print("<option value='chalet'>
                                            Chalet");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $tipoVivienda=="casa")
                                    {							
                                        print("<option value='casa'
                                            selected >Casa");
                                    }
                                    else
                                        print("<option value='casa'>Casa");
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <b>Zona:</b>
                        </td> 
                            <td>
                                <select name="zona">
                                    <?php
                                    if(isset($_REQUEST['enviar'])
                                        && $zona=="centro")
                                    {
                                        print("<option value='centro'
                                            selected >Centro");
                                    }
                                    else
                                        print("<option value='centro'>
                                            Centro");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $zona=="nervion")
                                    {							
                                        print("<option value='nervion'
                                            selected >Nervion");
                                    }
                                    else
                                        print("<option value='nervion'>
                                            Nervion");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $zona=="triana")
                                    {
                                        print("<option value='triana'
                                            selected >Triana");
                                    }
                                    else
                                        print("<option value='triana'>
                                            Triana");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $zona=="aljarafe")
                                    {							
                                        print("<option value='aljarafe'
                                            selected >Aljarafe");
                                    }
                                    else
                                        print("<option value='aljarafe'>
                                            Aljarafe");
                                    
                                    if(isset($_REQUEST['enviar'])
                                        && $zona=="macarena")
                                    {							
                                        print("<option value='macarena'
                                            selected >Macarena");
                                    }
                                    else
                                        print("<option value='macarena'>
                                            Macarena");
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Dirección:</b>
                            </td>
                            <td>
                                <input type="text" name="direccion"
                                <?php
                                    if(isset($_REQUEST['enviar']))
                                    {
                                        if($errorDireccion=="")
                                        {								
                                            print("value=$direccion />");
                                        }else
                                        {
                                            print("/><br>$errorDireccion");
                                        }
                                    } 
                                    else
                                    {
                                        print("/>");
                                    }
                                
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Número de dormitorios:</b>
                            </td>
                            <td>
                                <?php
                                if (isset($_REQUEST['enviar'])
                                    && $dormitorios == "1") 
                                {
                                    print("<input type='radio' 
                                        name='dormitorios' value='1'
                                        checked/>1");
                                }
                                else
                                    print("<input type='radio'
                                        name='dormitorios' value='1'/>1"); 
                                
                                if (isset($_REQUEST['enviar'])
                                    && $dormitorios == "2") 
                                {
                                    print("<input type='radio' 
                                        name='dormitorios' value='2'
                                        checked/>2");
                                }
                                else
                                    print("<input type='radio' 
                                        name='dormitorios' value='2'/>2"); 
                                
                                if (isset($_REQUEST['enviar'])
                                    && $dormitorios == "3") 
                                {
                                    print("<input type='radio' 
                                        name='dormitorios' value='3'
                                        checked/>3");
                                }
                                else
                                    print("<input type='radio' 
                                        name='dormitorios' value='3' />3"); 
                            
                                if (isset($_REQUEST['enviar'])
                                    && $dormitorios == "4") 
                                {
                                    print("<input type='radio' 
                                        name='dormitorios' value='4'
                                        checked/>4");
                                }
                                else
                                    print("<input type='radio' 
                                        name='dormitorios' value='4'/>4");
                                        
                                if (isset($_REQUEST['enviar'])
                                    && $dormitorios == "5") 
                                {
                                    print("<input type='radio' 
                                        name='dormitorios' value='5'
                                        checked/>5");
                                }
                                else
                                    print("<input type='radio' 
                                        name='dormitorios' value='5'/>5");
                                

                                if (isset($_REQUEST['enviar'])
                                    && $errorDormitorios != "")
                                {
                                    print("<br>$errorDormitorios");
                                }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Precio:</b>
                            </td>
                            <td>
                                <input type="text" name="precio"
                                <?php
                                    if(isset($_REQUEST['enviar']))
                                    {
                                        if($errorPrecio=="" && 
                                            $errorPrecioNoNumerico == "")
                                        {								
                                            print("value=$precio /> €");
                                        }
                                        else if($errorPrecio != "")
                                        {
                                            print("/> €<br>$errorPrecio");
                                        }
                                        else if ($errorPrecioNoNumerico 
                                                != "") 
                                        {
                                            print("/> €<br>
                                                $errorPrecioNoNumerico");
                                        }   
                                    } 
                                    else
                                    {
                                        print("/> €");
                                    }
                                
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Tamaño:</b>
                            </td>
                            <td>
                                <input type="text" name="tamanyo"
                                <?php
                                    if(isset($_REQUEST['enviar']))
                                    {
                                        if($errorTamanyo=="" && 
                                            $errorTamanyoNoNumerico == "")
                                        {								
                                            print("value=$tamanyo /> m2");
                                        }
                                        else if($errorTamanyo != "")
                                        {
                                            print("/> m2<br>$errorTamanyo");
                                        }
                                        else if ($errorTamanyoNoNumerico 
                                                != "") 
                                        {
                                            print("/> m2<br>
                                                $errorTamanyoNoNumerico");
                                        }
                                    } 
                                    else
                                    {
                                        print("/> m2");
                                    }
                                
                                ?> 
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
                                <b>Foto:</b>
                            </td>
                            <td>
                                <input type="hidden" name="max_file_size" 
                                    value="200000000">
                                <input type="file" name="imagen">
                                <?php
                                    if ($errorFoto != "" 
                                        && isset($_REQUEST['enviar'])) 
                                    {
                                        print($errorFoto);
                                    }  
                                ?>
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
            </form>
        
</body>
</html>
            <?php
        }
    ?>   

