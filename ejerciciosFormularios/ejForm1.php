<html>
<body>
    <?php
        if (isset($_REQUEST['enviar'])) 
        {
            $total = 1;
            $opcion = $_REQUEST['opcion'];
            $cantidadBotellas = $_REQUEST['botellas'];

            switch ($opcion) 
            {
                case 'cocacola':
                    $total = $cantidadBotellas;        
                    break;
                case 'pepsi':
                $total = $cantidadBotellas * 0.80;        
                    break;
                case 'fanta':
                    $total = $cantidadBotellas * 0.90;                        
                    break;
                case 'trina':
                    $total = $cantidadBotellas*1.20;
                    break;
                default:
                    break;
            }

            echo "Has pedido $cantidadBotellas botellas de $opcion que 
                    hacen $total €";
            
        }
        else
        {
            echo '<p>Producto:
                <form action="'.$_SERVER['PHP_SELF'].'" name="formulario"
                    method="POST">
                <select name="opcion">
                    <option value="cocacola">Coca Cola(1€)
                    <option value="pepsi">Pepsi Cola(0.80€)
                    <option value="fanta">Fanta Naranja(0.90€)
                    <option value="trina">Trina Manzana(1.20€)
                </select>
                <input type="number" name="botellas"/>
                <input type="submit" name="enviar" value="envia" />
                </form><p>';
        }
    ?>   

</body>
</html>