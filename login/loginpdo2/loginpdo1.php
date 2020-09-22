<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        h1 {
            text-align: center;
        }

        table {
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin: auto;
        }

        .izq {
            text-align: right;
        }

        .der {
            text-align: left;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        h1, h2 {
            text-align: center;
        }
    
    </style>

</head>
<body>

<?php

    if(isset($_POST["enviar"])) {

        try {

            $base = new PDO("mysql:host=localhost;dbname=curso", "root", "");

            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM USUARIO_PAS WHERE USUARIOS = :login AND PASSWORD = :password";

            $resultado = $base->prepare($sql);

            $login = htmlentities(addslashes($_POST['login']));

            $password = htmlentities(addslashes($_POST['password']));

            $resultado->bindValue(":login", $login);

            $resultado->bindValue(":password", $password);

            $resultado->execute();

            $numero_registro = $resultado->rowCount();

            if($numero_registro != 0) {

                session_start();

                $_SESSION["usuario"] = $_POST["login"];

                //header ("location: usuariosregistradospdo.php");
            } else {
                //header ("location:loginpdo1.php");

                echo "Usuario o contraseña incorrectos";
            }

        } catch (Exception $e) {

            die ("Error: " . $e->getMessage());
        }

    }

    ?>

    <h1>INTRODUCE TUS DATOS</h1>

    <?php

    if(!isset($_SESSION['usuario'])) {
        include ('formulario.html');
    } else {
        echo "Usuario: " . $_SESSION["usuario"];
    }
        
    ?>

    <h2>Contenido de la web</h2>

    <table width="800" border="0">
        <tr>
            <td><img src="img1.jpg" width="300" height="166" alt=""></td>
            <td><img src="img2.jpg" width="300" height="171" alt=""></td>
        </tr>
        <tr>
            <td><img src="img3.jpg" width="300" height="166" alt=""></td>
            <td><img src="img4.jpg" width="300" height="197" alt=""></td>
        </tr>
    </table>

</body>
</html>