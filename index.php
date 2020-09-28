<?php 

// Code block for forcing users to use HTTPS instead of HTTP

// A SSL certificate might be added to the server

// Commented by now for testing purposes

/*if($_SERVER['SERVER_PORT'] !== 443 &&
   (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit;
}*/

?>

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

        echo "<div class='register'>
        <h2>Do not forget to register if you have not yet in order to access to awesome content</h2>
        <button><a href='Model/Registration_Model.php'>Registration</a></button></div>";
        
    }

    ?>

</body>
</html>