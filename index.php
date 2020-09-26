<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Antes loginpdo1.php -->
    <title>LOG IN</title>
</head>
<body>

    <!--  Aquí tendríamos que ver temas de sesiones iniciadas para incluir un condicionar redirigiendo
a la página de inicio de sesión o a la de registro en un caso dado --> 

    <?php

    if (isset($_COOKIE['user_email']) && (isset($_COOKIE['user_password']))) {

        session_start();

        $_SESSION["user"] = $_COOKIE['user_email'];

        header("location: View/Blog_View.php");
        
    } else {

        require_once("View/Form_View.php");

        echo "<button><a href='Model/Registration_Model.php'>Registro</a></button>";
        
    }

    ?>

</body>
</html>