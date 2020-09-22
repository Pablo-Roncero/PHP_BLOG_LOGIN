<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php

        include_once('../Model/Manejo_Objetos.php');

        
    try {

        $miconexion = new PDO('mysql:host=localhost; dbname=curso', 'root', '');

        $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $Manejo_Objetos = new Manejo_Objetos($miconexion);

        $tabla_blog = $Manejo_Objetos->getContenidosPorFecha();

        if(empty($tabla_blog)) {

            echo "No hay entradas del blog aún";

        } else {

            foreach($tabla_blog as $valor) {
                echo "<h3>" . $valor->getTitulo() . "</h3>";

                echo "<h4>" . $valor->getFecha() . "</h4>";

                echo "<div style='width:400px'>" . $valor->getComentario() . "</div>";

                if($valor->getImagen() != "") {

                    echo "<img src='../imagenes/";

                    echo $valor->getImagen() . "' width='300px' height='200px' />";

                }

                echo "<hr />";
            }
             
        }

    } catch (Exception $e) {

        die("Error ". $e->getMessage());

    }

    ?>

    <br />

    <a href="Formulario.php">Volver a la página de insercción</a>

</body>
</html>