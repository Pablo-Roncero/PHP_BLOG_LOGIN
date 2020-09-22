<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {

        header ("location:loginpdo1.php");

    }

?>

<h1>Bienvenido Usuario</h1>

<?php
    echo "Usuario: " . $_SESSION["usuario"] . "<br><br>";
?>

<p><a href="cierrepdo.php">Log out</a></p>

<p>Esto es para usuarios registrados</p>

<section>
    <h2>Zona de usuarios registrados</h2>
    <ul>
        <li><a href="usuariosregistradospdo2.php">1</a></li>
        <li><a href="usuariosregistradospdo3.php">2</a></li>
        <li><a href="usuariosregistradospdo4.php">3</a></li>
    </ul>
</section>


</body>
</html>