<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    include_once("../Model/Objeto_Blog.php");

    include_once("../Model/Manejo_Objetos.php");

    try {

        $miconexion = new PDO('mysql:host=localhost;dbname=curso', 'root', '');

        $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if ($_FILES["imagen"]["error"]) {

            switch($_FILES["imagen"]["error"]) {

                case 1:  // Error exceso de tamaño de archivo en php.ini

                    echo "El tamaño del archivo excede lo permitido por el sevidor";

                    break;

                case 2:  // Error tamaño archvivo marcado desde formulario

                    echo "El tamaño del archivo excede 2 MB";

                    break;

                case 3:  // Corrupción del archivo

                    echo "El envío del archivo se interrumpió";

                    break;

                case 4:  // No ha fichero

                    echo "No se ha enviado ningún archivo";

                    break;

            }

        } else {
            echo "Entrada subida correctamente</br>";

            if((isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"]==UPLOAD_ERR_OK))) {

                $destino_ruta = "../imagenes/";

                move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino_ruta . $_FILES["imagen"]["name"]);

                echo "El archivo " . $_FILES["imagen"]["name"] . " se ha copiado en el directorio de imágenes";

            } else {

                echo "El archivo no se ha podido copiar al directorio de imágenes";
            }
        }

        $Manejo_Objeto = new Manejo_Objetos($miconexion);

        $blog = new Objeto_Blog();

        $blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]), ENT_QUOTES));

        $blog->setFecha(Date("Y-m-d H:i:s"));

        $blog->setComentario(htmlentities(addslashes($_POST["area_comentarios"]), ENT_QUOTES));

        $blog->setImagen($_FILES["imagen"]["name"]);


        $Manejo_Objeto->insertaContenido($blog);

        echo "<br /> Entrada de blog agregada con éxito </br>";

    } catch (Exception $e) {

        die("Error ". $e->getMessage() . $e->getLine());

    }

?>

</body>
</html>